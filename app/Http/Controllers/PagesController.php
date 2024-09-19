<?php

namespace App\Http\Controllers;
use App\Notifications\ContactConfirmation;
use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class PagesController extends Controller
{
    public $articles_header = 'All Blog Posts';
    public function main()
    {
        return view('main', [
            'posts' => Post::latest()->with('user')->paginate(4),
//            'categories' => Category::groupby('category_name', 'icon')
//                ->select(Category::raw('COUNT(*) as category_count, category_name, icon'))
//                ->get(),
            'categories' => Category::query()
                ->leftJoin('posts', 'posts.category_id', '=', 'categories.id')
                ->selectRaw('category_name, icon, COUNT(DISTINCT(posts.id)) as category_count')
                ->groupBy('category_name', 'icon')
                ->get(),

            'tags' => Tag::query()
                ->leftJoin('post_tag', 'post_tag.tag_id', '=', 'tags.id')
                ->leftJoin('posts', 'posts.id', '=', 'post_tag.post_id')
                ->selectRaw('tag_name, COUNT(DISTINCT(posts.id)) as tag_count, icon')
                ->groupby('tag_name', 'icon')
                ->get(),
        ]);
    }

    public function posts()
    {
        return view('articles', [
            'posts' => QueryBuilder::for(Post::class)->allowedSorts('created_at', 'title')
                ->allowedFilters([AllowedFilter::exact('categories.category_name'), AllowedFilter::exact('tags.tag_name', null, false)])
                ->leftJoin('post_tag', 'posts.id', '=', 'post_tag.post_id')
                ->leftJoin('tags', 'tags.id', '=', 'post_tag.tag_id')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->where('title', 'LIKE', '%' . request('search') . '%')
                ->with('user')->paginate(4),
            'categories' => QueryBuilder::for(Category::class)
                ->leftJoin('posts', 'posts.category_id', '=', 'categories.id')
                ->selectRaw('category_name, icon, COUNT(DISTINCT(posts.id)) as category_count')
                ->groupBy('category_name', 'icon')
                ->get(),

            'tags' => QueryBuilder::for(Tag::class)
                ->leftJoin('post_tag', 'post_tag.tag_id', '=', 'tags.id')
                ->leftJoin('posts', 'posts.id', '=', 'post_tag.post_id')
                ->selectRaw('tag_name, COUNT(DISTINCT(posts.id)) as tag_count, icon')
                ->groupby('tag_name', 'icon')
                ->get(),

        ]);
    }
    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_mail_guest(Request $request): RedirectResponse
    {
        $request->validate([
            //Comments are already handled by Javascript
            'contact_message_guest' => ['required', 'string'],
            'contact_email_guest' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        Notification::route('mail', $request->contact_email_guest)
            ->notify(new ContactConfirmation());

        Mail::to(getenv('MAIL_USERNAME'))->send(new ContactMessage($request->contact_email_guest, $request->contact_message_guest));
//        Mail::to($to_mail)->send(new ContactConfirmation());
        return redirect(route('home', absolute: true));
    }

    public function contact_mail_auth(Request $request): RedirectResponse
    {
        $request->validate([
            //Comments are already handled by Javascript
            'contact_message_auth' => ['required', 'string'],
        ]);

        auth()->user()->notify(new ContactConfirmation());
        Mail::to(getenv('MAIL_USERNAME'))->send(new ContactMessage($request->user()->email, $request->contact_message_auth));
        return redirect(route('home', absolute: true));
    }
}

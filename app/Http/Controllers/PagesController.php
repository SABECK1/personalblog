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

    public function projects(Request $request) {
        $cURLConnection = curl_init();
        $authorization = "Authorization: Bearer ".getenv('GITHUB_AUTHORIZATION');
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
        curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.github.com/user/repos');
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
        curl_setopt($cURLConnection, CURLOPT_USERAGENT, $request->header('User-Agent'));

        $repos = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonArrayResponse = json_decode($repos);
        return view('projects', ['response' => $jsonArrayResponse, 'repos' => $repos]);
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
        return redirect()->back()->with('success', 'Email sent! Please check your inbox!');
    }

    public function contact_mail_auth(Request $request): RedirectResponse
    {

//        $request->user()->sendEmailVerificationNotification();
        $request->validate([
            //Comments are already handled by Javascript
            'contact_message_auth' => ['required', 'string'],
        ]);

        auth()->user()->notify(new ContactConfirmation());
        Mail::to(getenv('MAIL_USERNAME'))->send(new ContactMessage($request->user()->email, $request->contact_message_auth));
        return redirect()->back()->with('success', 'Email sent! Please check your inbox!');
    }
}

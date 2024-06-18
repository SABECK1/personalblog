<div class="blog-card" onclick="goToUrl('{{ route('post.show', $post) }}', event)">
    <img class="blog-image" src="{{ asset('images/posts/'.$post->image_path) }}" alt="Post Image">
    <div class="blog-details">
        <div class="blog-topic text-tiny" onclick="goToUrl('{{ route('articles') }}', event)">
            {{ $post->category_id }}
        </div>
        <h3>
            <div class="title">
                {{ $post->title }}
            </div>
        </h3>
        <section class="blog-card-body">{{ Str::substr($post->content, 0, 150).'...' }}</section>
        <p class="text-tiny"><time>
                {{ $post->date }}
            </time><i class="fa-solid fa-clock"></i></p>
    </div>
</div>

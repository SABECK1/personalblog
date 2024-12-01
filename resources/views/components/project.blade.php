<div class="blog-card" onclick="goToUrl('{{ $project->html_url }}', event)">
{{--    <img class="blog-image" src="{{ asset($post->image_path) }}" alt="Post Image">--}}
    <div class="blog-details">
        <div class="blog-topic text-tiny" onclick="goToUrl('{{ route('posts') }}', event)">
            {{ $project->language }}
        </div>
        <h3>
            <div class="title">
                {{ $project->name }}
            </div>
        </h3>
        <section class="blog-card-body">{{ Str::substr(strip_tags($project->description), 0, 150).'...' }}</section>
        <p class="text-tiny"><time>
                {{ Str::substr($project->created_at, 0, 10) }}
            </time><i class="fa-solid fa-clock"></i></p>
    </div>
</div>

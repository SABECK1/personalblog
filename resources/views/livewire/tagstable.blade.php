
    <section name="tags" class="table-wrapper">

        <span class="h2">Tags</span>
        <div class="flex-wrapper">
            @foreach ($tags as $tag)
                <div class="text-wrapper-sm text-sm">
                    <a href="{{url()->query('/posts?'.request()->getQueryString(), ['filter[tags.tag_name]' => $tag->tag_name])}}">{{$tag->tag_name }}</a>
                </div>
            @endforeach
        </div>
    </section>


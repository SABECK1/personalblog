
    <section name="tags" class="table-wrapper">

        <span class="h2">Tags</span>
        <div class="flex-wrapper">
            @foreach ($tags as $tag)
                <div class="text-wrapper-sm text-sm">
                    {{ $tag->tag_name }}
                </div>
            @endforeach
        </div>
    </section>


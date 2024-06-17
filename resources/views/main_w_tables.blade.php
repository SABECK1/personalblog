@extends('main')


@section('categories')
    <section name="categories" class="table-wrapper">
        <table class="table">
            <span class="h2">Categories</span>
            <thead>
            <tr>
                <th></th>
                <th>Category</th>
                <th class="table-count">Posts</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class='icon-column'><i class='{{ $category->icon }}'></i></td>
                    <td>{{ $category->category_name }}</td>
                    <td class='table-count'>{{ $category->category_count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection

@section('tags')
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
@endsection

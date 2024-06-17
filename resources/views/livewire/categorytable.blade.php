
    <section name="categories" class="table-wrapper">
        <table class="table">
            <span class="h2">Categories</span>
            <thead>
            <tr>
                <th class="table-count"></th>
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


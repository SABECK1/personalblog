@extends('layouts.template')

@section('content')
    <script src="{{ asset('/js/validation_contact.js') }} " defer></script>
    <body class="light-theme">
    <div class="main">
        <div class="blog">
            <h2 class="h1">Interesting Projects</h2>
            <section class="container">
                <div class="blog-card-group">
                    @foreach ($response as $project)
                        @if(!$project->private and !$project->fork)
                            <x-project :project="$project" />
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection

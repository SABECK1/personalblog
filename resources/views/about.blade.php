@extends('layouts.template')
@section('content')
<section class="about" id="about">

    <div class="container">

        <div class="img-box">
            <img src="{{ asset('images/hero.png') }}" alt="Samuel Beck" class="hero_img">
        </div>

        <div class="content">

            <h2>My name is elora.</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Recusandae aut adipisci necessitatibus veniam, provident
                vero architecto praesentium, non sequi libero corrupti molestias.
                Architecto voluptate eligendi maiores, error magni accusamus officia.</p>

            <div class="about-info">

                <div class="info">
                    <h4>Age: <span>21</span></h4>
                    <h4>Languages: <span>German, English</span></h4>
                    <h4>Specialisation: <span>Front-End developer</span></h4>
                    <a href="#" class="btn btn-primary">Download CV<i class="fas fa-download"></i></a>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection

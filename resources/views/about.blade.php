@extends('layouts.template')
@section('content')
<section class="about" id="about">

    <div class="container">

        <div class="img-box-invert">
            <img src="{{ asset('images/hero.png') }}" alt="Samuel Beck" class="hero_img">
        </div>

        <div class="content">

            <h2>Hi there, I'm <b class="accent_link">Samuel Beck,</b></h2>
            <p>I started this blog during my apprenticeship to improve my web development skills and keep track of what I was learning along the way.
                Since then, I’ve explored a range of small projects driven by topics that sparked my interest — many of which are shared on my <a href="https://github.com/SABECK1" class="accent_link">Github</a>.

            </p>

            <div class="about-info">
                <div class="info">
                    <h4>Age: <span>21</span></h4>
                    <h4>Languages: <span>German, English</span></h4>
                    <h4>Expertise: <span>Backend Development, SAP R/3 and S4/HANA</span></h4>
                </div>

            </div>

        </div>

    </div>
</section>



<section class="qualification">

    <div class="main">
            <h1 class="h1">Qualifications</h1>
        <div class="education">
            <div class="experience-item">
                <i class="fas fa-graduation-cap"></i>
                <div class="content">
                    <span>2022</span>
                    <h3>High School Diploma (Abitur)</h3>
                    <p>Emphasis on mathematics and science</p>
                </div>
            </div>

            <div class="experience-item">
                <i class="fas fa-briefcase"></i>
                <div class="content">
                    <span>2022 - 2025</span>
                    <h3>Apprenticeship</h3>
                    <p>Completed an apprenticeship at A. Kayser Automotive Systems GmbH, earning a certification <br> as an
                        IT specialist in application development (Fachinformatiker für Anwendungsentwicklung).
                        <br> Subsequently employed as a full-time backend developer specializing in SAP R/3.
                    </p>
                </div>
            </div>

            <div class="experience-item">
                <i class="fas fa-graduation-cap"></i>
                <div class="content">
                    <span>2025 - now</span>
                    <h3>Dual Study - Bachelor of Science </h3>
                    <p>Currently pursuing a Bachelor of Science in Business Informatics (Commercial Information Technology) in cooperation with Siemens Mobility <br>
                    at the Ostfalia Hochschule für angewandte Wissenschaften Wolfenbüttel</p>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection

@extends('layouts.checkout')

@section('title','Success | Travel 93')

@section('content')

    <!--  -->
        <main>

        <section class="section-detail-header-success"></section>
        <section class="section-content d-flex align-items-center">
            <div class="container text-center success">
                <img src="{{ url('frontend/assets/img/success.jpg') }}" height="300">
                <h1>Yay! Success</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur 
                    <br>
                    adipisicing elit, 
                </p>
                <br>
                <a href="{{ route('home')}}" class="btn btn-home-page mt-5 px-5">
                    Home Page
                </a>
            </div>
        </section>

    </main>


@endsection

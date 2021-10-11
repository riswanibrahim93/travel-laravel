@extends('layouts.home')

@section('title','Home | Travel 93')

@section('content')
<div class="section section-header">
        <div class="parallax filter">
            <div class="image"
                style="background-image: url('{{ url('/frontend/assets/img/header.jpg') }}')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                        <h1 class="title-modern">Travel 93</h1>
                        <h3 class="text-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</h3>
                        <br><br>
                        <a href="#team" class="btn btn-join-now">Get Start</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="row">
                <div class="title-area">
                    <h2>Our Services</h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. </p>
                </div>
            </div>
            <div class="row infos">
                <div class="col-md-3 m-a">
                    <h3>13 K<p>Member</p></h3>
                </div>
                <div class="col-md-3 m-a bl">
                    <h3>11<p>Contries</p></h3>
                </div>
                <div class="col-md-3 m-a bl">
                    <h3>4 K<p>Hotel</p></h3>
                </div>
                <div class="col-md-3 m-a bl">
                    <h3>65<p>Partner</p></h3>
                </div>
            </div>
        </div>
    </div>


    <div class="section section-our-team-freebie"  id="team">
        <div class="parallax filter filter-color-black">
            <div class="image" style="background-image:url('{{ url('/frontend/assets/img/header-2.jpeg') }}')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="title-area">
                            <h2>Wisata Popular</h2>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco</p>
                        </div>
                    </div>

                    <div class="team">
                        <div class="row">
                            @foreach($items as $item)
                            <div class="col-md-3">
                                <div class="card card-member">
                                    <div class="content">
                                        <img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}">
                                        
                                        <div class="description">
                                            <h3 class="title">{{$item->title}}</h3>
                                            <p class="small-text">{{$item->location}}</p>
                                            <p class="desc-text">{{$item->about}}</p>
                                        </div>
                                        <a href="{{ route('detail',$item->slug) }}" class="btn btn-primary btn-fill">Detail</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section section-our-clients-freebie">
        <div class="container">
            <div class="title-area">
                <h5 class="subtitle text-gray">Here are some</h5>
                <h2>Clients Testimonials</h2>
            </div>

            <ul class="nav nav-text" role="tablist">
                <li class="active">
                    <a href="#testimonial1" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="{{ url('/frontend/assets/img/faces/face_5.jpg') }}"/>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#testimonial2" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="{{ url('/frontend/assets/img/faces/face_6.jpg') }}"/>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#testimonial3" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="{{ url('/frontend/assets/img/faces/face_2.jpg') }}"/>
                        </div>
                    </a>
                </li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="testimonial1">
                    <p class="description">
                        And I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. Now there is only one important color... Green I even had the pink polo I thought I was Kanye I promise I will never let the people down. I want a better life for all!
                    </p>
                </div>
                <div class="tab-pane" id="testimonial2">
                    <p class="description">Green I even had the pink polo I thought I was Kanye I promise I will never let the people down. I want a better life for all! And I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. Now there is only one important color...
                    </p>
                </div>
                <div class="tab-pane" id="testimonial3">
                    <p class="description"> I used a period because contrary to popular belief I strongly dislike exclamation points! We no longer have to be scared of the truth feels good to be home In Roman times the artist would contemplate proportions and colors. The 'Gaia' team did a great work while we were collaborating. They provided a vision that was in deep connection with our needs and helped us achieve our goals.
                    </p>
                </div>

            </div>

        </div>
    </div>
@endsection
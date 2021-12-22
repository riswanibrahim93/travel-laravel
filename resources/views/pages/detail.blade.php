@extends('layouts.home')

@section('title','Detail | Travel 93')

@section('content')

    <!--  -->
        <main>
        <section class="section-detail-header"></section>
        <section class="section-detail-content">
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>
                <div class="row ml-2">
                    <div class="col p-0">

                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-detail">
                            <h1>{{ $item->title }}
                                <p>
                                    {{ $item->location }}
                                </p>
                            </h1>
                            
                            @if($item->galleries->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
                                    </div>
                                    <div class="xzoom-thumbs">
                                        @foreach($item->galleries as $gallery)
                                            <a href="{{ Storage::url($gallery->image)}}">
                                            <img src="{{ Storage::url($gallery->image)}}" class="xzoom-gallery" width="128" xpreview="{{ Storage::url($gallery->image)}}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <h2>Tentang Wisata</h2>
                            <p>{{ $item->about }}</p>
                            <div class="features row">
                                <div class="col-md-4 br">
                                    <img src="{{ url('/frontend/assets/img/ticket.png') }}" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Featured Event
                                            <p>{{ $item->featured_event}}</p>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-4 br">
                                    <img src="{{ url('/frontend/assets/img/linguistics.png') }}" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Language
                                            <p>{{ $item->language}}</p>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ url('/frontend/assets/img/fast-food.png') }}" alt="" class="features-image">
                                    <div class="description">
                                        <h3>Foods
                                            <p>{{ $item->foods}}</p>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-detail">
                            <h2>Members are going</h2>
                            <div class="members my-2">
                                <img src="{{ url('frontend/assets/img/faces/face_1.jpg') }}" class="img-circle member-image mr-1">
                                <img src="{{ url('frontend/assets/img/faces/face_2.jpg') }}" class="img-circle member-image mr-1">
                                <img src="{{ url('frontend/assets/img/faces/face_3.jpg') }}" class="img-circle member-image mr-1">
                                <img src="{{ url('frontend/assets/img/faces/face_4.jpg') }}" class="img-circle member-image mr-1">
                                <img src="{{ url('frontend/assets/img/faces/face_5.jpg') }}" class="img-circle member-image mr-1">
                            </div>
                            <hr>

                            <h2>Checkout Informations</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Date of Departure</th>
                                    <td width="50%" class="text-right" style="padding-left: 20px;">
                                        {{ \Carbon\Carbon::create($item->departure_date)->format('F n,Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Duration</th>
                                    <td width="50%" class="text-right">
                                        {{ $item->duration}}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Type</th>
                                    <td width="50%" class="text-right">
                                        {{ $item->type}}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">
                                        ${{ $item->price}} / person
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container">
                            @auth
                                <form action="{{ route('checkout-process',$item->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-block btn-join-now" type="submit">
                                        Join Now
                                    </button>
                                </form>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-block btn-join-now">
                                 Login or Register to Join 
                                </a>
                            @endguest
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('/frontend/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('/frontend/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function(){
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333538',
            Xoffset: 15
        });
        });
    </script>
@endpush
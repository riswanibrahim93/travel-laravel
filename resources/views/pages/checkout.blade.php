@extends('layouts.checkout')

@section('title','Checkout | Travel 93')

@section('content')

    <!--  -->
    <main>
        <section class="section-detail-header"></section>
        <section class="section-detail-content">
            <div class="container">
                <div class="row ms-2">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('detail',$item->travel_package->slug) }}">Details</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-detail">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h1>Who is Going?
                                <p>
                                    Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}
                                </p>
                            </h1>
                            <div class="attendee">
                                <table class="table table-responsive text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Nationality</td>
                                            <td>Passport</td>
                                            <td>Status</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($item->detail as $detail)
                                            <tr>
                                                <td class="align-middle">
                                                    <img class="img-circle" src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60" class="rounded-circle">
                                                </td>
                                                <td class="align-middle">
                                                    {{ $detail->username }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $detail->nationality }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ $detail->is_visa ? '30/days' : 'N/A' }}
                                                </td>
                                                <td class="align-middle">
                                                    {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $detail->id) }}">
                                                        <img src="{{ url('frontend/assets/img/x.png') }}" height="30">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>
                                                    No Visitor
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form class="form-inline" action="{{ route('checkout-create', $item->id)}}" method="post">
                                    @csrf
                                    <label class="sr-only" for="username">Usernama</label>
                                    <input type="text" name="username" style="width: 200px" class="form-control mb-2 ms-sm-2" id="username" placeholder="Username" required>

                                    <label class="sr-only" for="nationality">Nationality</label>
                                    <input type="text" name="nationality" style="width: 150px" class="form-control mb-2 ms-sm-2" id="nationality" placeholder="Nationality" required>

                                    <label class="sr-only" for="is_visa">Visa</label>
                                    <select class="form-control custom-select mb-2 ms-sm-2" name="is_visa" id="is_visa" required>
                                        <option value="" selected>VISA</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                    </select>

                                    <label class="sr-only" for="doePassport">DOE Passport</label>
                                    <!-- <div class="input-group"> -->
                                        <input type="text" name="doe_passport" class="datepicker ml-5 mb-2 ms-sm-2 " id="doePassport" placeholder="DOE Passport">
                                    <!-- </div> -->
                                    <button type="submit" class="btn btn-addon">Add Now</button>
                                </form>
                            </div>
                            <div class="note">
                                <h5>Note 
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </h5>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-detail card-right">
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
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-right">
                                        {{ $item->detail->count() }} person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional VISA</th>
                                    <td width="50%" class="text-right">
                                        ${{ $item->additional_visa }},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">
                                        ${{ $item->travel_package->price}},00 / person
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-right">
                                        ${{ $item->transactional_total }},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique Code)</th>
                                    <td width="50%" class="text-right">
                                        <span class="text-blue">$
                                            {{ $item->transactional_total }},
                                            <span class="text-orange">
                                                {{ mt_rand(0,99) }}
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h2>Payment Introduction</h2>
                            <p class="pay">
                                Pleace complete your paymentbefore to continue the wonderfull trip
                            </p>
                            <div class="bank">
                                <div class="bank-item">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="{{ url('frontend/assets/img/bank.png') }}" class="bank-image">
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="description">
                                                <h3>PT. Travel 93</h3>
                                                <p>
                                                    085700830240
                                                    <br>
                                                    Bank Rakyat Indonesia
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                            <a href="{{ route('checkout-success',$item->id) }}" class="btn btn-block btn-join-now"> I Have Made Payment </a>
                        </div>
                        <div class="join-container-cancel">
                            <a href="{{ route('detail',$item->travel_package->slug) }}" class="text-muted text-center"> Cancel Booking</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@push('addon-style')
    <link href="{{ url('frontend/gijgo/css/gijgo.min.css') }}" rel="stylesheet" />
@endpush

@push('addon-script')
    <!--  js library for date gijgo -->
    <script src="{{ url('frontend/gijgo/js/gijgo.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap3',
                icons: {
                    rightIcon: '<img src="{{ url("frontend/assets/img/date.png") }}" height="20">'
                }
            })
        });
    </script>
@endpush
@extends('layouts.admin')
@section('title','Transaction')
@section('content')
    <!-- Main Content -->
    <div id="content">

        @include('includes.admin.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Detail Transaction {{ $item->user->name }}</h1>
            </div>

            <div class="row">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <th>Id</th>
                                <td>{{ $item->id }}</td>
                            </tr>
                            <tr>
                                <th>Paket Travel</th>
                                <td>{{ $item->travel_package->title }}</td>
                            </tr>
                            <tr>
                                <th>Pembeli</th>
                                <td>{{ $item->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Additional Visa</th>
                                <td>{{ $item->additional_visa }}</td>
                            </tr>
                            <tr>
                                <th>Total Transaksi</th>
                                <td>{{ $item->transactional_total }}</td>
                            </tr>
                            <tr>
                                <th>Status Transaksi</th>
                                <td>{{ $item->transactional_status }}</td>
                            </tr>
                            <tr>
                                <th>Pembelian</th>
                                <td>
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>National</th>
                                            <th>Visa</th>
                                            <th>DOE Passport</th>
                                        </tr>
                                        <tr>
                                            @forelse($item->details as $detail)
                                            <tr>
                                                <td>{{ $detail->id }}</td>
                                                <td>{{ $detail->username }}</td>
                                                <td>{{ $detail->nationality }}</td>
                                                <td>{{ $detail->is_visa ? '30Day' : 'N/A' }}</td>
                                                <td>{{ $detail->doe_passport }}</td>
                                                
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">
                                                        Data Kosong
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tr>
                                    </table>
                                </td>
                        </table>
                    </div>
                </div>
            </div>



            

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
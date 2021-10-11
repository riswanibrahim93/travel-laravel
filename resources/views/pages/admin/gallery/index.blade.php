@extends('layouts.admin')
@section('title','Gallery')
@section('content')
    <!-- Main Content -->
    <div id="content">

        @include('includes.admin.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
                <a href="{{ route('gallery.create')}}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus"></i>Tambah Gallery
                </a>
            </div>

            <div class="row">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Travel</td>
                                    <td>Gambar</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->travel_package->title }}</td>
                                        <td>
                                            <img src="{{ Storage::url($item->image) }}" alt="" style="width: 200px;" class="img-thumbnail rounded mx-auto d-block">
                                        </td>
                                        <td>
                                            <a href="{{ route('gallery.edit', $item->id)}}" class="btn btn-info">
                                            <i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('gallery.destroy', $item->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Data Kosong
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
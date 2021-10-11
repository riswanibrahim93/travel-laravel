@extends('layouts.admin')
@section('title','Gallery')
@section('content')
    <!-- Main Content -->
    <div id="content">

        @include('includes.admin.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
            </div>

            @if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

            
		    <div class="row ">
		        <div class="col-lg">
		            <div class="card mt-2 mx-auto p-4 bg-light">
		                <div class="card-body bg-light">
		                    <div class="container">
		                        <form id="contact-form" role="form" action="{{ route('gallery.update', $item->id) }}" method="post" enctype="multipart/form-data">
		                        	@method('PUT')
		                        	@csrf
		                            <div class="controls">
		                                <div class="row">
		                                    <div class="col-md-12">
		                                        <div class="form-group"> <label for="form_need">Travel Package</label> 
		                                        	<select id="form_need" name="travel_packages_id" class="form-control" data-error="Please specify your need.">
		                                                <option value="{{ $item->travel_packages_id }}">
		                                                	Jangan Diubah
		                                                </option>
		                                                @foreach($travel_packages as $travel_package)
		                                                	<option value="{{ $travel_package->id }}">
		                                                		{{ $travel_package->title }}
		                                                	</option>
		                                                @endforeach
		                                            </select> 
		                                        </div>
                                    		</div>
		                                </div>
		                                <div class="row">
                                    		<div class="col-md-12">
		                                        <div class="form-group"> <label for="image">Image</label> <input id="image" type="file" name="image" class="form-control" required="required" data-error="image is required.">
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="row">
		                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Simpan">
		                                    </div>
		                                </div>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div> <!-- /.8 -->
		        </div> <!-- /.row-->
		    </div>
					



            

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
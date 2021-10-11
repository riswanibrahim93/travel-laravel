@extends('layouts.admin')
@section('title','Transaction')
@section('content')
    <!-- Main Content -->
    <div id="content">

        @include('includes.admin.navbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="h3 mb-0 text-gray-800">Edit Transaction</h1>
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
		                        <form id="contact-form" role="form" action="{{ route('transaction.update', $item->id) }}" method="post">
		                        	@method('PUT')
		                        	@csrf
		                            <div class="controls">
		                                <div class="row">
		                                    <div class="col-md-12">
		                                        <div class="form-group"> <label for="form_need">Travel Package</label> 
		                                        	<select id="form_need" name="transactional_status" class="form-control" data-error="Please specify your need.">
		                                                <option value="{{ $item->transactional_status }}">
		                                                	Jangan Diubah ({{ $item->transactional_status }})
		                                                </option>
		                                                <option value="IN_CART">IN_CART</option>
		                                                <option value="PANDDING">PANDDING</option>
		                                                <option value="SUCCESS">SUCCESS</option>
		                                                <option value="CANCEL">CANCEL</option>
		                                                <option value="FAILED">FAILED</option>
		                                            </select> 
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
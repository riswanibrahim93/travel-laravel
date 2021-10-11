@extends('layouts.login')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-6 text-center mb-3">
			<h2 class="heading-section">Login</h2>
		</div>
	</div>
	<div class="row justify-content-center">
		<form method="POST" action="{{ route('login') }}" class="signin-form"  style="width: 30%">
            @csrf

            <div class="form-group">
        		<input id="email" type="email" placeholder="E-Mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
	        	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
            </div>
            <div class="form-group d-md-flex">
	        	<div class="w-50">
	            	
				</div>
				<div class="w-50 text-md-right">
					<a href="{{ route('register') }}" style="color: #fff">Registrasi</a>
				</div>
	        </div>
        </form>
	</div>
@endsection
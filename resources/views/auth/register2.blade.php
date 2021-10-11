@extends('layouts.login')

@section('content')
	<div class="row justify-content-center">
		<div class="col-md-6 text-center mb-3">
			<h2 class="heading-section">Register</h2>
		</div>
	</div>
	<div class="row justify-content-center">
		<form method="POST" action="{{ route('register') }}" class="signin-form"  style="width: 30%">
            @csrf
            <div class="from-group">
            	<input id="name" type="text" placeholder="Username" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>	
            <div class="form-group">
        		<input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                <input id="password-confirm" type="password" placeholder="Password Confirmation" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>

            <div class="form-group">
	        	<button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
            </div>
            <div class="form-group d-md-flex">
	        	<div class="w-50">
	            	
				</div>
				<div class="w-50 text-md-right">
					<a href="{{ route('login') }}" style="color: #fff">Login</a>
				</div>
	        </div>
        </form>
	</div>
@endsection
@extends('layouts.user')

@section('content')


<div class="d-flex flex-column flex-root">
<!--begin::Login-->
<div class="login login-signin-on login-3 d-flex flex-row-fluid" id="kt_login">
<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url({{asset('dashboard_files/assets/media/bg/bg-3.jpg')}});">
<div class="login-form text-center p-7 position-relative overflow-hidden">
<!--begin::Login Header-->
<div class="d-flex flex-center mb-15">
<a href="#">
<img src="assets/media/logos/logo-letter-13.png" class="max-h-75px" alt="" />
</a>
</div>
<!--end::Login Header-->
<!--begin::Login Sign in form-->
<div class="login-signin">
<div class="mb-20">
<h3>Sign In To Admin</h3>
<div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
</div>
<form class="form"  method="POST" action="{{ route('login') }}">
@csrf

<div class="mb-5">
<span class="opacity-70 mr-4">Super Admin </span>
<a  id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">admin@admin.com - 123456</a>
</div>

<div class="form-group mb-5">
<input class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" type="email" placeholder="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group mb-5">
<input class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>

<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
<label for="remember" class="checkbox m-0 text-muted">
<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />Remember me
<span></span></label>
@if (Route::has('password.request'))
<a href="{{ route('password.request') }}" id="kt_login_forgot" class="text-muted text-hover-primary">Forget Password ?</a>
@endif
</div>
<button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
</form>
</div>

</div>
</div>
</div>
<!--end::Login-->
</div>

@endsection

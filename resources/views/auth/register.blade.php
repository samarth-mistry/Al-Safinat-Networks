@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="register-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="{{ url('/') }}" class="h1">
                        <img src="{{ asset('dist/img/sa-flag-icon.png') }}" height="70" width="70" class="img-circle elevation-2" alt="User Image">
                        <br><b>{{ config('app.name') }}</b> Networks
                    </a>
                </div>
                <div class="card-body">
                <p class="login-box-msg">Register into system</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="input-group mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-user"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fa fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password-confirm" placeholder="Retype password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fa fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                            I agree to <a href="#">T&C</a>
                            </label>
                            </div>
                        </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>
                <a href="{{ route('login') }}" class="text-center">Already registered? Login here...</a>
                </div>
            </div><!-- /.card -->
            </div>
    </div>
</div>
@endsection

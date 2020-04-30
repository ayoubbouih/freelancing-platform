@extends('layouts.app')

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-lg-5 d-none d-lg-block">
        <img class="img-responsive w-100 align-middle" src="{{ asset('images/sideLogin.png') }}">
        </div>

        <div class="col-lg-7">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Nous sommes ravis de vous revoir!</h3>
                <span>Vous n'avez pas de compte? <a href="{{ route('register') }}" class="nav-link d-inline p-0 ml-3"><b>S'inscrire!</b></a></span>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user-o"></i>
                                </span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email">
                        </div>
                        <div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                        </div>
                        <div>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <a href="{{ route('password.request') }}" class="nav-link">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        <button class="btn btn-primary btn-block">{{ __('Login') }}</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <span class="text-muted"><b>ou</b></span>
                    <button class="btn btn-outline btn-block" style="background: #dd4b39;color:#fff"> Log In via Google</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

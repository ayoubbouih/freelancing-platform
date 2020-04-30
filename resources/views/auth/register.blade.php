@extends('layouts.app')

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-lg-5 d-none d-lg-block">
            <img class="img-responsive w-100 align-middle" src="images/sideLogin.png">
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h3>Créons votre compte!</h3>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group mb-3">
                        <input type="text" name="fname" class="form-control" placeholder="{{ __('First Name') }}" required>
                            <input type="text" name="lname" class="form-control" placeholder="{{ __('Last Name') }}" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="{{ __('Username') }}" required autocomplete="email">
                        </div>
                        <div>
                            @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                        </div>
                        <div>
                            @error('password')
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
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                        </div>
                        <button class="btn btn-success btn-block">{{ __('Register') }}</button>
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

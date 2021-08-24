@extends('layouts.app')

@section('meta-generator')
<meta name="title" content="S'identifier | BeEmployer">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="index , follow">
<meta name="description" content="S'identifier | BeEmployer">
<title>S'identifier | BeEmployer</title>
@endsection

@section('content')
<div class="container content pt-3">
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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Adresse email" required autocomplete="email">
                        </div>
                            @error('email') 
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <span>{{$message}}</span>
                              </div>
                            @enderror

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mot de passe" required autocomplete="current-password">
                        </div>
                        @error('password')
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <span>{{$message}}</span>
                            </div>
                        @enderror

                        <a href="{{ route('password.request') }}" class="nav-link">
                            Mot de passe oublié?
                        </a>
                        <button class="btn btn-primary btn-block">S'identifier</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <span class="text-muted"><b>ou</b></span>
                    <a href='/auth/google'><button class="btn btn-outline btn-block" style="background: #dd4b39;color:#fff"> Connectez-vous via Google</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

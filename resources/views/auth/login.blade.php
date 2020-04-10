@extends('layouts.app')

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-lg-5 d-none d-lg-block">
            <img class="img-responsive w-100 align-middle" src="images/sideLogin.png">
        </div>

        <div class="col-lg-7">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Nous sommes ravis de vous revoir!</h3>
                    <span>Vous n'avez pas de compte? <a href="#" class="nav-link d-inline p-0 ml-3"><b>S'inscrire!</b></a></span>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user-o"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Email Address" required />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" autocomplete="current-password" required />
                        </div>

                        <a href="#" class="nav-link">Mot de passe oublié?</a>
                        <button class="btn btn-primary btn-block">Log In</button>
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

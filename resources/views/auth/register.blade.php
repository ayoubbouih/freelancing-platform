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
                    <form method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Prenom" required>
                            <input type="text" class="form-control" placeholder="Nom" required>
                        </div>
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
                            <input type="password" class="form-control" placeholder="password" required />
                        </div>
    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" placeholder="repeat password" required />
                        </div>
                        <button class="btn btn-success btn-block">Register</button>
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

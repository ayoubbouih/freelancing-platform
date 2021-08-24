@extends('layouts.app')

@section('meta-generator')
<title>404 | BeEmployer</title>
@endsection

@section('content')
<div class="container content">
    <div class="row">
        <div class="col-md-12 text-center py-3">
            <div>
                <h2>Oops! - page demandée introuvable</h2>
                <div>
                    Désolé, une erreur s'est produite, page demandée introuvable!
                </div>
                <div>
                    <p class="display-1 text-danger" style="font-size:8rem">404</p>
                </div>
                <div>
                    <a href="{{route('index')}}" class="btn btn-primary">
                        Principal
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
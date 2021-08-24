@extends('Users.dashboard')
@section('meta-generator')
<meta name="title" content="Avis | Beemployer">
<meta name="robots" content="noindex , nofollow">
<title>Avis | Beemployer</title>
@endsection
@section('includes')
    <link href="{{asset('css/users/left-dashboard.css')}}" rel=stylesheet>
@endsection
@section('avis','active')
@section('right')
<div class="container mt-3 pr-sm-0">

    @if(session()->has('success'))
        <div class="alert alert-success py-1 mt-1">{{session()->get('success')}}</div>
    @endif
	<div class="text-center border-bottom border-primary">
		<h3>Les avis</h3>
	</div>
	<?php $i=0; ?>
    @forelse($avis??[] as $avi)
        <div class="my-2 border p-2 shadow">
            <div class="row">
                <div class="col-12">
                    <h4 class="d-inline">
                        <span>{{$avi->recrutement->demande->poste->projet->user->username}}</span>
                        @for($a=$avi->note;$a>0;$a--)
                            <i class="fa fa-star d-inline" style="color:#ffd600;font-size:.9em"></i>
                        @endfor
                    </h4>
                    <span class="pull-right">Le projet: {{$avi->recrutement->demande->poste->projet->intitule}} |  {{$avi->recrutement->demande->poste->intitule}}</span><br>
                    <div class="clearfix"></div>
                </div>
                <div class="col-12 position-relative" style="top:-8px;left:5px">
                    <span class="text-muted small">{{$avi->created_at->diffForHumans()}}</span>
                </div>
                <div class="clearfix"></div>
                <div class="col-12 text-center">
                    <span style="font-size:1.15em">{{$avi->description}}</span>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center my-5 py-2">
            <h2 class="tex-muted">Vous n'avez pas aucun Avis maintenant</h2>
        </div>
    @endforelse
</div>
@endsection
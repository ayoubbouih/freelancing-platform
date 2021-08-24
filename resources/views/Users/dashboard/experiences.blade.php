@extends('Users.dashboard')
@section('meta-generator')
<meta name="title" content="Expériences | BeEmployer">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="index , follow">
<title>Expériences | BeEmployer</title>
@endsection
@section('experiences','active')
@section('right')
<div class="container mt-3 pr-sm-0">

    @if(session()->has('success'))
        <div class="alert alert-success py-1 mt-1">{{session()->get('success')}}</div>
    @endif
	<div class="text-center border-bottom border-primary">
		<h3>Mes Expériences</h3>
	</div>
	<div class="pull-right">
	    <a href="{{route('experience.create')}}">
	        <button class="btn btn-primary p-1 mt-1">Ajouter une experiénce</button>
	    </a>
	</div>
	<div class="clearfix"></div>
    @forelse($experiences as $experience)
        <div class="my-2 border p-2 shadow">
            <div class="row">
                <div class="col-12">
                    <h4 class="d-inline">{{$experience->intitule}} - <span style="font-size:0.7em">Ajouter: {{$experience->date->diffForHumans()}}</span></h4>
                    <div class="pull-right">
                        <a href="{{route('experience.edit',$experience->id)}}">
                            <button class="btn btn-success py-md-1"><i class="fa fa-pencil"></i></button>
                        </a>
                        <form action="{{route('experience.destroy',$experience->id)}}" method=post class="d-inline" onSubmit="return confirm('Est ce que vous étes sûr?')">
                            @csrf
                            @method('delete')
                            <button type=submit class="btn btn-danger py-md-1"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-{{$experience->image?'8':12}}">
                    <span>le lien est: <a href="{{$experience->lien}}">{{substr($experience->lien,0,50)}}</a></span><br>
                    <span style="font-size:1.15em">{{$experience->description}}</span>
                </div>
                @if($experience->image)
                    <div class="col-md-4 pl-0 text-center">
                        <img class="w-100" src="{{asset('images/experiences')}}/{{$experience->image}}">
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="text-center my-5 py-2">
            <h2 class="tex-muted">Vous n'avez pas ajouter aucune expérience</h2>
        </div>
    @endforelse
</div>
@endsection
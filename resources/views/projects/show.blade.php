@extends('layouts.app')
@section('content')
    <h1 class="mt-5 pt-5">intitule du projet est  {{$projet->intitule}}</h1>
    <p>{{ $projet->user->email}}</p>
    
    @foreach($projet->postes->all() as $poste)
        {{$poste->intitule}}
    @endforeach
    @endsection
    
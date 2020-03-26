@extends('layouts.app')
@section('content')
    <h1 class="mt-5 pt-5">show all projects</h1>
    @if($projets->count())
        @foreach($projets as $projet)
            <h1>{{ $projet->id }}</h1>
        @endforeach
    @else
        echo "there is no project for the moment<br>";
    @endif
@endsection
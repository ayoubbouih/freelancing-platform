@extends('Users.admin.left-dashboard')
@section('meta-generator')
<meta name="title" content="Dashboard de l'administrateur">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="noindex , nofollow">
<meta name="description" content="Documentation de l'administrateur | Beemployer">
<title>Documentation de l'administrateur | Beemployer</title>
@endsection
@section('includes')
<link href="{{asset('css/users/dashboard.css')}}" rel="stylesheet">
<link href="{{asset('css/users/left-dashboard.css')}}" rel="stylesheet">
<style>
    #footer h3{
        color:#FFF;
    }
</style>
@endsection
@section('documentation','active')
@section("right")
<div>
    
</div>
@endsection
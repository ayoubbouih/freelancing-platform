@extends('Users.admin.left-dashboard')
@section('meta-generator')
<meta name="title" content="Dashboard de l'administrateur">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="noindex , nofollow">
<meta name="description" content="{{$user->description}}">
<title>Dashboard de l'administrateur | Beemployer</title>
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
@section('dashboard','active')
@section("right")
	<!--</div>-->
	<div class="simplebar-track horizontal" style="visibility: visible;">
	    <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="overflow:hidden"><div class="simplebar-content" style="overflow-x:hidden;margin-right: -17px;">
		<div class="dashboard-content-inner">
			
			<div class="row">
    			<!-- Dashboard Headline -->
    			<div class="col-12 dashboard-headline mb-2">
    				<h3 class="mb-0">{{$user->fullname}}</h3>
    				<span class="mt-0">ravis de vous revoir admin!</span>
    			</div>
    			<!-- Fun Facts Container -->
			    <div class="col-12">
    				<div class="row justify-content-center">
        				<div class="fun-fact p-3" data-fun-fact-color="#36bd78">
        					<div class="fun-fact-text">
        						<span>Total</span>
        						<h4>{{App\User::sum('solde')}}$</h4>
        					</div>
        					<div class="fun-fact-icon" style="background-color: rgba(54, 189, 120, 0.07);"><i class="fa fa-usd" style="color: rgb(54, 189, 120);"></i></div>
        				</div>
        				<!--<div class="fun-fact p-3" data-fun-fact-color="#b81b7f">-->
        				<!--	<div class="fun-fact-text">-->
        				<!--		<span>mes demandes</span>-->
        				<!--		<h4>{{$user->demandes->count()}}</h4>-->
        				<!--	</div>-->
        				<!--	<div class="fun-fact-icon" style="background-color: rgba(184, 27, 127, 0.07);"><i class="fa fa-reply" style="color: rgb(184, 27, 127);"></i></div>-->
        				<!--</div>-->
        				<div class="fun-fact p-3" data-fun-fact-color="#efa80f">
        					<div class="fun-fact-text">
        						<span>Tous les projets</span>
        						<h4>{{App\projet::cursor()->count()}}</h4>
        					</div>
        					<div class="fun-fact-icon" style="background-color: rgba(239, 168, 15, 0.07);"><i class="fa fa-briefcase" style="color: rgb(239, 168, 15);"></i></div>
        				</div>
        				<div class="fun-fact" data-fun-fact-color="#efa80f">
                            <div class="fun-fact-text">
        						<span>Recrutements</span>
        						<h4>{{App\recrutement::cursor()->count()}}</h4>
        					</div>
        					<div class="fun-fact-icon" style="background-color: rgba(239,168,15, 0,07);"><i class="fa fa-building" style="color: rgb(239,168,15, 15)"></i></div>
        				</div>
        				<div class="fun-fact p-3">
        					<div class="fun-fact-text">
        						<span>Gain de site</span>
        						@php $sum=0;foreach(App\recrutement::where('status','terminé')->get() as $recrutement) $sum+=($recrutement->demande->prix*.2) @endphp
        						<h4>{{$sum}}$</h4>
        					</div>
        					<div class="fun-fact-icon" style="background-color: rgba(54, 189, 120, 0.07);"><i class="fa fa-money" style="color: rgb(54, 189, 120);"></i></div>
        				</div>
    				</div>
    			</div>
			</div>
			
			<!-- Row -->
		</div>
	</div>
	</div>
	</div>
	<!-- Dashboard Content / End -->
@endsection
@extends('Users.dashboard')
@section('meta-generator')
<meta name="title" content="{{$user->username}}">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="noindex , nofollow">
<meta name="description" content="{{$user->description}}">
<title>Dashboard | Beemployer</title>
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
	<!--<div class="simplebar-track horizontal" style="visibility: visible;">-->
	<!--    <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>-->
	<!--</div>-->
	    <!--<div class="simplebar-scroll-content" style="overflow:hidden">-->
	        <!--<div class="simplebar-content" style="overflow-x:hidden;margin-right: -17px;">-->
	        <div>
	            <div>
		<div class="dashboard-content-inner">
			
			<div class="row">
    			<!-- Dashboard Headline -->
    			<div class="col-12 dashboard-headline mb-2">
    				<h3 class="mb-0">{{$user->fullname}}</h3>
    				<span class="mt-0">ravis de vous revoir!</span>
    			</div>
    			<!-- Fun Facts Container -->
			    <div class="col-12">
    				<div class="row justify-content-center">
        				<div class="fun-fact p-3"  style="background-color: rgba(54, 189, 120, 0.07);" data-fun-fact-color="#36bd78">
        					<div class="fun-fact-text">
        						<span>mon solde</span>
        						<h4>{{$user->solde}}$</h4>
        					</div>
        					<div class="fun-fact-icon" style="background-color: rgba(54, 189, 120, 0.07);"><i class="fa fa-usd" style="color: rgb(54, 189, 120);"></i></div>
        				</div>
        				<div class="fun-fact p-3" data-fun-fact-color="#b81b7f" style="background-color: rgba(184, 27, 127, 0.07);">
        					<div class="fun-fact-text">
        						<span>mes demandes</span>
        						<h4>{{$user->demandes->count()}}</h4>
        					</div>
        					<div class="fun-fact-icon" style="background-color: rgba(184, 27, 127, 0.07);"><i class="fa fa-reply" style="color: rgb(184, 27, 127);"></i></div>
        				</div>
        				<div class="fun-fact p-3" data-fun-fact-color="#efa80f" style="background-color: rgba(239, 168, 15, 0.07);">
        					<div class="fun-fact-text">
        						<span>mes projets</span>
        						<h4>{{$user->projets->count()}}</h4>
        					</div>
        					<div class="col-5 fun-fact-icon" style="background-color: rgba(239, 168, 15, 0.07);"><i class="fa fa-briefcase" style="color: rgb(239, 168, 15);"></i></div>
        				</div>
        				<div class="fun-fact d-none"></div>
        				<!--<div class="col-5 fun-fact" data-fun-fact-color="#efa80f"></div>-->
    				</div>
    			</div>
			</div>
			
			<!-- Row -->

			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-6 pl-0">
					<div class="dashboard-box">
						<div class="headline">
							<h3><i class="fa fa-briefcase"></i> Mes projets</h3>
							<button class="mark-as-read" title="minimiser">
									<i class="fa fa-arrow-down"></i>
							</button>
						</div>
						<div class="content">
						    
							<ul class="dashboard-box-list">
							    @forelse($prjts=$user->projets()->paginate(6)->setPageName('mesProjets') as $projet)
								<a href="{{route('projets.show',$projet->id)}}"><li>
									<span class="notification-icon"><img style="width:37px;height:37px" src="{{asset('images')}}/{{$projet->categorie->logo}}"></span>
									<span class="notification-text">
										<strong>{{$projet->intitule}}</strong>
									</span>
									@foreach($projet->postes as $poste)
									<button class="btn btn-sm btn-primary">{{$poste->intitule}}</button>
									@endforeach
									<!-- Buttons -->
									<div class="buttons-to-right single-right-button">
										<a href="#" class="button ripple-effect ico" data-tippy-placement="left" data-tippy="" data-original-title="Mark as read"><i class="fa fa-edit"></i></a>
									</div>
								</li></a>
								@empty
								    <h4 class="text-center mt-2">
								        <span class="text-muted">Vous n'avez publié aucun projet</span>
								    </h4>
								@endforelse
								<div class="d-flex justify-content-center mt-1">
								    {{$prjts->links()}}
								</div>
							</ul>
						</div>
					</div>
				</div>
				<!-- Dashboard Box -->
				<div class="col-xl-6 pl-0">
					<div class="dashboard-box">
						<div class="headline">
							<h3><i class="fa fa-reply"></i> Mes demandes</h3>
							<button class="mark-as-read" title="minimiser">
									<i class="fa fa-arrow-down"></i>
							</button>
						</div>
						<div class="content">
							<ul class="dashboard-box-list">
							    @foreach($dmnds=App\demande::where('user_id',auth::user()->id)->paginate(6)->setPageName('mesDemandes') as $demande)
								<li>
									<div class="invoice-list-item">
									<strong>{{$demande->poste->projet->intitule}}</strong>
										<ul>
											<li>
											    <span class="unpaid">{{$demande->poste->status?'fermé':'ouvert'}}</span>
											  </li>
											  <li>{{$demande->poste->intitule}}</li>
											<li>{{$demande->prix}}$</li>
											<li>{{$demande->duree}} jour{{$demande->duree>1?'s':''}}</li>
										</ul>
									</div>
									<!-- Buttons -->
									<div class="buttons-to-right">
										<a href="{{route('projets.show',$demande->poste->projet->id)}}" class="button">voir le projet</a>
									</div>
								</li>
								@endforeach
							</ul>
							<div class="d-flex justify-content-center mt-1">
							    {{$dmnds->links()}}
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- Row / End -->


		</div>
	</div>
	</div>
	</div>
	<!-- Dashboard Content / End -->
@endsection
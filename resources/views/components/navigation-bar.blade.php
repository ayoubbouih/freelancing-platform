
	<header id=header class="mb-5 pb-4">
		<nav class="navbar navbar-icon-top navbar-light bg-light navbar-expand-lg justify-content-sm-start fixed-top py-0">
		  <div class="container">
		    <div class="d-flex">
		        <a class="navbar-brand ml-lg-0 ml-2" href="{{ route('index') }}">
    				<img id=logo src="{{ asset('images/logo2.png') }}" style="height:45px !important" class="d-inline-block border-right-0" alt="">
    				<img id='logo-sm' src="{{ asset('images/logo-sm.png') }}" style="height:50px !important" alt="">
    			</a>
    			<ul class="navbar-nav d-flex flex-row guest my-auto @auth notification @endauth">
    			@if(Auth::check() && Auth::User()->role->intitule!="admin")
    				<li class="nav-item">
    					<a class="nav-link" href="{{route('projets.create')}}"><i class="fa fa-plus fa-xs"></i> <span class="d-none d-md-inline font-weight-bold">ajouter un projet</span></a>
    				</li>
    				@endif
    				<li class="nav-item">
    					<a class="nav-link" href="{{route('categorie.index')}}"><i class="fa fa-cubes mr-2"></i><span class="d-none d-md-inline font-weight-bold">voir les projets</span></a>
    				</li>  
    			</ul>
		    </div>
			
			@guest
			<ul class="navbar-nav d-flex flex-row guest">
			   <li class="nav-item ">
					<a href="{{ route('register') }}" class="nav-link"><i class="fa fa-user-plus px-3 px-sm-0"></i> <span class="d-none d-sm-inline mr-2 font-weight-bold">S'enregister</span></a>
				</li>
				<li class="nav-item ">
					<a href="{{ route('login') }}" class="nav-link"><i class="fa fa-sign-in"></i> <span class="d-none d-sm-inline mr-2 font-weight-bold">S'indentifier</span></a>
				</li> 
			</ul>
				
			@else
	
			<!--  User Notifications -->
				<ul class="navbar-nav notification">
					<li class="nav-item">
						<a href="#" class="nav-link notifications mt-2" title="Notifications">
							<i class="fa fa-bell" id="nbrnot">
							    @if($nts=auth::user()->notifications->whereNull('read_at')->count())
								    <span class="badge badge-primary rounded-circle" >{{$nts}}</span>
								@endif
							</i>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link messages mt-2" title="Messages">
							<i class="fa fa-envelope">
							    @if($nbrMsg=App\message::cursor()->where('recepteur_id',auth::user()->id)->where('Vu',0)->count())
								    <span class="badge badge-primary rounded-circle">{{$nbrMsg}}</span>
								@endif
							</i>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link user">
							<div class="user-avatar">
								<img class="rounded-circle" width=42 height=40 src="{{asset('images')}}/{{Auth::user()->image}}" alt="">
								<div class="online_icon rounded-circle"></div>
							</div>
						</a>
					</li>
				</ul>
				<!-- User Menu / End -->
		
				<!-- Dropdown -->
			
				<div class="header-notifications-dropdown d-none" id=notifications>
					
					<!--<div class="d-flex border-bottom">-->
					<!--	<h4 class="align-middle">Notifications</h4>-->
					<!--	<button class="btn btn-light text-primary m-1" title="marquer tout comme vu">-->
					<!--		<i class="fa fa-check-square"></i>-->
					<!--	</button>-->
					<!--</div>-->

					<div class="header-notifications-content">
						<ul class="list-group" id="notif">
							<!-- Notification -->
							@forelse(Auth::user()->notifications()->whereNull('read_at')->get() as $notification)
							<li class="list-group-item">
									<!--<span><i class="fa fa-group fa-2x text-dark mr-2"></i></span>-->
									<span id="">
										{!! $notification->data !!}
									</span>
							</li>
							@empty
							    <li class="list-group-item">
        							<span class="boder-top text-center nav-link px-0 py-2 text-muted" style="font-size:1.2em">il n'y a pas de notification récent non vu</span>
        						</li>
							@endforelse
							<!--<li class="list-group-item">-->
							<!--	<a href="#" class="boder-top text-center nav-link p-0">-->
							<!--		voir tous les <i class="fa fa-eye text-dark m-2"></i>-->
							<!--	</a>-->
							<!--</li>-->
						</ul>
					</div>
				</div>
		
				<div class="header-notifications-dropdown d-none" id=messages>
		
					<!--<div class="d-inline-flex border-bottom">-->
					<!--	<h4 class="p-2">Messages</h4>-->
					<!--	<button class="btn btn-light text-primary p-1" title="Mark all as read">-->
					<!--		<i class="fa fa-check-square"></i>-->
					<!--	</button>-->
					<!--</div>-->
		
					<div class="header-notifications-content">
						<ul class="list-group">
						    @if(App\conversation::all()->every(function($value,$key){return $value->nonlu()->count()==0;}))
						        	<li class="list-group-item">
        								<span class="boder-top text-center nav-link px-0 py-2 text-muted" style="font-size:1.2em">il n'y a pas de message récent non lu</span>
        							</li>
						    @else
						        @foreach(App\conversation::all() as $conversation)
    						    @if($conversation->nonlu()->count() != 0)
    							<li class="list-group-item">
    								<a href="{{route('conversation.show',$conversation->id)}}" class="nav-link d-flex">
    								    @php $convUserId=$conversation->freelancer_id!=Auth::User()->id?$conversation->freelancer_id:$conversation->client_id @endphp
    									<div class="user-avatar">
    										<img class="rounded-circle mr-2" height="42" width=42 src="{{ asset('/images').'/'.App\User::find($convUserId)->image }}" alt="">
    									</div>
    									<div class="">
    										<span class="text-muted float-right">{{$conversation->messages->last()->created_at->diffForHumans()}}</span>
    										<strong>{{App\User::find($convUserId)->username}}</strong>
    										<p class="mb-0">{{$conversation->messages->last()->contenu}}</p>
    									</div>
    								</a>
    							</li>
    							@endif
    							@endforeach
						    @endif
						    
						    <li class="list-group-item">
    							<a href="{{Auth::User()->role->intitule!="admin"?route('conversation.index'):route('dashboard','support')}}" class="boder-top text-center nav-link p-0">
    									voir tous les messages{{Auth::User()->role->intitule=="admin"?' de support technique':''}}<i class="fa fa-eye text-dark m-2"></i>
    							</a>
    						</li>
						</ul>
					</div>
				</div>
		
				<!-- Dropdown -->
				<div class="header-notifications-dropdown d-none" id=user>

					<ul class="list-group">
						<li class="list-group-item">
							<!-- User Status -->
							<div class="d-inline-flex">
								<!-- User Name / Avatar -->
								<div class="d-flex">
									<div class="mr-2 user-avatar">
										<img class="rounded-circle" width=42 height=42 src="{{asset('images')}}/{{Auth::user()->image}}" alt="image de utilisateur" style="right: 0px">
										<div class="online_icon rounded-circle" style="bottom:.1em;right:0"></div>
									</div>
									<div class="ml-2">
										<b>{{ Auth::user()->username }}</b>
										<span class="text-muted">{{ Auth::user()->fullname }}</span>
									</div>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a href="{{ route('dashboard','index') }}" class="nav-link">Dashboard</a>
								</li>
								<li class="nav-item border-top">
									<a href="{{ route('dashboard',['settings']) }}" class="nav-link">Réglages</a>
								</li>
								<li class="nav-item border-top">
									<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										Se déconnecter
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</li>
							</ul>
						</li>
					</ul>
		
				</div>
		    
		@endguest
	</div>
</nav>
<div class="overlay d-lg-none"></div>
</header>
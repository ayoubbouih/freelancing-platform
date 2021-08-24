@extends('layouts.app')
@section("includes")
    <link href="{{asset('css/users/left-dashboard.css')}}" rel=stylesheet>
@endsection
@section("content")
<div class="row mw-100 mx-0">
	<div class="dashboard-sidebar d-inline-block col-md-3 pr-0 pl-1">
		<div class="dashboard-sidebar-inner" data-simplebar="init">

			<div class="dashboard-nav-container w-100 pb-0">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger" style="overflow:hidden">
					<span class="hamburger hamburger--collapse">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Navigation de dashboard</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav pr-0">
					<div class="dashboard-nav-inner">
						<ul>
							<li class="@yield('dashboard')"><a href="{{Route('dashboard','index')}}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
							<li class="@yield('support')"><a href="{{route('dashboard','support')}}"><i class="fa fa-envelope"></i> Support technique</a></li>
							<li class="@yield('projets')"><a href="{{route('dashboard','projets')}}"><i class="fa fa-briefcase"></i> Projets</a></li>
							<li class="@yield('utilisateurs')"><a href="{{route('dashboard',['users'])}}"><i class="fa fa-users"></i> Utilisateurs</a></li>
							<li class="@yield('categories')"><a href="{{route('dashboard','categories')}}"><i class="fa fa-cogs"></i> Catégories</a></li>
							<li class="@yield('paiements')"><a href="{{route('dashboard','paiements')}}"><i class="fa fa-credit-card"></i> Paiements</a></li>
							<li class="@yield('documentation')"><a href="{{route('dashboard','documentation')}}"><i class="fa fa-book"></i> Documentation</a></li>
						</ul>

						<ul data-submenu-title="Compte">
						    <li class="@yield('parametres')"><a href="{{route('dashboard','parametres')}}"><i class="fa fa-cog"></i> Paramétres</a></li>
							<li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Se déconnecter</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<div class="col-md-8 px-0 px-sm-1">
	    <div class="container">
	        @yield("right")
	    </div>
	</div>
</div>
@endsection
@section('script')
    <script>
        $('.dashboard-responsive-nav-trigger').on('click', function(e){
        	e.preventDefault();
    		$(this).toggleClass('active');
    		var dashboardNavContainer = $('body').find(".dashboard-nav");
    		if( $(this).hasClass('active') ){
    			$(dashboardNavContainer).addClass('active');
    		} else {
    			$(dashboardNavContainer).removeClass('active');
    		}
    		//$('.dashboard-responsive-nav-trigger .hamburger').toggleClass('is-active');
	    });
    </script>
@endsection

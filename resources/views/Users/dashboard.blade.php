@extends('layouts.app')
@section("includes")
    <link href="{{asset('css/users/left-dashboard.css')}}" rel=stylesheet>
@endsection
@section("content")
<div class="row mw-100 mx-0">
	<div class="dashboard-sidebar d-inline-block col-md-3 pr-0 pl-1">
		<div class="dashboard-sidebar-inner" data-simplebar="init">
			
			<div class="dashboard-nav-container w-100">

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
					<div class="dashboard-nav-inner py-1">

						<ul>
							<li class="@yield('dashboard')"><a href="{{Route('dashboard','index')}}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
							<li class="@yield('messages')"><a href="{{route('conversation.index')}}"><i class="fa fa-envelope"></i> Messages</a></li>
							<li class="@yield('avis')"><a href="{{route('dashboard','avis')}}"><i class="fa fa-star"></i> Avis</a></li>
						</ul>
						
						<ul data-submenu-title="Organiser et gérer">
							<!--<li><a href="{{route('categorie.index')}}"><i class="fa fa-briefcase"></i> Projets</a></li>-->
							<!--<li><a href="#"><i class="fa fa-tasks"></i> Demandes</a></li>-->
							<li class="@yield('paiements')"><a href="{{route('dashboard','paiements')}}"><i class="fa fa-credit-card"></i> Paiements</a></li>
							<li class="@yield('experiences')"><a href="{{route('dashboard','experiences')}}"><i class="fa fa-history"></i> Expériences</a></li>
						</ul>

						<ul data-submenu-title="Compte">
							<li class="@yield('settings')"><a href="{{route('dashboard','settings')}}"><i class="fa fa-cogs"></i> Mes informations</a></li>
							<li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Se déconnecter</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<div class="col-md-8 px-0 mx-auto dashboard-sidebar">
	    @yield("right")
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
	    
	    /*just for setting page in user dashboard*/
        $(document).ready(function(){
            $(".password").keyup(function(){
                if($('#pass').val()!= $('#conf').val() || ($('#pass').val().length<8 && $('#pass').val().length>0)){
                    $("#save").css('background-color','#666');
                    $("#save").attr('disabled','true');
                    $("#erreur_pass").css('display','inline');
                }
                else{
                    $("#save").css('background','#2a41e8');
                    $("#save").removeAttr('disabled','true');
                    $("#erreur_pass").css('display','none');
                   
                }
                
            });
            $("#username").keyup(function(){
                if($('#username').val().length <8){
                    $("#save").css('background-color','#666');
                    $("#save").attr('disabled','true');
                    $("#erreur_user").css('display','inline');
                }
                else{
                    $("#save").css('background','#2a41e8');
                    $("#save").removeAttr('disabled','true');
                    $("#erreur_user").css('display','none');
                }
            });
            $('.avatarUpload').on('click',function(){
                $('#fileUpload').trigger('click');
            });
        });
        //for messages index
        $('input[type=radio]').change(()=>{
                $('.msgForm').submit();
            });
        	// Add the following code if you want the name of the file appear on select
    	$(".custom-file-input").on("change", function() {
      		var fileName = $(this).val().split("\\").pop();
      		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    	});
    </script>
    
    @yield('script_ajax')
@endsection

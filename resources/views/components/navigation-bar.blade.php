	<header id=header class="mb-5 pb-4">
		<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark justify-content-sm-start fixed-top">
		  <div class="container">
	
			<button class="navbar-toggler ml-2" type="button">
			  <span class="navbar-toggler-icon"></span>
			</button>		
			<a class="navbar-brand ml-lg-0 ml-2 mr-auto" href="{{ route('index') }}">
				<img id=logo src="{{ asset('images/logo.png') }}" height=45 class="d-inline-block" alt="">
			</a>
	
			<div class="collapse navbar-collapse bg-dark p-3 p-lg-0 mt-5 mt-lg-0 d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end mobileMenu">
			  <ul class="navbar-nav align-self-stretch mr-0 mr-lg-2">
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fa fa-plus fa-xs"></i> Nouveau projet</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fa fa-object-group"></i> Type de Projet</a>
				</li>
			  </ul>
			</div>
	
	
			@if(Auth::check())
			<ul class="navbar-nav d-flex flex-row">
				<li class="nav-item">
					<a href="{{ route('auth.login') }}" class="nav-link"><i class="fa fa-user-plus"></i> S'enregister</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('auth.register') }}" class="nav-link"><i class="fa fa-sign-in"></i> S'indentifier</a>
				</li>
			</ul>
			@else
	
			<!--  User Notifications -->
				<ul class="navbar-nav notification">
					<li class="nav-item">
						<a href="#" class="nav-link notifications mt-2" title="Notifications">
							<i class="fa fa-bell">
								<span class="badge badge-danger rounded-circle">4</span>
							</i>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link messages mt-2" title="Messages">
							<i class="fa fa-envelope">
								<span class="badge badge-danger rounded-circle">15</span>
							</i>
						</a>	
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link user">
							<div class="user-avatar">
								<img class="rounded-circle" width=42 src="{{ asset('images/male-avatar.png') }}" alt="">
								<div class="online_icon rounded-circle"></div>
							</div>
						</a>
					</li>
				</ul>
				<!-- User Menu / End -->
		
				<!-- Dropdown -->
				<div class="header-notifications-dropdown d-none" id=notifications>
					
					<div class="d-inline-flex border-bottom">
						<h4 class="p-2">Notifications</h4>
						<button class="btn btn-light text-primary m-1" title="Mark all as read">
							<i class="fa fa-check-square"></i>
						</button>
					</div>

					<div class="header-notifications-content">
						<ul class="list-group">
							<!-- Notification -->
							<li class="list-group-item">
								<a href="#" class="d-flex nav-link">
									<span><i class="fa fa-group fa-2x text-dark mr-2"></i></span>
									<span>
										<strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
									</span>
								</a>
							</li>
							<li class="list-group-item">
								<a href="#" class="boder-top text-center nav-link p-0">
									View All Notifications<i class="fa fa-eye text-dark m-2"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
		
				<!-- Dropdown -->
				<div class="header-notifications-dropdown d-none" id=messages>
		
					<div class="d-inline-flex border-bottom">
						<h4 class="p-2">Messages</h4>
						<button class="btn btn-light text-primary p-1" title="Mark all as read">
							<i class="fa fa-check-square"></i>
						</button>
					</div>
		
					<div class="header-notifications-content">
						<ul class="list-group">
							<!-- Notification -->
							<li class="list-group-item">
								<a href class="nav-link d-flex">
									<div class="user-avatar">
										<img class="rounded-circle mr-2" width=42 src="{{ asset('images/male-avatar.png') }}" alt="">
									</div>
									<div class="">
										<span class="text-muted float-right">4 hours ago</span>
										<strong>David Peterson</strong>
										<p class="mb-0">Thanks for reaching out. I'm quite busy right now on many...</p>
									</div>
								</a>
							</li>
							<li class="list-group-item">
								<a href="#" class="boder-top text-center nav-link p-0">
									View All Messages<i class="fa fa-eye text-dark m-2"></i>
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
										<img class="rounded-circle" width=42 src="{{ asset('images/female-avatar.png') }}" alt="">
										<div class="online_icon rounded-circle" style="bottom:5px"></div>
									</div>
									<div class="ml-2">
										<b>Tom Smith</b>
										<span class="text-muted">Level 1</span>
									</div>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<ul class="nav flex-column">
								<li class="nav-item">
									<a href="#" class="nav-link">Dashboard</a>
								</li>
								<li class="nav-item border-top">
									<a href="#" class="nav-link">Settings</a>
								</li>
								<li class="nav-item border-top">
									<a href="#" class="nav-link">Logout</a>
								</li>
							</ul>
						</li>
					</ul>
		
				</div>
		
		@endif
	</div>
</nav>
<div class="overlay"></div>
</header>
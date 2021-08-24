@extends('Users.admin.left-dashboard')
@section('meta-generator')
<meta name="title" content="gestion des utilisateur | BeEmployer">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="noindex , nofollow">
<meta name="description" content="gérer les utilisateurs, par l'admin">
<title>gestion des utilisateur | BeEmployer</title>
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
@section('utilisateurs','active')
@section("right")
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">gestion du membre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">notifier</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#menu1" role="tab" aria-controls="profile" aria-selected="false">changer son role</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in show">
                <form>
                    <textarea style="width:100%"></textarea>
                </form>
                <div class="modal-footer">
                    <a href="{{route('notification.index')}}"><button type="button" class="btn btn-primary">envoyer la notification</button></a>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade container pt-2">
                <form action="{{route('user.edit',1)}}">
                    <h3></h3>
                    <select name="role">
                        @foreach(App\role::all() as $role)
                        <option value="{{$role->intitule}}">{{$role->intitule}}</option>
                        @endforeach
                    </select>
                    <div class="modal-footer">
                   <button type="submit" class="btn btn-primary">modifier</button>
                </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

	<div class="simplebar-track horizontal" style="visibility: visible;">
	    <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
	</div><div class="simplebar-scroll-content" style="overflow:hidden"><div class="simplebar-content" style="overflow-x:hidden;">
		<div class="dashboard-content-inner">
		    @if(Session::has('success'))
		        <div class="alert alert-success">{{Session::get('success')}}</div>
		    @endif
			<div class="row">
				<div class="col-12 p-0 mb-2 mt-0">
					<div class="dashboard-box">
						<div class="headline">
							<h3 class="d-inline"><i class="fa fa-users"></i> Les utilisateurs</h3>
							<button class="mark-as-read" title="minimiser">
									<i class="fa fa-arrow-down"></i>
							</button>
						</div>
						<div class="content">
                            <form action="{{route('dashboard','users')}}" method=get>
                                <div class="input-group my-1">
                                    <input type="text" class="form-control" placeholder="Nom ou username de utilisateur" name='str' value="{{$str}}">
                                    <div class="input-group-append">
                                    <button type="submit" class="input-group-text btn btn-outline-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
						    </form>
                            <table class="table table-responsive table-striped">
                                <thead>
                                <tr class="py-1 bg-secondary font-weight-bold"  style="color:#FFF">
									<td class="col-4">
										id - username
									</td>
									<td class="col-2">
										role
									</td>
									<!-- Buttons -->
									<td class="col-6">
									    Action
									</td>
								</tr>
								</thead>
								<tbody>
							    @foreach($users as $user)
							    
								<tr class="pt-1">
									<td class="col-4">
										{{$user->id}}- {{$user->username}}
									</td>
									<td class="col-2">
										{{$user->role->intitule}}
									</td>
									<!-- Buttons -->
									<td class="col-6 d-flex" style="opacity:1 !important;box-shadow:none !important;">
									    <a href="" class="btn btn-success mx-0 py-0 mr-1" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-bell"></i></a>
										<a href="{{route('user.show',$user->id)}}" class="btn btn-primary mx-0 py-0 mr-1"><i class="fa fa-eye"></i></a>
										<a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger mx-0 py-0"><i class="fa fa-trash"></i></a>
									</td>
								
								</tr>
								@endforeach
								</tbody>
							</table>
							<div class="d-flex justify-content-center mt-1">
							    {{$users->links()}}
							</div>
						</div>
					</div>
				</div>
				<!-- Dashboard Box -->
				<!--<div class="col-xl-6 pl-0">-->
				<!--	<div class="dashboard-box">-->
				<!--		<div class="headline">-->
				<!--			<h3><i class="fa fa-reply"></i> mes demandes</h3>-->
				<!--			<button class="mark-as-read" title="minimiser">-->
				<!--					<i class="fa fa-arrow-down"></i>-->
				<!--			</button>-->
				<!--		</div>-->
				<!--		<div class="content">-->
				<!--			<ul class="dashboard-box-list">-->
				<!--			    @foreach($dmnds=App\demande::where('user_id',auth::user()->id)->paginate(6) as $demande)-->
				<!--				<li>-->
				<!--					<div class="invoice-list-item">-->
										
				<!--					</div>-->
									<!-- Buttons -->
				<!--					<div class="buttons-to-right">-->
				<!--						<a href="{{route('projets.show',$demande->poste->projet->id)}}" class="button">voir le projet</a>-->
				<!--					</div>-->
				<!--				</li>-->
				<!--				@endforeach-->
				<!--			</ul>-->
				<!--			<div class="d-flex justify-content-center mt-1">-->
				<!--			    {{$dmnds->links()}}-->
				<!--			</div>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->

			</div>
			<!-- Row / End -->


		</div>
	</div>
	</div>
	</div>
	<!-- Dashboard Content / End -->
@endsection
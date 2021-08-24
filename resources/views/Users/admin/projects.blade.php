@extends('Users.admin.left-dashboard')
@section('meta-generator')
<meta name="title" content="Projets | admin">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="noindex , nofollow">
<meta name="description" content="{{$user->description}}">
<title>Projets | Beemployer</title>
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
@section('projets','active')
@section("right")
	<!--</div>-->
	<div class="simplebar-track horizontal" style="visibility: visible;">
	    <div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="overflow:hidden"><div class="simplebar-content" style="overflow-x:hidden;margin-right: -17px;">
		<div class="dashboard-content-inner pl-0 pt-0">

			<!-- Row -->
			<div class="row mx-0">
				<!-- Dashboard Box -->
				<div class="col-xl-10 offset-xl-1 my-1 px-0">
				    @if(Session::has('success'))
                        <div class="alert alert-success mb-0 mt-lg-2">{{Session::get('success')}}</div>
                    @endif
					<div class="dashboard-box">
						<div class="headline">
							<h3><i class="fa fa-briefcase"></i> Les derniers projets publier</h3>
							<button class="mark-as-read" title="minimiser">
									<i class="fa fa-arrow-down"></i>
							</button>
						</div>
						<div class="content">
						    <form action="{{route('dashboard','projets')}}" method=get>
                                <div class="input-group my-1">
                                    <input type="text" class="form-control" placeholder="Nom ou Description de projet" name='str' value="{{$str}}">
                                    <div class="input-group-append">
                                    <button type="submit" class="input-group-text btn btn-outline-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
						    </form>
                            <table class="table table-responsive table-striped">
                                <thead>
                                <tr class="py-1 bg-secondary font-weight-bold" style="color:#FFF">
									<td class="col" style="width:50%">
										Nom de projet
									</td>
									<td class="col"  style="width:20%">
										Publiant
									</td>
									<td class="col">
									    publier dès
									</td>
									<!-- Buttons -->
									<td class="col">
									    Action
									</td>
								</tr>
								</thead>
								<tbody>
							    @foreach($projets as $projet)
    								<tr class="pt-1">
    									<td class="col" style="width:50%">
    									    <a href="{{route('projets.show',$projet->id)}}">
    										    <span class="notification-icon"><img style="width:40px;height:37px" src="{{asset('images')}}/{{$projet->categorie->logo}}"></span>
								                <strong class="pl-1">{{$projet->intitule}}</strong>
								            </a>
    									</td>
    									<td class="col" style="width:20%">
    										{{$projet->user->username}}
    									</td>
    									<td class="col">
    									    {{$projet->created_at->diffForHumans()}}
    									</td>
    									<!-- Buttons -->
    									<td class="col d-flex" style="opacity:1 !important;box-shadow:none !important;">
    									    <!--<a href="" class="btn btn-success mx-0 py-0 mr-1"><i class="fa fa-bell"></i></a>-->
    										<a href="{{route('projets.show',$projet->id)}}" class="btn btn-primary mx-0 py-0 mr-1"><i class="fa fa-eye"></i></a>
    										<form action="{{route('projets.destroy',$projet->id)}}" method=post onSubmit="return confirm('êtes-vous sûr?');">
    										    @csrf
    										    @method('delete')
    										    <button type="submit" class="btn btn-danger mx-0 py-0"><i class="fa fa-trash"></i></button>
    										</form>
    									</td>
    								</tr>
								@endforeach
								</tbody>
							</table>
							<div class="d-flex justify-content-center mt-1">
							    {{$projets->links()}}
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
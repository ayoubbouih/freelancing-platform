@extends('Users.admin.left-dashboard')
@section('meta-generator')
<meta name="title" content="Projets | admin">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="noindex , nofollow">
<meta name="description" content="Categories | admin">
<title>Catégories | Beemployer</title>
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
@section('categories','active')
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
							<h3><i class="fa fa-briefcase"></i> Les catégories</h3>
							<button class="mark-as-read" title="ajouter">
									<i class="fa fa-plus"></i>
							</button>
						</div>
						<div class="pull-right">
						    <a href="{{route('dashboard','categorieCreate')}}">
						        <button class="btn btn-primary py-1">Ajouter une categorie</button>
						    </a>
						</div>
						<div class="clearfix"></div>
						<div class="content">
                            <table class="table table-responsive table-striped" style="min-width:100%">
                                <thead>
                                <tr class="py-1 bg-secondary font-weight-bold" style="color:#FFF">
									<th style="width: 35%">
										Nom de catégorie
									</th>
									<th>
										Logo
									</th>
									<th style="width: 35%">
									    Description
									</th>
									<!-- Buttons -->
									<th>
									    Action
									</th>
								</tr>
								</thead>
								<tbody>
							    @foreach($categories as $categorie)
    								<tr class="pt-1">
    									<td class="pl-1" style="width: 35%">
								            {{$categorie->intitule}}
    									</td>
    									<td>
    										<span class="notification-icon"><img style="width:40px;height:37px" src="{{asset('/images/'.$categorie->logo)}}"></span>
    									</td>
    									<td style="width: 35%">
    									    {{$categorie->description}}
    									</td>
    									<!-- Buttons -->
    									<td class="d-flex" style="opacity:1 !important;box-shadow:none !important;">
    										<a href="{{route('categorie.edit',$categorie->id)}}" class="btn btn-primary mx-0 py-0 mr-1"><i class="fa fa-pencil"></i></a>
    										<form action="{{route('categorie.destroy',1)}}" method=post onSubmit="return confirm('êtes-vous sûr?');">
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
							    {{$categories->links()}}
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
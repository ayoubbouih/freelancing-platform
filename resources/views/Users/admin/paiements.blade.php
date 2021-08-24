@extends('Users.admin.left-dashboard')
@section('meta-generator')
<meta name="title" content="paiements | admin">

<meta name="revisit-after" content="1 day">
<meta name="robots" content="noindex , nofollow">
<meta name="description" content="paiements | Beemployer">
<title>paiements | Beemployer</title>
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
@section('paiements','active')
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
							<h3><i class="fa fa-usd"></i> Les paiements des utilisateurs</h3>
							<button class="mark-as-read" title="minimiser">
									<i class="fa fa-arrow-down"></i>
							</button>
						</div>
						<div class="content">
                            <table class="table table-responsive table-striped">
                                <thead>
                                <tr class="py-1 bg-secondary font-weight-bold" style="color:#FFF;width:100%">
									<td class="col" style="width:20%">
										Utilisateur
									</td>
									<td class="col" style="width:25%">
										mode de paiement
									</td>
									<td class="col" style="width:10%">
									    amount
									</td>
                                    <td style="width:25%">
                                        date d'opération
                                    </td>
									<td class="col">
									    Action
									</td>
								</tr>
								</thead>
								<tbody>
							    @foreach($paiements->sortByDesc('updated_at') as $paiement)
    								<tr class="pt-1">
    									<td class="col" style="width:20%">
    									    <a href="{{route('user.show',$paiement->user->id)}}">
								                <strong class="pl-1">{{$paiement->user->username}}</strong>
								            </a>
    									</td>
    									<td class="col" style="width:25%">
    										{{$paiement->mode_paiement}}
    									</td>
    									<td class="col" style="width:10%">
    									    {{$paiement->amount}}
    									</td>
                                        <td>
                                            {{$paiement->updated_at->diffForHumans()}}
                                        </td>
    									<td class="col" style="opacity:1 !important;box-shadow:none !important;">
    									    @if($paiement->mode_paiement=="en attente")
        										
        										<a href="{{route('paiement.paypalRetrait',$paiement->id)}}"><button class="btn btn-success"><i class="fa fa-check"></i></button></a>
        									    <a href="{{route('paiement.paypalRetraitRefus',$paiement->id)}}"><button class="btn btn-danger"><i class="fa fa-close"></i></button></a>

        									@endif
    									</td>
    								</tr>
								@endforeach
								</tbody>
							</table>
							<div class="d-flex justify-content-center mt-1">
							    {{$paiements->links()}}
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
@extends('Users.dashboard')
@section('meta-generator')
<meta name="title" content="Paiements | BeEmployer">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="noindex , nofollow">
<title>Paiements | BeEmployer</title>
@endsection
@section('includes')
<link rel="stylesheet" href="https://beemployer.com/css/users/settings.css">
<link rel="stylesheet" href="https://beemployer.com/css/users/left-dashboard.css">
<script src="https://beemployer.com/js/app.js"></script>
@endsection
@section('paiements','active')
@section('right')

<div class="container content">
	<div class="row">
    		<div class="col-lg-12 order-2 order-lg-1 mb-3">
    			<h2 class="mt-4 mb-1 border-bottom border-primary text-center">Paiements</h2>
    			@if(Session::has('success'))
    			<div class="alert alert-success">{{Session::get('success')}}</div>
    			@elseif(Session::has('retraitRequest'))
    			<div class="alert alert-success">{{Session::get('retraitRequest')}}</div>
    			@elseif(Session::has('refundFailed'))
    			<div class="alert alert-danger">{{Session::get('refundFailed')}}</div>
    			@elseif(Session::has('refundSuccessed'))
    			<div class="alert alert-success">{{Session::get('refundSuccessed')}}</div>
    			@elseif(Session::has('refundDenied'))
    			<div class="alert alert-danger">{{Session::get('refundDenied')}}</div>
    			@elseif(Session::has('soldeInssifusant'))
    			<div class="alert alert-danger">{{Session::get('soldeInssifusant')}}</div>
    			@endif
    		    <div class="bg-white shadow mb-5">
        			<ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item col-6 text-center">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">retrait d'argent</a>
                      </li>
                      <li class="nav-item col-6 text-center">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#menu1" role="tab" aria-controls="profile" aria-selected="false">depot d'argent</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active show p-4 container">
                            <form method="POST" action="{{route('paiement.paypalRetraitRequest')}}" class="row">
                                @csrf
                                <h4 class="form-group submit-field col-sm-6">votre solde:</h4>
                                <h4 class="form-group submit-field col-sm-6">{{auth::user()->solde}}$</h4>
                                <div class="form-group submit-field col-sm-6">
                                    <label for="email"><h4>adresse Paypal</h4></label>
                                    <input type="email" name="paypal_email" id="email" class="with-border" value="{{auth::user()->paypal}}">
                                </div>
                                <div class="form-group sybmit-field col-sm-6">
                                    <label for="amount"><h4>le montant</h4></label>
                                    <input type="number" name="paypal_amount" id="amount" class="with-border" max="{{auth::user()->solde}}" step="0.01">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Procéder le paiement</button>
                            </form>
                        </div>
                        <div id="menu1" class="tab-pane fade p-4 container">
                            <form method="POST" action="{{route('paiement.store')}}" class="row">
                                @csrf
                                <div class="form-group submit-field col-sm-6">
                                    <label for="email"><h4>le montant de recharge</h4></label>
                                    <input type="number" name="price" id="price" class="with-border" step="0.01">
                                </div>
                                <div class="form-group sybmit-field col-sm-6">
                                    <label for="amount"><h4>le montant que vous allez payer</h4></label>
                                    <input disabled readonly type="text" name="finalPrice" id="finalPrice" class="with-border disabled" step="0.01">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Procéder le paiement</button>
                            </form>
                        </div>
                    </div>
                    
                    
    			</div>
    			<div class="bg-white shadow mb-3">
    			    <h2 class="text-center m-3">Historique des paiements </h2>
    			    <table class="table table-striped text-center">
    			        <tr>
    			           <th>Le montant</th>
        			        <th>Le mode d'opération</th>
        			        <th>La date d'opération</th>
        			        <th>action</th>
    			        </tr>
    			        @foreach(auth::user()->paiements->sortByDesc('updated_at') as $paiement)
    			        <tr>
    			            @if($paiement->mode_paiement =="paypal" || $paiement->mode_paiement=="profit")
    			                <td class="text-success">
        			                + {{$paiement->amount}}$
        			            </td>
    			            @elseif($paiement->mode_paiement=="retrait vers paypal" || $paiement->mode_paiement=="demande")
    			                <td class="text-danger">
        			               - {{$paiement->amount}}$
        			            </td>
        			        @elseif($paiement->mode_paiement=="rembourssé" || $paiement->mode_paiement=="refusé")
        			            <td class="text-muted">
        			                <strike>{{$paiement->amount}}</strike>
        			            </td>
        			        @elseif($paiement->mode_paiement=="en attente")
        			            <td class="text-primary">
        			                {{$paiement->amount}}
        			            </td>
    			            @endif
    			            <td>{{$paiement->mode_paiement}}</td>
    			            <td>{{$paiement->updated_at->diffForHumans()}}</td>
    			            <td>
    			                @if($paiement->amount < auth::user()->solde && $paiement->mode_paiement == "paypal")
    			                    <a href="{{route('paiement.paypalRefund',$paiement->id)}}"><button class="btn btn-primary btn-block">Remboursser</button></a>
    			                @elseif($paiement->mode_paiement == "en attente")
    			                    <a href="{{route('paiement.delete',$paiement->id)}}">
    			                        <button class="sumit btn btn-danger btn-block">Annuler</button>
    			                    </a>
    			                @endif
    			            </td>
    			        </tr>
    			        @endforeach
    			    </table>
    			</div>
    		</div>
	</div>
</div>

@endsection
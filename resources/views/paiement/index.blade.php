@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg-8 order-2 order-lg-1">
			
			<!-- Hedline -->
			<h2 class="mt-4 mb-1">Méthode de paiment</h2>

			<!-- Payment Methods Accordion -->
			<div class="payment">

				<div class="payment-tab payment-tab-active">
					<div class="payment-tab-trigger">
						<input checked id="paypal" name="cardType" type="radio" value="paypal">
						<label for="paypal">PayPal</label>
						<img class="payment-logo paypal" src="https://i.imgur.com/ApBxkXU.png" alt="">
					</div>

					<div class="payment-tab-content p-2">
						<p class="lead text-center">Vous serez redirigé vers PayPal pour effectuer le paiement.</p>
					</div>
				</div>


				<div class="payment-tab">
					<div class="payment-tab-trigger">
						<input type="radio" name="cardType" id="creditCart" value="creditCard">
						<label for="creditCart">Carte de crédit / débit</label>
						<img class="payment-logo" src="https://i.imgur.com/IHEKLgm.png" alt="">
					</div>

					<div class="payment-tab-content p-2">
						<div class="row">

							<div class="col-md-6">
								<div class="card-label">
									<input id="nameOnCard" name="nameOnCard" required placeholder="Nom du titulaire">
								</div>
							</div>

							<div class="col-md-6">
								<div class="card-label">
									<input id="cardNumber" name="cardNumber" placeholder="Numéro de Carte de Crédit" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-label">
									<input id="expiryDate" placeholder="Mois d'expiration" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-label">
									<label for="expiryDate">Année d'expiration</label>
									<input id="expirynDate" placeholder="Année d'expiration" required>
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-label">
									<input id="cvv" required placeholder="CVV">
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
			<!-- Payment Methods Accordion / End -->
		
        <a href="#" class="my-3 btn btn-primary btn-block">Procéder le paiement</a>
		</div>

		<div class="col-lg-4 mt-3 mb-2 pt-1 order-1 order-lg-2 rounded" style="background-color:#dadada">
			<div class="boxed-widget summary">
				<div class="boxed-widget-headline">
					<h3 class="p-1 text-light bg-secondary rounded">la récapitulation</h3>
				</div>
				<div class="boxed-widget-inner">
					<ul class="list-group" style="list-style:none">
						<li>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">$</span>
								</div>
								<input type=number class="form-control" placeholder="Prix"  min="0" id="price" value="">
							</div>
						</li>
						<li class="pt-2 pb-1">T.V.A. (10%) <span class="font-weight-bold float-right" id=TVA>$0</span></li>
						<li class="pb-2">Prix ​​final <span class="font-weight-bold float-right" id=finalPrice>$0</span></li>
					</ul>
				</div>
			</div>

			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id=CheckBox>
				<label class="custom-control-label" for="CheckBox">
                    je suis d'accord avec les <a href="#" class="nav-link d-inline">Termes et conditions</a> et les <a href="#" class="nav-link d-inline">Conditions de renouvellement automatique</a>
				</label>
			</div>
		</div>

	</div>
</div>

@endsection
@extends('layouts.app')
@section('includes')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">


@endsection
@section('content')
@if (Route::has('login'))
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

					<div class="payment-tab-content">
						<p>Vous serez redirigé vers PayPal pour effectuer le paiement.</p>
					</div>
				</div>


				<div class="payment-tab">
					<div class="payment-tab-trigger">
						<input type="radio" name="cardType" id="creditCart" value="creditCard">
						<label for="creditCart">Carte de crédit / débit</label>
						<img class="payment-logo" src="https://i.imgur.com/IHEKLgm.png" alt="">
					</div>

					<div class="payment-tab-content">
						<div class="row payment-form-row">

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
		
			<a href="pages-order-confirmation.html" class="my-3 btn btn-primary btn-block">Procéder le paiement</a>
		</div>

		<div class="col-lg-4 border border-primary mt-3 pt-1 order-1 order-lg-2">
			<div class="boxed-widget summary">
				<div class="boxed-widget-headline">
					<h3>la récapitulation</h3>
				</div>
				<div class="boxed-widget-inner">
					<ul>
						<li>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">$</span>
								</div>
								<input type=number class="form-control" placeholder="Prix"  min="0">
							</div>
						</li>
						<li>T.V.A. (20%) <span>$9.80</span></li>
						<li class="total-costs">Prix ​​final <span>$58.80</span></li>
					</ul>
				</div>
			</div>

			<div class="checkbox mt-2">
				<input type="checkbox" id="two-step">
				<label for="two-step">
					<span class="checkbox-icon"></span>  je suis d'accord avec les <a href="#">Termes et conditions</a> et les <a href="#">Conditions de renouvellement automatique</a>
				</label>
			</div>
		</div>

	</div>
</div>
<!-- Container / End -->

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	}); 
}); 
</script>
@else
redirect('home');
@endif
@endsection
@extends('Users.admin.left-dashboard')
@section('meta-generator')
<meta name="title" content="paramétres de l'admin">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="noindex , nofollow">
<meta name="description" content="{{$user->description}}">
<title>paramestres de l'admin | Beemployer</title>
@endsection
@section('includes')
<link rel="stylesheet" href="{{asset('css/users/settings.css')}}">
<link rel="stylesheet" href="{{asset('css/users/left-dashboard.css')}}">
<style>
    @media(max-width:576px){
        .avatarUpload .profile-pic{
            max-width:200px;
            max-height:200px;
        }
    }
</style>
@endsection
@section('parametres','active')
@section("right")

	<div class="dashboard-content-container" data-simplebar="init"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 25px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
		<div class="dashboard-content-inner">
	        @if(Session::has('success'))
	            <div class="alert alert-success">{{Session::get('success')}}</div>
	        @elseif(Session::has('failure'))
	            <div class="alert alert-danger">{{Session::get('failure')}}</div>
	        @endif
	        @if(Session::has('image_updated'))
	            <div class="alert alert-success">{{session()->get('image_updated')}}</div>
	        @endif
	        @error('avatar')
	            <div class="alert alert-danger">{{$message}}</div>
	        @enderror
			<!-- Row -->
			<div class="row">
			<span class="d-none" style="width:0;height:0;overflow: hidden;">
			    <form method=post class='formImage' enctype="multipart/form-data" action="{{route('uploadImage')}}" onSubmit="return false;">
			        @csrf
			        <input class="file-upload" name="avatar" type="file" accept="image/*" id="fileUpload" onchange="form.submit()">
			    </form>
			</span>
            <form method="post" action="{{route('user.update',$user)}}">
                @csrf
                @method('PUT')
				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box mt-0 p-2">

						<!-- Headline -->
						<div class="headline text-center border-bottom border-primary">
							<h3><i class="fa fa-user-circle-o"></i> Mon compte (Compte de l'administrateur)</h3>
						</div>

						<div class="content with-padding pb-0">

							<div class="row">

								<div class="col-sm-4 py-2 text-center pr-0 pr-sm-1">
									<span class="avatar-wrapper position-relative avatarUpload" title="Change Avatar">
										<img class="profile-pic d-inline border border-primary" src="{{asset('/images/').'/'.$user->image}}" alt="image de profile" for="fileUpload" style="border-radius:40%">
										<i class="text-primary position-absolute fa fa-camera fa-2x" style="top:45px;left:25px"></i>
									</span>
								</div>

								<div class="col-sm-8">
									<div class="row mt-2">

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Votre nom complet</h5>
												<input type="text" class="with-border" name="fullname" value="{{$user->fullname}}" required>
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Username</h5>
												<input type="text" class="with-border" id="username" name="username" value="{{$user->username}}" required>
											</div>
											<h6 class="text-danger" id="erreur_user" style="display:none">username doit etre <8</h6>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Email</h5>
												<input type="email" class="with-border mb-0" name="email" value="{{$user->email}}" required>
												<small class="form-text text-muted">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</small>
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box pt-2">

						<!-- Headline -->
						<div class="headline text-center border-bottom border-primary">
							<h3><i class="fa fa-user-circle"></i> Mon profile</h3>
						</div>

						<div class="content">
							<ul class="fields-ul">
							<li>
								<div class="row mt-2 p-2">
									<div class="col-xl-6">
										<div class="submit-field">
											<h5>Telephone</h5>
											<input type="text" class="with-border" name="telephone" value="{{$user->tel}}" autocomplete="false">
										</div>
									</div>

									<div class="col-xl-6">
										<div class="submit-field">
											<h5>Nationalité</h5>
											<select name="pays" value="{{$user->pays}}" class="custom-select">
                                                <?php $arr=["Afghanistan","Îles Åland","Albanie","Algérie","Samoa américaines","Andorre","Angola","Anguilla","Antarctique","Antigua et Barbuda","Argentine","Arménie","Aruba","Australie","Autriche","Azerbaïdjan","Bahamas","Bahreïn","Bangladesh","Barbade","Biélorussie","Belgique","Belize","Bénin","Bermudes","Bhoutan","Bolivie","Bosnie Herzégovine","Botswana","Île Bouvet","Brésil","British Virgin Islands","Territoire britannique de l’Océan Indien","Brunei Darussalam","Bulgarie","Burkina Faso","Burundi","Cambodge","Cameroun","Canada","Cap Vert","Iles Cayman","République centrafricaine","Tchad","Chili","Chine","Hong Kong","Macao","Île Christmas","Îles Cocos","Colombie","Comores","République du Congo","République démocratique du Congo","Îles Cook","Costa Rica","Côte d’Ivoire","Croatie","Cuba","Chypre","République tchèque","Danemark","Djibouti","Dominique","République dominicaine","Équateur","Égypte","Salvador","Guinée équatoriale","Érythrée","Estonie","Éthiopie","Îles Falkland","Îles Féroé","Fidji","Finlande","France","Guyane française","Polynésie française","Terres australes et antarctiques françaises","Gabon","Gambie","Géorgie","Allemagne","Ghana","Gibraltar","Grèce","Groenland","Grenade","Guadeloupe","Guam","Guatemala","Guernesey","Guinée","Guinée Bissau","Guyane","Haïti","Îles Heard et MacDonald","Saint Siège (Vatican)","Honduras","Hongrie","Islande","Inde","Indonésie","Iran","Irak","Irlande","Ile de Man","Italie","Jamaïque","Japon","Jersey","Jordanie","Kazakhstan","Kenya","Kiribati","Corée du Nord","Corée du Sud","Koweït","Kirghizistan","Laos","Lettonie","Liban","Lesotho","Libéria","Libye","Liechtenstein","Lituanie","Luxembourg","Macédoine","Madagascar","Malawi","Malaisie","Maldives","Mali","Malte","Îles Marshall","Martinique","Mauritanie","Maurice","Mayotte","Mexique","Micronésie","Moldavie","Monaco","Mongolie","Monténégro","Montserrat","Maroc","Mozambique","Myanmar","Namibie","Nauru","Népal","Pays Bas","Nouvelle Calédonie","Nouvelle Zélande","Nicaragua","Niger","Nigeria","Niue","Île Norfolk","Îles Mariannes du Nord","Norvège","Oman","Pakistan","Palau","Palestine","Panama","Papouasie Nouvelle Guinée","Paraguay","Pérou","Philippines","Pitcairn","Pologne","Portugal","Puerto Rico","Qatar","Réunion","Roumanie","Russie","Rwanda","Saint Barthélemy","Sainte Hélène","Saint Kitts et Nevis","Sainte Lucie","Saint Martin (partie française)","Saint Martin (partie néerlandaise)","Saint Pierre et Miquelon","Saint Vincent et les Grenadines","Samoa","Saint Marin","Sao Tomé et Principe","Arabie Saoudite","Sénégal","Serbie","Seychelles","Sierra Leone","Singapour","Slovaquie","Slovénie","Îles Salomon","Somalie","Afrique du Sud","Géorgie du Sud et les îles Sandwich du Sud","Sud Soudan","Espagne","Sri Lanka","Soudan","Suriname","Svalbard et Jan Mayen","Eswatini","Suède","Suisse","Syrie","Taiwan","Tadjikistan","Tanzanie","Thaïlande","Timor Leste","Togo","Tokelau","Tonga","Trinité et Tobago","Tunisie","Turquie","Turkménistan","Îles Turques et Caïques","Tuvalu","Ouganda","Ukraine","Émirats Arabes Unis","Royaume Uni","États Unis","Îles mineures éloignées des États Unis","Uruguay","Ouzbékistan","Vanuatu","Venezuela","Viêt Nam","Îles Vierges américaines","Wallis et Futuna","Sahara occidental","Yémen","Zambie","Zimbabwe"];
 ?>                                             
                                                <option value="{{$user->pays}}">{{$user->pays}}</option>
                                                @foreach($arr as $c)
                                                    @if($c != $user->pays)
                                                        <option value="{{$c}}">{{$c}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
										</div>
									</div>

									<div class="col-xl-12">
										<div class="submit-field mt-3">
											<h5>Description</h5>
											<textarea cols="30" rows="5" class="with-border" name="description">{{$user->description}}</textarea>
										</div>
									</div>

								</div>
							</li>
						</ul>
						</div>
					</div>
				</div>

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div id="test1" class="dashboard-box pt-2">

						<!-- Headline -->
                        <div class="headline text-center border-bottom border-primary">
							<h3><i class="fa fa-lock"></i> Sécurité</h3>
						</div>

						<div class="content with-padding">
							<div class="row mt-2 p-2">

								<div class="col-xl-6">
									<div class="submit-field">
										<h5>Mot de passe</h5>
										<input type="password" name="password" id="pass" class="with-border password" autocomplete="new-password">
									</div>
								</div>

								<div class="col-xl-6">
									<div class="submit-field">
										<h5>Validation de mot de passe</h5>
										<input type="password" id="conf" name="password_confirmation" class="with-border password mb-1" autocomplete="new-password">
									</div>
                                    <h6 class="text-danger" id="erreur_pass" style="display:none">le mot de pass et la confirmation doivent etre identiques et plus long que 8 caracteres</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Button -->
				<div class="col-xl-12 my-2">
					<input type="submit" id="save" class="btn btn-primary btn-block button ripple-effect big" value="enregistrer">
				</div>
            </form>
			</div>
			<!-- Row / End -->

		</div>
	</div></div></div>
@endsection
@section("script")
<script>
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
</script>
@endsection
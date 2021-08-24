@extends('layouts.app')
@section('includes')
<link rel="stylesheet" href="{{ asset('css/users/show.css') }}">
<style>
    #home, #menu1, #menu2{
        height:500px;
        overflow-y:auto;
    }
    #footer h3{color:#fff;}
</style>
@endsection
@section('meta-generator')
<meta name="revisit-after" content="1 day">
<meta name="robots" content="index , follow">
<meta name="title" content="{{$user->username}}">
<meta name="description" content="{{$user->description}}">
<title>{{$user->username}} | Beemployer</title>
@endsection
@section('content')

<div class="single-page-header freelancer-header container pt-0 pt-md-2 pt-lg-0 pt-xl-5">
	<div class="container shadow bg-white mb-5">
		<div class="row p-xl-2 pt-xl-4">
		    @auth
			<div class="col-lg-8">
			@else
			<div class="col-lg-12">
            @endauth
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image freelancer-avatar"><img src="{{asset('/images').'/'.$user->image}}" alt=""></div>
						<div class="header-details">
							<h3>{{$user->username}}<span>{{$user->fullname}}</span></h3>
							<ul>
								<li><div class="star-rating" data-rating="{{$user->rating()}}"></div></li>
								<?php $arr=[["Afghanistan","AF"] ,["Îles Åland","AX"] ,["Albanie","AL"] ,["Algérie","DZ"] ,["Samoa américaines","AS"] ,["Andorre","AD"] ,["Angola","AO"] ,["Anguilla","AI"] ,["Antarctique","AQ"] ,["Antigua et Barbuda","AG"] ,["Argentine","AR"] ,["Arménie","AM"] ,["Aruba","AW"] ,["Australie","AU"] ,["Autriche","AT"] ,["Azerbaïdjan","AZ"] ,["Bahamas","BS"] ,["Bahreïn","BH"] ,["Bangladesh","BD"] ,["Barbade","BB"] ,["Biélorussie","BY"] ,["Belgique","BE"] ,["Belize","BZ"] ,["Bénin","BJ"] ,["Bermudes","BM"] ,["Bhoutan","BT"] ,["Bolivie","BO"] ,["Bosnie Herzégovine","BA"] ,["Botswana","BW"] ,["Île Bouvet","BV"] ,["Brésil","BR"] ,["British Virgin Islands","VG"] ,["Territoire britannique de l’Océan Indien","IO"] ,["Brunei Darussalam","BN"] ,["Bulgarie","BG"] ,["Burkina Faso","BF"] ,["Burundi","BI"] ,["Cambodge","KH"] ,["Cameroun","CM"] ,["Canada","CA"] ,["Cap Vert","CV"] ,["Iles Cayman","KY"] ,["République centrafricaine","CF"] ,["Tchad","TD"] ,["Chili","CL"] ,["Chine","CN"] ,["Hong Kong","HK"] ,["Macao","MO"] ,["Île Christmas","CX"] ,["Îles Cocos","CC"] ,["Colombie","CO"] ,["Comores","KM"] ,["République du Congo","CG"] ,["République démocratique du Congo","CD"] ,["Îles Cook","CK"] ,["Costa Rica","CR"] ,["Côte d’Ivoire","CI"] ,["Croatie","HR"] ,["Cuba","CU"] ,["Chypre","CY"] ,["République tchèque","CZ"] ,["Danemark","DK"] ,["Djibouti","DJ"] ,["Dominique","DM"] ,["République dominicaine","DO"] ,["Équateur","EC"] ,["Égypte","EG"] ,["Salvador","SV"] ,["Guinée équatoriale","GQ"] ,["Érythrée","ER"] ,["Estonie","EE"] ,["Éthiopie","ET"] ,["Îles Falkland","FK"] ,["Îles Féroé","FO"] ,["Fidji","FJ"] ,["Finlande","FI"] ,["France","FR"] ,["Guyane française","GF"] ,["Polynésie française","PF"] ,["Terres australes et antarctiques françaises","TF"] ,["Gabon","GA"] ,["Gambie","GM"] ,["Géorgie","GE"] ,["Allemagne","DE"] ,["Ghana","GH"] ,["Gibraltar","GI"] ,["Grèce","GR"] ,["Groenland","GL"] ,["Grenade","GD"] ,["Guadeloupe","GP"] ,["Guam","GU"] ,["Guatemala","GT"] ,["Guernesey","GG"] ,["Guinée","GN"] ,["Guinée Bissau","GW"] ,["Guyane","GY"] ,["Haïti","HT"] ,["Îles Heard et MacDonald","HM"] ,["Saint Siège (Vatican)","VA"] ,["Honduras","HN"] ,["Hongrie","HU"] ,["Islande","IS"] ,["Inde","IN"] ,["Indonésie","ID"] ,["Iran","IR"] ,["Irak","IQ"] ,["Irlande","IE"] ,["Ile de Man","IM"] ,["Italie","IT"] ,["Jamaïque","JM"] ,["Japon","JP"] ,["Jersey","JE"] ,["Jordanie","JO"] ,["Kazakhstan","KZ"] ,["Kenya","KE"] ,["Kiribati","KI"] ,["Corée du Nord","KP"] ,["Corée du Sud","KR"] ,["Koweït","KW"] ,["Kirghizistan","KG"] ,["Laos","LA"] ,["Lettonie","LV"] ,["Liban","LB"] ,["Lesotho","LS"] ,["Libéria","LR"] ,["Libye","LY"] ,["Liechtenstein","LI"] ,["Lituanie","LT"] ,["Luxembourg","LU"] ,["Macédoine","MK"] ,["Madagascar","MG"] ,["Malawi","MW"] ,["Malaisie","MY"] ,["Maldives","MV"] ,["Mali","ML"] ,["Malte","MT"] ,["Îles Marshall","MH"] ,["Martinique","MQ"] ,["Mauritanie","MR"] ,["Maurice","MU"] ,["Mayotte","YT"] ,["Mexique","MX"] ,["Micronésie","FM"] ,["Moldavie","MD"] ,["Monaco","MC"] ,["Mongolie","MN"] ,["Monténégro","ME"] ,["Montserrat","MS"] ,["Maroc","MA"] ,["Mozambique","MZ"] ,["Myanmar","MM"] ,["Namibie","NA"] ,["Nauru","NR"] ,["Népal","NP"] ,["Pays Bas","NL"] ,["Nouvelle Calédonie","NC"] ,["Nouvelle Zélande","NZ"] ,["Nicaragua","NI"] ,["Niger","NE"] ,["Nigeria","NG"] ,["Niue","NU"] ,["Île Norfolk","NF"] ,["Îles Mariannes du Nord","MP"] ,["Norvège","NO"] ,["Oman","OM"] ,["Pakistan","PK"] ,["Palau","PW"] ,["Palestine","PS"] ,["Panama","PA"] ,["Papouasie Nouvelle Guinée","PG"] ,["Paraguay","PY"] ,["Pérou","PE"] ,["Philippines","PH"] ,["Pitcairn","PN"] ,["Pologne","PL"] ,["Portugal","PT"] ,["Puerto Rico","PR"] ,["Qatar","QA"] ,["Réunion","RE"] ,["Roumanie","RO"] ,["Russie","RU"] ,["Rwanda","RW"] ,["Saint Barthélemy","BL"] ,["Sainte Hélène","SH"] ,["Saint Kitts et Nevis","KN"] ,["Sainte Lucie","LC"] ,["Saint Martin (partie française)","MF"] ,["Saint Martin (partie néerlandaise)","SX"] ,["Saint Pierre et Miquelon","PM"] ,["Saint Vincent et les Grenadines","VC"] ,["Samoa","WS"] ,["Saint Marin","SM"] ,["Sao Tomé et Principe","ST"] ,["Arabie Saoudite","SA"] ,["Sénégal","SN"] ,["Serbie","RS"] ,["Seychelles","SC"] ,["Sierra Leone","SL"] ,["Singapour","SG"] ,["Slovaquie","SK"] ,["Slovénie","SI"] ,["Îles Salomon","SB"] ,["Somalie","SO"] ,["Afrique du Sud","ZA"] ,["Géorgie du Sud et les îles Sandwich du Sud","GS"] ,["Sud Soudan","SS"] ,["Espagne","ES"] ,["Sri Lanka","LK"] ,["Soudan","SD"] ,["Suriname","SR"] ,["Svalbard et Jan Mayen","SJ"] ,["Eswatini","SZ"] ,["Suède","SE"] ,["Suisse","CH"] ,["Syrie","SY"] ,["Taiwan","TW"] ,["Tadjikistan","TJ"] ,["Tanzanie","TZ"] ,["Thaïlande","TH"] ,["Timor Leste","TL"] ,["Togo","TG"] ,["Tokelau","TK"] ,["Tonga","TO"] ,["Trinité et Tobago","TT"] ,["Tunisie","TN"] ,["Turquie","TR"] ,["Turkménistan","TM"] ,["Îles Turques et Caïques","TC"] ,["Tuvalu","TV"] ,["Ouganda","UG"] ,["Ukraine","UA"] ,["Émirats Arabes Unis","AE"] ,["Royaume Uni","GB"] ,["États Unis","US"] ,["Îles mineures éloignées des États Unis","UM"] ,["Uruguay","UY"] ,["Ouzbékistan","UZ"] ,["Vanuatu","VU"] ,["Venezuela","VE"] ,["Viêt Nam","VN"] ,["Îles Vierges américaines","VI"] ,["Wallis et Futuna","WF"] ,["Sahara occidental","EH"] ,["Yémen","YE"] ,["Zambie","ZM"] ,["Zimbabwe","ZW"]];;
                                        $pays="ma";
                                        foreach($arr as $a){
                                            if($user->pays == $a[0]){
                                                $pays=$a[1];break;
                                            }
                                        }
                                    ?>
								<li><img class="flag" src="{{asset('images/flags')}}/{{strToLower($pays)}}.svg" alt="{{$user->pays}}"> {{$user->pays}}</li>
							</ul>
						</div>
					</div>

				</div>
				<div class="single-page-section">
                	<p>{{$user->description}}</p>
                </div>
			</div>
			@auth
			<div class="col-lg-4">
            			<div class="sidebar-container container">
            				<div class="profile-overview row ">
            					<div class="overview-item col-4"><strong>{{$user->demandes->count()}}</strong><span>mes demandes</span></div>
            					<div class="overview-item col-4"><strong>{{$user->projets->count()}}</strong><span>projets postés</span></div>
            					<div class="overview-item col-4"><strong>{{$user->recrutements()->count()}}</strong><span>projets réalisés</span></div>
            				</div>
            				<a href="#small-dialog" class="btn btn-primary apply-now-button mb-5" id="recruter">recruter moi !</a>
            			</div>
            		</div>
			@endauth
		</div>
	</div>
    <div class="container shadow bg-white">
    	<div class="row">	
    		<div class="col-xl-12 col-lg-12 content-right-offset px-0">
    			<ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mes projets</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#menu1" role="tab" aria-controls="profile" aria-selected="false">Mes expériences</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#menu2" role="tab" aria-controls="contact" aria-selected="false">Les avis des clients</a>
                  </li>
                </ul>
                <div class="tab-content">
        			<div id="home" class="tab-pane fade in active show">
        			    <div class="boxed-list">
            				<ul class="boxed-list-ul">
            				    @forelse($user->recrutements() as $demande)
            					        <li class="p-1 p-md-2 border-bottom">
                    						<div class="boxed-list-item">
                    							<div class="item-content w-100">
                    								<a href="{{route('projets.show',$demande->poste->projet->id)}}">
                    								    <h4 class="d-inline-block">{{$demande->poste->projet->intitule}}<span> occupé le poste "{{$demande->poste->intitule}}"</span></h4>
                    								</a>
                    								<div class="pull-right">
                    									<i class="fa fa-calendar-o"></i>{{$demande->recrutement->created_at->diffForHumans()}}
                    								</div>
                    								<div class="clearfix"></div>
                    								<div class="item-description">
                    									<p>{{substr($demande->poste->projet->description,0,100)."..."}}</p>
                    								</div>
                    							</div>
                    						</div>
                    					</li>
            					@empty
            					<li>
            					    <div class="boxed-list-item pb-2">
            					        <div class='item-content text-center'>
            					            <h3>Cet utilisateur n'a pas encore réalisé aucun projet </h3>
            					        </div>
            					    </div>
            					</li>
            					@endforelse
            				</ul>
            			</div>
        			</div>
        			<div id="menu1" class="tab-pane fade container pt-2">
			            @forelse($user->experiences as $experience)
			                 <div class="row pb-1 border-bottom" style="background: #fafafa;">
    			                 <div class="col-md-{{$experience->image?9:12}}">
    			                    <h4 class="pl-sm-2 pt-2">{{$experience->intitule}}</h4>
    			                    <p class="pl-sm-2">{{$experience->description}}</p>
    			                    <a href="{{$experience->link}}"><button class="btn btn-primary"> visiter le projet </button></a>
    			                 </div>
    			                 @if($experience->image)
        			                 <div class="col-md-3">
        			                     <img src="{{asset('/images/experiences').'/'.$experience->image}}" alt="" >
        			                 </div>
    			                 @endif
			                 </div>
    					@empty
    					<div class="boxed-list">
        					<ul class="boxed-list-ul">
            					<li>
            					    <div class="boxed-list-item">
            					        <div class='item-content text-center'>
            					            <h3>Cet utilisateur n'a pas encore ajouté ses expériences</h3>
            					        </div>
            					    </div>
            					</li>
        					</ul>
    					</div>
    					@endforelse
			    </div>
        			    
        			<div id="menu2" class="tab-pane fade">
        			    <div class="boxed-list">
            				<ul class="boxed-list-ul mt-2">
                			    @forelse($user->avis()??[] as $avis)
        		                    <li class="mt-0 p-3">
                						<div class="boxed-list-item d-flex">
                							<div class="item-image p-1">
                								<img src="{{asset('/images').'/'.$avis->recrutement->poste->projet->user->image}}" alt="">
                							</div>
                							<div class="item-content">
                							    @for($i=$avis->note;$i>0;$i--)
                							        <i class="fa fa-star d-inline" style="color:#ffd600;font-size:.9em"></i>
                							    @endfor
                								<div class="item-details mt-1">
                									<div class="detail-item"><i class="icon-material-outline-date-range"></i>{{$avis->created_at->diffForHumans()}}</div>
                								</div>
                								<div class="item-description">
                									<p>{{$avis->description}}</p>
                								</div>
                							</div>
                						</div>
                					</li>
                			    @empty
                			        <li>
                					    <div class="boxed-list-item">
                					        <div class='item-content text-center'>
                					            <h3>Cet utilisateur n'est pas encore évalué par ses clients</h3>
                					        </div>
                					    </div>
                        			</li>
                			    @endforelse
        			        </ul>
        			   </div>
        			</div>
        		</div>
    	    </div>
    	</div>
    </div>
</div>

<!--<div id="small-dialog" class="zoom-anim-dialog dialog-with-tabs mfp-hide">-->

	<!--Tabs -->
<!--	<div class="sign-in-form">-->

<!--		<ul class="popup-tabs-nav" style="pointer-events: none;">-->
<!--			<li class="active"><a href="#tab">Make an Offer</a></li>-->
<!--		</ul>-->

<!--		<div class="popup-tabs-container">-->

			<!-- Tab -->
<!--			<div class="popup-tab-content" id="tab" style="">-->
				
				<!-- Welcome Text -->
<!--				<div class="welcome-text">-->
<!--					<h3>Discuss your project with David</h3>-->
<!--				</div>-->
					
				<!-- Form -->
<!--				<form method="post">-->

<!--					<div class="input-with-icon-left">-->
<!--						<i class="icon-material-outline-account-circle"></i>-->
<!--						<input type="text" class="input-text with-border" name="name" id="name" placeholder="First and Last Name">-->
<!--					</div>-->

<!--					<div class="input-with-icon-left">-->
<!--						<i class="icon-material-baseline-mail-outline"></i>-->
<!--						<input type="text" class="input-text with-border" name="emailaddress" id="emailaddress" placeholder="Email Address">-->
<!--					</div>-->

<!--					<textarea name="textarea" cols="10" placeholder="Message" class="with-border"></textarea>-->

<!--					<div class="uploadButton margin-top-25">-->
<!--						<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple="">-->
<!--						<label class="uploadButton-button ripple-effect" for="upload">Add Attachments</label>-->
<!--						<span class="uploadButton-file-name">Allowed file types: zip, pdf, png, jpg <br> Max. files size: 50 MB.</span>-->
<!--					</div>-->

<!--				</form>-->
				
				<!-- Button -->
<!--				<button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">Make an Offer <i class="icon-material-outline-arrow-right-alt"></i></button>-->

<!--			</div>-->
			<!-- Login -->
<!--			<div class="popup-tab-content" id="loginn" style="display: none;">-->
				
				<!-- Welcome Text -->
<!--				<div class="welcome-text">-->
<!--					<h3>Discuss Your Project With Tom</h3>-->
<!--				</div>-->
					
				<!-- Form -->
<!--				<form method="post" id="make-an-offer-form">-->

<!--					<div class="input-with-icon-left">-->
<!--						<i class="icon-material-outline-account-circle"></i>-->
<!--						<input type="text" class="input-text with-border" name="name2" id="name2" placeholder="First and Last Name" required="">-->
<!--					</div>-->

<!--					<div class="input-with-icon-left">-->
<!--						<i class="icon-material-baseline-mail-outline"></i>-->
<!--						<input type="text" class="input-text with-border" name="emailaddress2" id="emailaddress2" placeholder="Email Address" required="">-->
<!--					</div>-->

<!--					<textarea name="textarea" cols="10" placeholder="Message" class="with-border"></textarea>-->

<!--					<div class="uploadButton margin-top-25">-->
<!--						<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload-cv" multiple="">-->
<!--						<label class="uploadButton-button" for="upload-cv">Add Attachments</label>-->
<!--						<span class="uploadButton-file-name">Allowed file types: zip, pdf, png, jpg <br> Max. files size: 50 MB.</span>-->
<!--					</div>-->

<!--				</form>-->
				
				<!-- Button -->
<!--				<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="make-an-offer-form">Make an Offer <i class="icon-material-outline-arrow-right-alt"></i></button>-->

<!--			</div>-->

<!--		</div>-->
<!--	</div>-->
<!--</div>-->

@endsection
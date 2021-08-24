<?php
use App\demande;
?>
@extends('layouts.app')
@section('includes')
<title>{{$projet->intitule}}</title>
<link rel="stylesheet" href="{{ asset('css/projets.css') }}">
<style>
    #footer h3{color:#fff;}
</style>
@endsection
@section('content')
<div class="container">
    @if(session()->has('projAdded'))
        <div class="alert alert-success">{{session()->get('projAdded')}}</div>
    @endif
	@if($projet)
    	<div class="single-page-header py-0 mb-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="single-page-header-inner">
						<div class="left-side">
							<div class="">
							    <a href="{{Route('user.show',$projet->user->id)}}" class="mh-100">
							        <img class="img-thumbnail header-image p-1" src="{{asset('/images').'/'.$projet->user->image}}" alt="{{$projet->user->fullname}}">
							    </a>
							</div>
							<div class="header-details">
								<h3>{{$projet->intitule}}</h3>
								<a href="{{Route('user.show',$projet->user->id)}}"><h5>{{$projet->user->username}}</h5></a>
								<ul>
									<li><a href="{{Route('categorie.show',$projet->categorie->id)}}"><i class="fa fa-briefcase"></i> {{$projet->categorie->intitule}}</a></li>
									<?php $arr=[["Afghanistan","AF"] ,["Îles Åland","AX"] ,["Albanie","AL"] ,["Algérie","DZ"] ,["Samoa américaines","AS"] ,["Andorre","AD"] ,["Angola","AO"] ,["Anguilla","AI"] ,["Antarctique","AQ"] ,["Antigua et Barbuda","AG"] ,["Argentine","AR"] ,["Arménie","AM"] ,["Aruba","AW"] ,["Australie","AU"] ,["Autriche","AT"] ,["Azerbaïdjan","AZ"] ,["Bahamas","BS"] ,["Bahreïn","BH"] ,["Bangladesh","BD"] ,["Barbade","BB"] ,["Biélorussie","BY"] ,["Belgique","BE"] ,["Belize","BZ"] ,["Bénin","BJ"] ,["Bermudes","BM"] ,["Bhoutan","BT"] ,["Bolivie","BO"] ,["Bosnie Herzégovine","BA"] ,["Botswana","BW"] ,["Île Bouvet","BV"] ,["Brésil","BR"] ,["British Virgin Islands","VG"] ,["Territoire britannique de l’Océan Indien","IO"] ,["Brunei Darussalam","BN"] ,["Bulgarie","BG"] ,["Burkina Faso","BF"] ,["Burundi","BI"] ,["Cambodge","KH"] ,["Cameroun","CM"] ,["Canada","CA"] ,["Cap Vert","CV"] ,["Iles Cayman","KY"] ,["République centrafricaine","CF"] ,["Tchad","TD"] ,["Chili","CL"] ,["Chine","CN"] ,["Hong Kong","HK"] ,["Macao","MO"] ,["Île Christmas","CX"] ,["Îles Cocos","CC"] ,["Colombie","CO"] ,["Comores","KM"] ,["République du Congo","CG"] ,["République démocratique du Congo","CD"] ,["Îles Cook","CK"] ,["Costa Rica","CR"] ,["Côte d’Ivoire","CI"] ,["Croatie","HR"] ,["Cuba","CU"] ,["Chypre","CY"] ,["République tchèque","CZ"] ,["Danemark","DK"] ,["Djibouti","DJ"] ,["Dominique","DM"] ,["République dominicaine","DO"] ,["Équateur","EC"] ,["Égypte","EG"] ,["Salvador","SV"] ,["Guinée équatoriale","GQ"] ,["Érythrée","ER"] ,["Estonie","EE"] ,["Éthiopie","ET"] ,["Îles Falkland","FK"] ,["Îles Féroé","FO"] ,["Fidji","FJ"] ,["Finlande","FI"] ,["France","FR"] ,["Guyane française","GF"] ,["Polynésie française","PF"] ,["Terres australes et antarctiques françaises","TF"] ,["Gabon","GA"] ,["Gambie","GM"] ,["Géorgie","GE"] ,["Allemagne","DE"] ,["Ghana","GH"] ,["Gibraltar","GI"] ,["Grèce","GR"] ,["Groenland","GL"] ,["Grenade","GD"] ,["Guadeloupe","GP"] ,["Guam","GU"] ,["Guatemala","GT"] ,["Guernesey","GG"] ,["Guinée","GN"] ,["Guinée Bissau","GW"] ,["Guyane","GY"] ,["Haïti","HT"] ,["Îles Heard et MacDonald","HM"] ,["Saint Siège (Vatican)","VA"] ,["Honduras","HN"] ,["Hongrie","HU"] ,["Islande","IS"] ,["Inde","IN"] ,["Indonésie","ID"] ,["Iran","IR"] ,["Irak","IQ"] ,["Irlande","IE"] ,["Ile de Man","IM"] ,["Italie","IT"] ,["Jamaïque","JM"] ,["Japon","JP"] ,["Jersey","JE"] ,["Jordanie","JO"] ,["Kazakhstan","KZ"] ,["Kenya","KE"] ,["Kiribati","KI"] ,["Corée du Nord","KP"] ,["Corée du Sud","KR"] ,["Koweït","KW"] ,["Kirghizistan","KG"] ,["Laos","LA"] ,["Lettonie","LV"] ,["Liban","LB"] ,["Lesotho","LS"] ,["Libéria","LR"] ,["Libye","LY"] ,["Liechtenstein","LI"] ,["Lituanie","LT"] ,["Luxembourg","LU"] ,["Macédoine","MK"] ,["Madagascar","MG"] ,["Malawi","MW"] ,["Malaisie","MY"] ,["Maldives","MV"] ,["Mali","ML"] ,["Malte","MT"] ,["Îles Marshall","MH"] ,["Martinique","MQ"] ,["Mauritanie","MR"] ,["Maurice","MU"] ,["Mayotte","YT"] ,["Mexique","MX"] ,["Micronésie","FM"] ,["Moldavie","MD"] ,["Monaco","MC"] ,["Mongolie","MN"] ,["Monténégro","ME"] ,["Montserrat","MS"] ,["Maroc","MA"] ,["Mozambique","MZ"] ,["Myanmar","MM"] ,["Namibie","NA"] ,["Nauru","NR"] ,["Népal","NP"] ,["Pays Bas","NL"] ,["Nouvelle Calédonie","NC"] ,["Nouvelle Zélande","NZ"] ,["Nicaragua","NI"] ,["Niger","NE"] ,["Nigeria","NG"] ,["Niue","NU"] ,["Île Norfolk","NF"] ,["Îles Mariannes du Nord","MP"] ,["Norvège","NO"] ,["Oman","OM"] ,["Pakistan","PK"] ,["Palau","PW"] ,["Palestine","PS"] ,["Panama","PA"] ,["Papouasie Nouvelle Guinée","PG"] ,["Paraguay","PY"] ,["Pérou","PE"] ,["Philippines","PH"] ,["Pitcairn","PN"] ,["Pologne","PL"] ,["Portugal","PT"] ,["Puerto Rico","PR"] ,["Qatar","QA"] ,["Réunion","RE"] ,["Roumanie","RO"] ,["Russie","RU"] ,["Rwanda","RW"] ,["Saint Barthélemy","BL"] ,["Sainte Hélène","SH"] ,["Saint Kitts et Nevis","KN"] ,["Sainte Lucie","LC"] ,["Saint Martin (partie française)","MF"] ,["Saint Martin (partie néerlandaise)","SX"] ,["Saint Pierre et Miquelon","PM"] ,["Saint Vincent et les Grenadines","VC"] ,["Samoa","WS"] ,["Saint Marin","SM"] ,["Sao Tomé et Principe","ST"] ,["Arabie Saoudite","SA"] ,["Sénégal","SN"] ,["Serbie","RS"] ,["Seychelles","SC"] ,["Sierra Leone","SL"] ,["Singapour","SG"] ,["Slovaquie","SK"] ,["Slovénie","SI"] ,["Îles Salomon","SB"] ,["Somalie","SO"] ,["Afrique du Sud","ZA"] ,["Géorgie du Sud et les îles Sandwich du Sud","GS"] ,["Sud Soudan","SS"] ,["Espagne","ES"] ,["Sri Lanka","LK"] ,["Soudan","SD"] ,["Suriname","SR"] ,["Svalbard et Jan Mayen","SJ"] ,["Eswatini","SZ"] ,["Suède","SE"] ,["Suisse","CH"] ,["Syrie","SY"] ,["Taiwan","TW"] ,["Tadjikistan","TJ"] ,["Tanzanie","TZ"] ,["Thaïlande","TH"] ,["Timor Leste","TL"] ,["Togo","TG"] ,["Tokelau","TK"] ,["Tonga","TO"] ,["Trinité et Tobago","TT"] ,["Tunisie","TN"] ,["Turquie","TR"] ,["Turkménistan","TM"] ,["Îles Turques et Caïques","TC"] ,["Tuvalu","TV"] ,["Ouganda","UG"] ,["Ukraine","UA"] ,["Émirats Arabes Unis","AE"] ,["Royaume Uni","GB"] ,["États Unis","US"] ,["Îles mineures éloignées des États Unis","UM"] ,["Uruguay","UY"] ,["Ouzbékistan","UZ"] ,["Vanuatu","VU"] ,["Venezuela","VE"] ,["Viêt Nam","VN"] ,["Îles Vierges américaines","VI"] ,["Wallis et Futuna","WF"] ,["Sahara occidental","EH"] ,["Yémen","YE"] ,["Zambie","ZM"] ,["Zimbabwe","ZW"]];;
                                        $pays="ma";
                                        foreach($arr as $a){
                                            if($projet->user->pays == $a[0]){
                                                $pays=$a[1];break;
                                            }
                                        }
                                    ?>
									<li><img class="flag" src="{{asset('images/flags')}}/{{strToLower($pays)}}.svg" alt="pays">{{$projet->user->pays}}</li>
									<li><div class=" pb-1 badge badge-{{$projet->status?'warning':'success'}}"><big>{{$projet->status?'fermé':'ouvert'}}</big></div></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
            @auth
            @if(auth::user()->id == $projet->user_id)
                @if(Session::has('updated'))
                <div class="alert alert-success col-sm-12">{{Session::get('updated')}}</div>
                @endif
                <div class="col-xl-12 col-lg-12 content-right-offset">
                    <div class="boxed-list">
                        <div class="boxed-list-headline row">
                            <div class="col-sm-11">
                                <h3 class="">Description du projet</h3>
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-primary btn-lg" id="projet_edit"><i class="fa fa-edit"></i></button>
                            </div>
                        </div>
                        <form method="GET" id="editer_projet" action="{{route('projets.edit',$projet->id)}}">
                            @csrf
                            @foreach($projet->postes as $poste)
                            @if($poste->demandes->count())
                                <div class="row postes" style="display:none;">
                                    <div class="col-md-6 form-group">
                                        <h5>intitule de poste</h5>
                                        <input type="text" name="poste{{$poste->id}}_intitule" value="{{$poste->intitule}}" disabled>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <h5>min</h5>
                                        <input type="number" name="poste{{$poste->id}}_min" value="{{$poste->min}}" disabled> 
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <h5>max</h5>
                                        <input type="number" name="poste{{$poste->id}}_max" value="{{$poste->max}}" disabled>
                                    </div>
                                </div>
                            @else
                                <div class="row postes" style="display:none;">
                                    <div class="col-md-6 form-group">
                                        <h5>intitule de poste</h5>
                                        <input type="text" name="poste{{$poste->id}}_intitule" value="{{$poste->intitule}}">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <h5>min</h5>
                                        <input type="number" name="poste{{$poste->id}}_min" value="{{$poste->min}}"> 
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <h5>max</h5>
                                        <input type="number" name="poste{{$poste->id}}_max" value="{{$poste->max}}">
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            <div class="row">
                                <div class="col-12">
                                    <div id="description">
                                        {{$projet->description}}
                                    </div>
                                    <textarea name="projet_description" id="projet_description" style="display:none;">{{$projet->description}}</textarea>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <div class="boxed-list">
                        <div class="boxed-list-headline row">
                            <h3 class="col-md-6"><i class="icon-material-outline-group"></i>les demandes des freelanceurs</h3>
                            <form class="col-md-6" >
                                <select name="poste" id="demandes" class="custom-select">
                                    @foreach($projet->postes as $poste)
                                    <option value="{{$poste->id}}">{{$poste->intitule}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <ul class="boxed-list-ul">
                            @foreach($projet->postes as $poste)
                                @foreach($poste->demandes as $demande)
        					        <li class="demandes demandes{{$demande->poste->id}} py-2">
                							<div class="bid row">
                								<div class="bids-avatar col-md-2 col-2">
                									<div class="freelancer-avatar">
                										<a href="{{Route('user.show',$demande->user->username)}}"><img src="{{asset('images/')."/".$demande->user->image}}" alt=""></a>
                									</div>
                								</div>
                								
                								<div class="bids-content col-md-4 col-6">
                									<!-- Name -->
                									<div class="freelancer-name">
                                    					<?php $arr=[["Afghanistan","AF"] ,["Îles Åland","AX"] ,["Albanie","AL"] ,["Algérie","DZ"] ,["Samoa américaines","AS"] ,["Andorre","AD"] ,["Angola","AO"] ,["Anguilla","AI"] ,["Antarctique","AQ"] ,["Antigua et Barbuda","AG"] ,["Argentine","AR"] ,["Arménie","AM"] ,["Aruba","AW"] ,["Australie","AU"] ,["Autriche","AT"] ,["Azerbaïdjan","AZ"] ,["Bahamas","BS"] ,["Bahreïn","BH"] ,["Bangladesh","BD"] ,["Barbade","BB"] ,["Biélorussie","BY"] ,["Belgique","BE"] ,["Belize","BZ"] ,["Bénin","BJ"] ,["Bermudes","BM"] ,["Bhoutan","BT"] ,["Bolivie","BO"] ,["Bosnie Herzégovine","BA"] ,["Botswana","BW"] ,["Île Bouvet","BV"] ,["Brésil","BR"] ,["British Virgin Islands","VG"] ,["Territoire britannique de l’Océan Indien","IO"] ,["Brunei Darussalam","BN"] ,["Bulgarie","BG"] ,["Burkina Faso","BF"] ,["Burundi","BI"] ,["Cambodge","KH"] ,["Cameroun","CM"] ,["Canada","CA"] ,["Cap Vert","CV"] ,["Iles Cayman","KY"] ,["République centrafricaine","CF"] ,["Tchad","TD"] ,["Chili","CL"] ,["Chine","CN"] ,["Hong Kong","HK"] ,["Macao","MO"] ,["Île Christmas","CX"] ,["Îles Cocos","CC"] ,["Colombie","CO"] ,["Comores","KM"] ,["République du Congo","CG"] ,["République démocratique du Congo","CD"] ,["Îles Cook","CK"] ,["Costa Rica","CR"] ,["Côte d’Ivoire","CI"] ,["Croatie","HR"] ,["Cuba","CU"] ,["Chypre","CY"] ,["République tchèque","CZ"] ,["Danemark","DK"] ,["Djibouti","DJ"] ,["Dominique","DM"] ,["République dominicaine","DO"] ,["Équateur","EC"] ,["Égypte","EG"] ,["Salvador","SV"] ,["Guinée équatoriale","GQ"] ,["Érythrée","ER"] ,["Estonie","EE"] ,["Éthiopie","ET"] ,["Îles Falkland","FK"] ,["Îles Féroé","FO"] ,["Fidji","FJ"] ,["Finlande","FI"] ,["France","FR"] ,["Guyane française","GF"] ,["Polynésie française","PF"] ,["Terres australes et antarctiques françaises","TF"] ,["Gabon","GA"] ,["Gambie","GM"] ,["Géorgie","GE"] ,["Allemagne","DE"] ,["Ghana","GH"] ,["Gibraltar","GI"] ,["Grèce","GR"] ,["Groenland","GL"] ,["Grenade","GD"] ,["Guadeloupe","GP"] ,["Guam","GU"] ,["Guatemala","GT"] ,["Guernesey","GG"] ,["Guinée","GN"] ,["Guinée Bissau","GW"] ,["Guyane","GY"] ,["Haïti","HT"] ,["Îles Heard et MacDonald","HM"] ,["Saint Siège (Vatican)","VA"] ,["Honduras","HN"] ,["Hongrie","HU"] ,["Islande","IS"] ,["Inde","IN"] ,["Indonésie","ID"] ,["Iran","IR"] ,["Irak","IQ"] ,["Irlande","IE"] ,["Ile de Man","IM"] ,["Italie","IT"] ,["Jamaïque","JM"] ,["Japon","JP"] ,["Jersey","JE"] ,["Jordanie","JO"] ,["Kazakhstan","KZ"] ,["Kenya","KE"] ,["Kiribati","KI"] ,["Corée du Nord","KP"] ,["Corée du Sud","KR"] ,["Koweït","KW"] ,["Kirghizistan","KG"] ,["Laos","LA"] ,["Lettonie","LV"] ,["Liban","LB"] ,["Lesotho","LS"] ,["Libéria","LR"] ,["Libye","LY"] ,["Liechtenstein","LI"] ,["Lituanie","LT"] ,["Luxembourg","LU"] ,["Macédoine","MK"] ,["Madagascar","MG"] ,["Malawi","MW"] ,["Malaisie","MY"] ,["Maldives","MV"] ,["Mali","ML"] ,["Malte","MT"] ,["Îles Marshall","MH"] ,["Martinique","MQ"] ,["Mauritanie","MR"] ,["Maurice","MU"] ,["Mayotte","YT"] ,["Mexique","MX"] ,["Micronésie","FM"] ,["Moldavie","MD"] ,["Monaco","MC"] ,["Mongolie","MN"] ,["Monténégro","ME"] ,["Montserrat","MS"] ,["Maroc","MA"] ,["Mozambique","MZ"] ,["Myanmar","MM"] ,["Namibie","NA"] ,["Nauru","NR"] ,["Népal","NP"] ,["Pays Bas","NL"] ,["Nouvelle Calédonie","NC"] ,["Nouvelle Zélande","NZ"] ,["Nicaragua","NI"] ,["Niger","NE"] ,["Nigeria","NG"] ,["Niue","NU"] ,["Île Norfolk","NF"] ,["Îles Mariannes du Nord","MP"] ,["Norvège","NO"] ,["Oman","OM"] ,["Pakistan","PK"] ,["Palau","PW"] ,["Palestine","PS"] ,["Panama","PA"] ,["Papouasie Nouvelle Guinée","PG"] ,["Paraguay","PY"] ,["Pérou","PE"] ,["Philippines","PH"] ,["Pitcairn","PN"] ,["Pologne","PL"] ,["Portugal","PT"] ,["Puerto Rico","PR"] ,["Qatar","QA"] ,["Réunion","RE"] ,["Roumanie","RO"] ,["Russie","RU"] ,["Rwanda","RW"] ,["Saint Barthélemy","BL"] ,["Sainte Hélène","SH"] ,["Saint Kitts et Nevis","KN"] ,["Sainte Lucie","LC"] ,["Saint Martin (partie française)","MF"] ,["Saint Martin (partie néerlandaise)","SX"] ,["Saint Pierre et Miquelon","PM"] ,["Saint Vincent et les Grenadines","VC"] ,["Samoa","WS"] ,["Saint Marin","SM"] ,["Sao Tomé et Principe","ST"] ,["Arabie Saoudite","SA"] ,["Sénégal","SN"] ,["Serbie","RS"] ,["Seychelles","SC"] ,["Sierra Leone","SL"] ,["Singapour","SG"] ,["Slovaquie","SK"] ,["Slovénie","SI"] ,["Îles Salomon","SB"] ,["Somalie","SO"] ,["Afrique du Sud","ZA"] ,["Géorgie du Sud et les îles Sandwich du Sud","GS"] ,["Sud Soudan","SS"] ,["Espagne","ES"] ,["Sri Lanka","LK"] ,["Soudan","SD"] ,["Suriname","SR"] ,["Svalbard et Jan Mayen","SJ"] ,["Eswatini","SZ"] ,["Suède","SE"] ,["Suisse","CH"] ,["Syrie","SY"] ,["Taiwan","TW"] ,["Tadjikistan","TJ"] ,["Tanzanie","TZ"] ,["Thaïlande","TH"] ,["Timor Leste","TL"] ,["Togo","TG"] ,["Tokelau","TK"] ,["Tonga","TO"] ,["Trinité et Tobago","TT"] ,["Tunisie","TN"] ,["Turquie","TR"] ,["Turkménistan","TM"] ,["Îles Turques et Caïques","TC"] ,["Tuvalu","TV"] ,["Ouganda","UG"] ,["Ukraine","UA"] ,["Émirats Arabes Unis","AE"] ,["Royaume Uni","GB"] ,["États Unis","US"] ,["Îles mineures éloignées des États Unis","UM"] ,["Uruguay","UY"] ,["Ouzbékistan","UZ"] ,["Vanuatu","VU"] ,["Venezuela","VE"] ,["Viêt Nam","VN"] ,["Îles Vierges américaines","VI"] ,["Wallis et Futuna","WF"] ,["Sahara occidental","EH"] ,["Yémen","YE"] ,["Zambie","ZM"] ,["Zimbabwe","ZW"]];;
                                                            $pays="ma";
                                                            foreach($arr as $a){
                                                                if($demande->user->pays == $a[0]){
                                                                    $pays=$a[1];break;
                                                                }
                                                            }
                                                        ?>
                										<h4><a href="{{Route('user.show',$demande->user->username)}}">{{$demande->user->username}}
                										<img class="flag" src="{{asset('images/flags')}}/{{strToLower($pays)}}.svg" alt="pays"></a></h4>
                										<div class="star-rating" data-rating="{{$demande->user->rating()}}"></div>
                									</div>
                								</div>
                								
                								<div class="bids-bid col-md-2 col-4">
                									<div class="bid-rate py-0">
                										<div class="rate">{{$demande->prix}} $</div>
                										<span>{{$demande->duree}} Jours</span>
                									</div>
                								</div>
                								@if($demande->poste->recrutement == null)
                								<div class="bids-bid col-md-2 col-6">
                								    <form method="POST" action="{{route('recrutement.store')}}">
                								        @csrf
                								        <input type="number" hidden name="id" value="{{$demande->id}}">
                								        <input class="btn btn-lg btn-primary" type="submit" value="recruter">
                								    </form>
                								</div>
                								<div class="bids-bid col-md-2 col-6">
                								    <form method="POST" action="{{route('conversation.store')}}">
                								        @csrf
                								        <input type="number" hidden name="demande_id" value="{{$demande->id}}">
                								        <input class="btn btn-lg btn-primary" type="submit" value="contacter">
                								    </form>
                								</div>
                								@endif
                							</div>
                							@if(auth::user()->id == $projet->user->id || auth::user()->id == $demande->user->id)
                							    <div class="row">
                							        <div class="col-sm-12">
                							            <p>{{$demande->description}}</p>
                							        </div>
                							    </div>
                							@endif	    
                				    </li>
        					     @endforeach
        					@endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="col-xl-8 col-lg-8 content-right-offset">
                    <div class="boxed-list">
                        <div class="boxed-list-headline row">
                            <div class="col-sm-12">
                                <h3 class="">Description du projet</h3>
                            </div>
                        </div>
                        <p>{{$projet->description}}</p>
                    </div>
                    <div class="boxed-list">
                        <div class="boxed-list-headline row">
                            <h3 class="col-md-6"><i class="icon-material-outline-group"></i>les demandes des freelanceurs</h3>
                            <form class="col-md-6" >
                                <select name="poste" id="demandes" class="custom-select">
                                    @forelse($projet->postes as $poste)
                                    <option value="{{$poste->id}}">{{$poste->intitule}}</option>
                                    @empty
                                        <option class="text-muted" unselected>pas de poste ouvert</option>
                                    @endforelse
                                </select>
                            </form>
                        </div>
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @elseif (Session::has('deleted'))
                            <div class="alert alert-info">{{Session::get('deleted')}}</div>
                            @elseif (Session::has('failed'))
                            <div class="alert alert-danger">{{Session::get('failed')}}</div>
                            @elseif (Session::has('recruited'))
                            <div class="alert alert-success">{{Session::get('recruted')}}</div>
                            @endif
                            <ul class="boxed-list-ul">
                                @foreach($projet->postes as $poste)
                                    @foreach($poste->demandes->where('user_id','=',auth::user()->id) as $demande)
                                    <li class="demandes mes_demandes demandes{{$demande->poste->id}} py-0 rounded-0">
                                        <div class="bid row">
                                            <div class="bids-avatar col-2">
                                                <div class="freelancer-avatar">
                                                    <a href="{{Route('user.show',$demande->user->username)}}">
                                                        <img src="{{asset('images/')."/".$demande->user->image}}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="bids-content col-6">
                                                <div class="freelancer-name">
                                                    <?php $arr=[["Afghanistan","AF"] ,["Îles Åland","AX"] ,["Albanie","AL"] ,["Algérie","DZ"] ,["Samoa américaines","AS"] ,["Andorre","AD"] ,["Angola","AO"] ,["Anguilla","AI"] ,["Antarctique","AQ"] ,["Antigua et Barbuda","AG"] ,["Argentine","AR"] ,["Arménie","AM"] ,["Aruba","AW"] ,["Australie","AU"] ,["Autriche","AT"] ,["Azerbaïdjan","AZ"] ,["Bahamas","BS"] ,["Bahreïn","BH"] ,["Bangladesh","BD"] ,["Barbade","BB"] ,["Biélorussie","BY"] ,["Belgique","BE"] ,["Belize","BZ"] ,["Bénin","BJ"] ,["Bermudes","BM"] ,["Bhoutan","BT"] ,["Bolivie","BO"] ,["Bosnie Herzégovine","BA"] ,["Botswana","BW"] ,["Île Bouvet","BV"] ,["Brésil","BR"] ,["British Virgin Islands","VG"] ,["Territoire britannique de l’Océan Indien","IO"] ,["Brunei Darussalam","BN"] ,["Bulgarie","BG"] ,["Burkina Faso","BF"] ,["Burundi","BI"] ,["Cambodge","KH"] ,["Cameroun","CM"] ,["Canada","CA"] ,["Cap Vert","CV"] ,["Iles Cayman","KY"] ,["République centrafricaine","CF"] ,["Tchad","TD"] ,["Chili","CL"] ,["Chine","CN"] ,["Hong Kong","HK"] ,["Macao","MO"] ,["Île Christmas","CX"] ,["Îles Cocos","CC"] ,["Colombie","CO"] ,["Comores","KM"] ,["République du Congo","CG"] ,["République démocratique du Congo","CD"] ,["Îles Cook","CK"] ,["Costa Rica","CR"] ,["Côte d’Ivoire","CI"] ,["Croatie","HR"] ,["Cuba","CU"] ,["Chypre","CY"] ,["République tchèque","CZ"] ,["Danemark","DK"] ,["Djibouti","DJ"] ,["Dominique","DM"] ,["République dominicaine","DO"] ,["Équateur","EC"] ,["Égypte","EG"] ,["Salvador","SV"] ,["Guinée équatoriale","GQ"] ,["Érythrée","ER"] ,["Estonie","EE"] ,["Éthiopie","ET"] ,["Îles Falkland","FK"] ,["Îles Féroé","FO"] ,["Fidji","FJ"] ,["Finlande","FI"] ,["France","FR"] ,["Guyane française","GF"] ,["Polynésie française","PF"] ,["Terres australes et antarctiques françaises","TF"] ,["Gabon","GA"] ,["Gambie","GM"] ,["Géorgie","GE"] ,["Allemagne","DE"] ,["Ghana","GH"] ,["Gibraltar","GI"] ,["Grèce","GR"] ,["Groenland","GL"] ,["Grenade","GD"] ,["Guadeloupe","GP"] ,["Guam","GU"] ,["Guatemala","GT"] ,["Guernesey","GG"] ,["Guinée","GN"] ,["Guinée Bissau","GW"] ,["Guyane","GY"] ,["Haïti","HT"] ,["Îles Heard et MacDonald","HM"] ,["Saint Siège (Vatican)","VA"] ,["Honduras","HN"] ,["Hongrie","HU"] ,["Islande","IS"] ,["Inde","IN"] ,["Indonésie","ID"] ,["Iran","IR"] ,["Irak","IQ"] ,["Irlande","IE"] ,["Ile de Man","IM"] ,["Italie","IT"] ,["Jamaïque","JM"] ,["Japon","JP"] ,["Jersey","JE"] ,["Jordanie","JO"] ,["Kazakhstan","KZ"] ,["Kenya","KE"] ,["Kiribati","KI"] ,["Corée du Nord","KP"] ,["Corée du Sud","KR"] ,["Koweït","KW"] ,["Kirghizistan","KG"] ,["Laos","LA"] ,["Lettonie","LV"] ,["Liban","LB"] ,["Lesotho","LS"] ,["Libéria","LR"] ,["Libye","LY"] ,["Liechtenstein","LI"] ,["Lituanie","LT"] ,["Luxembourg","LU"] ,["Macédoine","MK"] ,["Madagascar","MG"] ,["Malawi","MW"] ,["Malaisie","MY"] ,["Maldives","MV"] ,["Mali","ML"] ,["Malte","MT"] ,["Îles Marshall","MH"] ,["Martinique","MQ"] ,["Mauritanie","MR"] ,["Maurice","MU"] ,["Mayotte","YT"] ,["Mexique","MX"] ,["Micronésie","FM"] ,["Moldavie","MD"] ,["Monaco","MC"] ,["Mongolie","MN"] ,["Monténégro","ME"] ,["Montserrat","MS"] ,["Maroc","MA"] ,["Mozambique","MZ"] ,["Myanmar","MM"] ,["Namibie","NA"] ,["Nauru","NR"] ,["Népal","NP"] ,["Pays Bas","NL"] ,["Nouvelle Calédonie","NC"] ,["Nouvelle Zélande","NZ"] ,["Nicaragua","NI"] ,["Niger","NE"] ,["Nigeria","NG"] ,["Niue","NU"] ,["Île Norfolk","NF"] ,["Îles Mariannes du Nord","MP"] ,["Norvège","NO"] ,["Oman","OM"] ,["Pakistan","PK"] ,["Palau","PW"] ,["Palestine","PS"] ,["Panama","PA"] ,["Papouasie Nouvelle Guinée","PG"] ,["Paraguay","PY"] ,["Pérou","PE"] ,["Philippines","PH"] ,["Pitcairn","PN"] ,["Pologne","PL"] ,["Portugal","PT"] ,["Puerto Rico","PR"] ,["Qatar","QA"] ,["Réunion","RE"] ,["Roumanie","RO"] ,["Russie","RU"] ,["Rwanda","RW"] ,["Saint Barthélemy","BL"] ,["Sainte Hélène","SH"] ,["Saint Kitts et Nevis","KN"] ,["Sainte Lucie","LC"] ,["Saint Martin (partie française)","MF"] ,["Saint Martin (partie néerlandaise)","SX"] ,["Saint Pierre et Miquelon","PM"] ,["Saint Vincent et les Grenadines","VC"] ,["Samoa","WS"] ,["Saint Marin","SM"] ,["Sao Tomé et Principe","ST"] ,["Arabie Saoudite","SA"] ,["Sénégal","SN"] ,["Serbie","RS"] ,["Seychelles","SC"] ,["Sierra Leone","SL"] ,["Singapour","SG"] ,["Slovaquie","SK"] ,["Slovénie","SI"] ,["Îles Salomon","SB"] ,["Somalie","SO"] ,["Afrique du Sud","ZA"] ,["Géorgie du Sud et les îles Sandwich du Sud","GS"] ,["Sud Soudan","SS"] ,["Espagne","ES"] ,["Sri Lanka","LK"] ,["Soudan","SD"] ,["Suriname","SR"] ,["Svalbard et Jan Mayen","SJ"] ,["Eswatini","SZ"] ,["Suède","SE"] ,["Suisse","CH"] ,["Syrie","SY"] ,["Taiwan","TW"] ,["Tadjikistan","TJ"] ,["Tanzanie","TZ"] ,["Thaïlande","TH"] ,["Timor Leste","TL"] ,["Togo","TG"] ,["Tokelau","TK"] ,["Tonga","TO"] ,["Trinité et Tobago","TT"] ,["Tunisie","TN"] ,["Turquie","TR"] ,["Turkménistan","TM"] ,["Îles Turques et Caïques","TC"] ,["Tuvalu","TV"] ,["Ouganda","UG"] ,["Ukraine","UA"] ,["Émirats Arabes Unis","AE"] ,["Royaume Uni","GB"] ,["États Unis","US"] ,["Îles mineures éloignées des États Unis","UM"] ,["Uruguay","UY"] ,["Ouzbékistan","UZ"] ,["Vanuatu","VU"] ,["Venezuela","VE"] ,["Viêt Nam","VN"] ,["Îles Vierges américaines","VI"] ,["Wallis et Futuna","WF"] ,["Sahara occidental","EH"] ,["Yémen","YE"] ,["Zambie","ZM"] ,["Zimbabwe","ZW"]];;
                                                        $pays="ma";
                                                        foreach($arr as $a){
                                                            if($demande->user->pays == $a[0]){
                                                                $pays=$a[1];break;
                                                            }
                                                        }
                                                    ?>
                                                    <h4><a href="{{Route('user.show',$demande->user->username)}}">{{$demande->user->username}}
                                                    <img class="flag" src="{{asset('images/flags')}}/{{strToLower($pays)}}.svg" alt="pays"></a></h4>
                                                    <div class="star-rating" data-rating="{{$demande->user->rating()}}"></div>
                                                </div>
                                            </div>
                                            
                                            <!-- Bid -->
                                            <div class="bids-bid col-xs-3">
                                                <div class="bid-rate py-1">
                                                    <div class="rate">{{$demande->prix}} $</div>
                                                    <span>{{$demande->duree}} Jours</span>
                                                </div>
                                            </div>
                                            @if($poste->status == 0)
                                            <div class="bids-bid col-1">
                                                <button id="edit" class="btn btn-lg btn-primary"><i class="fa fa-edit"></i></button>
                                            </div>
                                            @endif
                                        </div>
                                        @if(auth::user()->id == $demande->user->id)
                                        <form method="GET" action="{{Route('demande.edit',$demande)}}"> 
                                            <div class="row">
                                                <div class="bidding-fields col-sm-6 modifier d-none">
                                                    <div class="bidding-field">
                                                    <div class="input-group">
                                                        <input class="form-control" name="demande_prix" type="number" min="{{$demande->poste->min}}" max="{{$demande->poste->max}}" value="{{$demande->prix}}">
                                                        <div class="input-group-append">
                                                            <i class="input-group-text">USD</i>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="bidding-fields col-sm-6 modifier d-none">
                                                    <div class="bidding-field">
                                                    <div class="input-group">
                                                        <input class="form-control" name="demande_duree" type="number" min="1" value="{{$demande->duree}}">
                                                        <div class="input-group-append">
                                                            <i class="input-group-text">JOURS</i>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <p id="description_all">{{$demande->description}}<p>
                                                <textarea name="description" class="d-none" id="description" style>{{$demande->description}}</textarea>
                                                <input type="submit"  class="btn btn-primary modifier" value="modifier" style="display:none">
                                                
                                            </div>
                                        </form>
                                        @endif	    
    
                                    </li>
                                    @endforeach
                                    @foreach($poste->demandes->where('user_id','!=',auth::user()->id) as $demande)
                						<li class="demandes demandes{{$demande->poste->id}} py-2">
                							<div class="bid">
                								<!-- Avatar -->
                								<div class="bids-avatar">
                									<div class="freelancer-avatar">
                										<a href="{{Route('user.show',$demande->user->username)}}"><img src="{{asset('images/')."/".$demande->user->image}}" alt=""></a>
                									</div>
                								</div>
                								
                								<!-- Content -->
                								<div class="bids-content">
                									<!-- Name -->
                									<div class="freelancer-name">
                										<h4><a href="{{Route('user.show',$demande->user->username)}}">{{$demande->user->username}}</a></h4>
                										<div class="star-rating" data-rating="{{$demande->user->rating()}}"></div>
                									</div>
                								</div>
                								
                								<!-- Bid -->
                								<div class="bids-bid">
                									<div class="bid-rate">
                										<div class="rate">{{$demande->prix}} $</div>
                										<span>{{$demande->duree}} Jours</span>
                									</div>
                								</div>
                							</div>
                						</li>
                					@endforeach
            					@endforeach
                            </ul>
                    </div>

                </div>
                @if(!$projet->poste)
                    <div class="col-lg-4  content-right-offset">
                        <div class="sidebar-container">
                                <form method="POST" action="{{route('demande.store') }}">
                                        @csrf
                                    <div class="sidebar-widget">
                                        <div class="bidding-widget">
                                            <div class="bidding-headline"><h3>postuler à ce poste</h3></div>
                                            <div class="bidding-inner">
                                                <span class="bidding-detail"><strong>le poste :</strong></span>
                
                                                <div class="bidding-fields">
                                                    
                                                    <div class="bidding-field">
                                                    <div class="input-group">
                                                        <select name="poste" id="poste" class="custom-select">
                                                            @foreach($projet->postes->where('status','=',0) as $poste)
                                                            <option value="{{$poste->id}}">{{$poste->intitule}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <span class="bidding-detail"><strong>le prix :</strong></span>
                                                <div class="bidding-value">
                                                    <div class="input-group">
                                                        <input class="form-control" name="demande_prix" id="demande_prix" type="number" value="{{$projet->postes->first()->min??''}}" min="{{$projet->postes->first()->min??''}}" max="{{$projet->postes->first()->max??''}}">
                                                        <div class="input-group-append">
                                                            <i class="input-group-text">USD</i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="bidding-detail margin-top-30"><strong>le temps estimé</strong></span>
                                                <div class="bidding-fields">
                                                    <div class="bidding-field">
                                                    <div class="input-group">
                                                        <input class="form-control" name="demande_duree" type="number" min="1" value="1">
                                                        <div class="input-group-append">
                                                            <i class="input-group-text">JOURS</i>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <span class="bidding-detail margin-top-30"><strong>details de votre demande</strong></span>
        
                                                
                                                <div class="bidding-fields">
                                                    <div class="bidding-field">
                                                        @error('demande_description')
                                                            <div class="alert alert-danger p-1">{{$message}}</div>
                                                        @enderror
                                                        <div class="input-group">
                                                            <textarea class="form-control @error('demande_description') is-invalid @enderror" name="demande_description" rows="4" style="resize:vertical;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input id="snackbar-place-bid" class="btn btn-primary button ripple-effect move-on-hover full-width" type="submit" value="valider">
        
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                    </div>
                @endif
            @endif
            @else
            <div class="col-xl-12 col-lg-12 content-right-offset">
                <div class="boxed-list">
                    <div class="boxed-list-headline row">
                        <div class="col-sm-12">
                            <h3 class="margin-bottom-25">Description du projet</h3>
                        </div>
                    </div>
                    <p>{{$projet->description}}</p>
                </div>
                <div class="boxed-list">
                    <div class="boxed-list-headline row">
                        <h3 class="col-md-6"><i class="icon-material-outline-group"></i>les demandes des freelanceurs</h3>
                        <form class="col-md-6" >
                            <select name="poste" id="demandes" class="custom-select">
                                @foreach($projet->postes as $poste)
                                <option value="{{$poste->id}}">{{$poste->intitule}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <ul class="boxed-list-ul">
                        @foreach($projet->postes as $poste)
                            @foreach($poste->demandes as $demande)
                				<li class="demandes demandes{{$demande->poste->id}} py-2">
                							<div class="bid">
                								<div class="bids-avatar">
                									<div class="freelancer-avatar">
                										<a href="{{Route('user.show',$demande->user->username)}}"><img src="{{asset('images/')."/".$demande->user->image}}" alt=""></a>
                									</div>
                								</div>
                								<div class="bids-content">
                									<div class="freelancer-name">
                										<h4><a href="{{Route('user.show',$demande->user->username)}}">{{$demande->user->username}}<img class="flag" src="{{asset('images/flags')}}/{{strToLower(substr($demande->user->pays,0,2))}}.svg" alt="pays"></a></h4>
                										<div class="star-rating" data-rating="{{$demande->user->rating()}}"></div>
                									</div>
                								</div>
                								<div class="bids-bid">
                									<div class="bid-rate">
                										<div class="rate">{{$demande->prix}} $</div>
                										<span>{{$demande->duree}} Jours</span>
                									</div>
                								</div>
                							</div>
                				</li>
                			@endforeach
            			@endforeach
                    </ul>
                </div> 
            </div>    
            @endauth
        </div>
	</div>
	@endif
</div>
@endsection

@section("script")
<script>
   $(document).ready(function(){
        $(".demandes").css("display",'none');
        $(".demandes"+$("#demandes").val()).css('display','block');
       $("#edit").click(function(){
           $(".mes_demandes #description").removeClass("d-none");
           $(".mes_demandes #description_all").hide();
           $(".mes_demandes .modifier").attr("style","display:inline !important");
       });
       $("#poste").change(function(){
           val=$("#poste").val();
           $.ajax({
               url:"/poste/"+val,
               type:"GET",
               data:{
                   "id":$("#poste").val(),
               },
               success:function(response){
                $("#demande_prix").attr('value',response.min);
                 
              },
              error:function(response){
                console.log(response); 
              },
           })
       }); 
       $("#demandes").on("change",function(){
          $(".demandes").css("display",'none');
          $(".demandes"+$("#demandes").val()).css('display','block');
       });
       $("#projet_edit").click(function(){
           $("#description").hide();
           $("#projet_description").css('display','block'),
           $("#editer_projet").append('<input type="submit" class="btn btn-lg btn-primary" value="modifier">');
           $(".postes").css("display",'flex');
           $("#projet_description").removeAttr("disabled");
       });
    }); 
</script>

@endsection
    
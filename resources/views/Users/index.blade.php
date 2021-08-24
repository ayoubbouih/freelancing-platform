@extends('layouts.app')
@section('meta-generator')
<meta name="title" content="tous les projets">
<meta name="revisit-after" content="1 day">
<meta name="robots" content="index , follow">
<meta name="description" content="Tous les Freelancers | BeEmployer">
<title>Tous les Freelancers | BeEmployer</title>
@endsection
@section('includes')
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">
<style>
    .header-image {
        height: 130px;
        flex: 0 0 130px;
        width: 130px;
        background: #fff;
        border-radius: 50%;
        box-shadow: none;
        display: flex;
        padding: 0;
        overflow: hidden;
    }
    img.flag {
        height: 16px;
        border-radius: 3px;
        position: relative;
        top: -1px;
        display: inline-block;
        box-shadow: 0 0 3px rgba(0,0,0,.2);
        margin-right: 5px;
    }
    #footer h3{color:#fff;}
    p, .task-tags span, select{color:#000 !important;}
    .p-wrap{overflow-wrap: anywhere;}
    
    
    .freelancer{
                padding:20px 0px;
            }
            .freelancer:hover{
                box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
            }
            .freelancer-thumb{
                border-radius: 50%;
                height:150px;
                width:150px;
                padding:10px;
            }
            .pays{
                margin-left: 30px;
                height:20px;
                width:30px;
            }
            .freelancer-details{
                display:flex;
                flex-direction:column;
                justify-content: space-between;

            }
</style>
@endsection

@section('content')
<div class="py-3"></div>
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <!--<div class="sidebar-container">-->
            <!--    <div>-->
            <!--        <h3>Categories</h3>-->
            <!--        <div>-->
            <!--            <select name="categories" id=categories class="custom-select">-->
            <!--                <option value="0"><b>Tous les projet</b></option>-->
            <!--                @foreach($categories??[] as $cat)-->
            <!--                        <option value="{{$cat->lienDeCategorie}}">{{$cat->intitule}}</option>-->
            <!--                @endforeach-->
            <!--            </select>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div>
                <h3>Rechercher</h3>
                <form action="{{route('user.index')}}" method=get>
                    <div class="keywords-container">
                        <div class="keyword-input-container">
                        <input type="text" name=str class="keyword-input" placeholder="ex: designe project" value="{{$str}}">
                            <button class="btn btn-primary keyword-input-button ripple-effect"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <input type=hidden name="option" value="{{$option}}">
                </form>
            </div>

            </div>
            <div class="col-xl-9 col-lg-8 content-left-offset">
            <div class="notify-box">
                <h3 class="page-title"><b>Tous les Freelancers</b></h3>
                <div class="sort-by">
                    <form action="{{route('user.index')}}" method=get name="optionForm">
                        <select class="custom-select mt-2 py-1" name="option" onchange="optionForm.submit()">
                            <option value="aleatoire" {{$option=='aleatoire'?'selected':''}}>Aléatoire</option>
                            <option value="recent" {{$option=='recent'?'selected':''}}>plus récent</option>
                            <option value="ancien" {{$option=='ancien'?'selected':''}}>plus ancien</option>
                        </select>
                        <input type=hidden name="str" value="{{$str}}">
                    </form>
                </div>
            </div>
            
            <!-- Tasks Container -->
            <div class="tasks-list-container compact-list">
            @forelse($freelancers as $freelancer)		
                <a href="{{route('user.show',$freelancer->id)}}" class="task-listing conatiner freelancer">
                    <div class="col-4">
                        <img src="{{asset('/images').'/'.$freelancer->image}}" alt="{{$freelancer->fullname}}" class="freelancer-thumb">
                    </div>
                    <div class="col-8 freelancer-details">
                        <?php $arr=[["Afghanistan","AF"] ,["Îles Åland","AX"] ,["Albanie","AL"] ,["Algérie","DZ"] ,["Samoa américaines","AS"] ,["Andorre","AD"] ,["Angola","AO"] ,["Anguilla","AI"] ,["Antarctique","AQ"] ,["Antigua et Barbuda","AG"] ,["Argentine","AR"] ,["Arménie","AM"] ,["Aruba","AW"] ,["Australie","AU"] ,["Autriche","AT"] ,["Azerbaïdjan","AZ"] ,["Bahamas","BS"] ,["Bahreïn","BH"] ,["Bangladesh","BD"] ,["Barbade","BB"] ,["Biélorussie","BY"] ,["Belgique","BE"] ,["Belize","BZ"] ,["Bénin","BJ"] ,["Bermudes","BM"] ,["Bhoutan","BT"] ,["Bolivie","BO"] ,["Bosnie Herzégovine","BA"] ,["Botswana","BW"] ,["Île Bouvet","BV"] ,["Brésil","BR"] ,["British Virgin Islands","VG"] ,["Territoire britannique de l’Océan Indien","IO"] ,["Brunei Darussalam","BN"] ,["Bulgarie","BG"] ,["Burkina Faso","BF"] ,["Burundi","BI"] ,["Cambodge","KH"] ,["Cameroun","CM"] ,["Canada","CA"] ,["Cap Vert","CV"] ,["Iles Cayman","KY"] ,["République centrafricaine","CF"] ,["Tchad","TD"] ,["Chili","CL"] ,["Chine","CN"] ,["Hong Kong","HK"] ,["Macao","MO"] ,["Île Christmas","CX"] ,["Îles Cocos","CC"] ,["Colombie","CO"] ,["Comores","KM"] ,["République du Congo","CG"] ,["République démocratique du Congo","CD"] ,["Îles Cook","CK"] ,["Costa Rica","CR"] ,["Côte d’Ivoire","CI"] ,["Croatie","HR"] ,["Cuba","CU"] ,["Chypre","CY"] ,["République tchèque","CZ"] ,["Danemark","DK"] ,["Djibouti","DJ"] ,["Dominique","DM"] ,["République dominicaine","DO"] ,["Équateur","EC"] ,["Égypte","EG"] ,["Salvador","SV"] ,["Guinée équatoriale","GQ"] ,["Érythrée","ER"] ,["Estonie","EE"] ,["Éthiopie","ET"] ,["Îles Falkland","FK"] ,["Îles Féroé","FO"] ,["Fidji","FJ"] ,["Finlande","FI"] ,["France","FR"] ,["Guyane française","GF"] ,["Polynésie française","PF"] ,["Terres australes et antarctiques françaises","TF"] ,["Gabon","GA"] ,["Gambie","GM"] ,["Géorgie","GE"] ,["Allemagne","DE"] ,["Ghana","GH"] ,["Gibraltar","GI"] ,["Grèce","GR"] ,["Groenland","GL"] ,["Grenade","GD"] ,["Guadeloupe","GP"] ,["Guam","GU"] ,["Guatemala","GT"] ,["Guernesey","GG"] ,["Guinée","GN"] ,["Guinée Bissau","GW"] ,["Guyane","GY"] ,["Haïti","HT"] ,["Îles Heard et MacDonald","HM"] ,["Saint Siège (Vatican)","VA"] ,["Honduras","HN"] ,["Hongrie","HU"] ,["Islande","IS"] ,["Inde","IN"] ,["Indonésie","ID"] ,["Iran","IR"] ,["Irak","IQ"] ,["Irlande","IE"] ,["Ile de Man","IM"] ,["Italie","IT"] ,["Jamaïque","JM"] ,["Japon","JP"] ,["Jersey","JE"] ,["Jordanie","JO"] ,["Kazakhstan","KZ"] ,["Kenya","KE"] ,["Kiribati","KI"] ,["Corée du Nord","KP"] ,["Corée du Sud","KR"] ,["Koweït","KW"] ,["Kirghizistan","KG"] ,["Laos","LA"] ,["Lettonie","LV"] ,["Liban","LB"] ,["Lesotho","LS"] ,["Libéria","LR"] ,["Libye","LY"] ,["Liechtenstein","LI"] ,["Lituanie","LT"] ,["Luxembourg","LU"] ,["Macédoine","MK"] ,["Madagascar","MG"] ,["Malawi","MW"] ,["Malaisie","MY"] ,["Maldives","MV"] ,["Mali","ML"] ,["Malte","MT"] ,["Îles Marshall","MH"] ,["Martinique","MQ"] ,["Mauritanie","MR"] ,["Maurice","MU"] ,["Mayotte","YT"] ,["Mexique","MX"] ,["Micronésie","FM"] ,["Moldavie","MD"] ,["Monaco","MC"] ,["Mongolie","MN"] ,["Monténégro","ME"] ,["Montserrat","MS"] ,["Maroc","MA"] ,["Mozambique","MZ"] ,["Myanmar","MM"] ,["Namibie","NA"] ,["Nauru","NR"] ,["Népal","NP"] ,["Pays Bas","NL"] ,["Nouvelle Calédonie","NC"] ,["Nouvelle Zélande","NZ"] ,["Nicaragua","NI"] ,["Niger","NE"] ,["Nigeria","NG"] ,["Niue","NU"] ,["Île Norfolk","NF"] ,["Îles Mariannes du Nord","MP"] ,["Norvège","NO"] ,["Oman","OM"] ,["Pakistan","PK"] ,["Palau","PW"] ,["Palestine","PS"] ,["Panama","PA"] ,["Papouasie Nouvelle Guinée","PG"] ,["Paraguay","PY"] ,["Pérou","PE"] ,["Philippines","PH"] ,["Pitcairn","PN"] ,["Pologne","PL"] ,["Portugal","PT"] ,["Puerto Rico","PR"] ,["Qatar","QA"] ,["Réunion","RE"] ,["Roumanie","RO"] ,["Russie","RU"] ,["Rwanda","RW"] ,["Saint Barthélemy","BL"] ,["Sainte Hélène","SH"] ,["Saint Kitts et Nevis","KN"] ,["Sainte Lucie","LC"] ,["Saint Martin (partie française)","MF"] ,["Saint Martin (partie néerlandaise)","SX"] ,["Saint Pierre et Miquelon","PM"] ,["Saint Vincent et les Grenadines","VC"] ,["Samoa","WS"] ,["Saint Marin","SM"] ,["Sao Tomé et Principe","ST"] ,["Arabie Saoudite","SA"] ,["Sénégal","SN"] ,["Serbie","RS"] ,["Seychelles","SC"] ,["Sierra Leone","SL"] ,["Singapour","SG"] ,["Slovaquie","SK"] ,["Slovénie","SI"] ,["Îles Salomon","SB"] ,["Somalie","SO"] ,["Afrique du Sud","ZA"] ,["Géorgie du Sud et les îles Sandwich du Sud","GS"] ,["Sud Soudan","SS"] ,["Espagne","ES"] ,["Sri Lanka","LK"] ,["Soudan","SD"] ,["Suriname","SR"] ,["Svalbard et Jan Mayen","SJ"] ,["Eswatini","SZ"] ,["Suède","SE"] ,["Suisse","CH"] ,["Syrie","SY"] ,["Taiwan","TW"] ,["Tadjikistan","TJ"] ,["Tanzanie","TZ"] ,["Thaïlande","TH"] ,["Timor Leste","TL"] ,["Togo","TG"] ,["Tokelau","TK"] ,["Tonga","TO"] ,["Trinité et Tobago","TT"] ,["Tunisie","TN"] ,["Turquie","TR"] ,["Turkménistan","TM"] ,["Îles Turques et Caïques","TC"] ,["Tuvalu","TV"] ,["Ouganda","UG"] ,["Ukraine","UA"] ,["Émirats Arabes Unis","AE"] ,["Royaume Uni","GB"] ,["États Unis","US"] ,["Îles mineures éloignées des États Unis","UM"] ,["Uruguay","UY"] ,["Ouzbékistan","UZ"] ,["Vanuatu","VU"] ,["Venezuela","VE"] ,["Viêt Nam","VN"] ,["Îles Vierges américaines","VI"] ,["Wallis et Futuna","WF"] ,["Sahara occidental","EH"] ,["Yémen","YE"] ,["Zambie","ZM"] ,["Zimbabwe","ZW"]];;
                                    $pays="ma";
                                    foreach($arr as $a){
                                        if($freelancer->pays == $a[0]){
                                            $pays=$a[1];break;
                                        }
                                    }
                        ?>
                        <h4 class="freelancer-name">{{$freelancer->username}} <img class="flag pays" src="{{asset('images/flags')}}/{{strToLower($pays)}}.svg" alt="{{$freelancer->pays}}"></h4> 
                        <p class="freelancer-description">{{substr($freelancer->description,0,150)."..."}}</p>
                        <div class="row">
                            <div class="col-4 text-primary"><i class="fa fa-archive"></i> {{$freelancer->recrutements()->count()}} Projets réalisé</div>
                            <div class="col-4 text-primary"><i class="fa fa-star"></i> {{$freelancer->rating()}}</div>
                            <div class="col-4 text-primary"><i class="fa fa-clock-o"></i> {{$freelancer->created_at->diffForHumans()}}</div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center text-muted my-3 py-5">
                    <h3 class="pt-4"><i class="fa fa-frown-o fa-5x"></i></h3>
                    <h3 class="pb-5">Pas de Freelancers actuellement</h3>
                </div>
            @endforelse
            </div>
            <!-- Tasks Container / End -->

            <div class="row">
                <div class="col-md-12 mt-2">
                    <div class="d-flex justify-content-center">
                        <!-- Pagination -->
                        {{$freelancers->appends(['str'=>$str,'option'=>$option])->links()}}
                    </div>
                </div>
            </div>
            <!-- Pagination / End -->

        </div>
    </div>
        
</div>

@endsection

@section('script')

<script>
    $('select#categories').on("change",()=>{
        window.location.href="categorie/"+document.getElementById('categories').value;
    });
</script>

@endsection
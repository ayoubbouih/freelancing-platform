<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Notifications;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'=>['required','string','min:5','max:49','unique:users'],
            'fname' => ['required', 'string', 'min:3','max:24'],
            'lname' => ['required', 'string', 'min:3','max:24'],
            'email' => ['required', 'string', 'email', 'max:59', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $arr1=["Afghanistan","Îles Åland","Albanie","Algérie","Samoa américaines","Andorre","Angola","Anguilla","Antarctique","Antigua et Barbuda","Argentine","Arménie","Aruba","Australie","Autriche","Azerbaïdjan","Bahamas","Bahreïn","Bangladesh","Barbade","Biélorussie","Belgique","Belize","Bénin","Bermudes","Bhoutan","Bolivie","Bosnie Herzégovine","Botswana","Île Bouvet","Brésil","British Virgin Islands","Territoire britannique de l’Océan Indien","Brunei Darussalam","Bulgarie","Burkina Faso","Burundi","Cambodge","Cameroun","Canada","Cap Vert","Iles Cayman","République centrafricaine","Tchad","Chili","Chine","Hong Kong","Macao","Île Christmas","Îles Cocos","Colombie","Comores","République du Congo","République démocratique du Congo","Îles Cook","Costa Rica","Côte d’Ivoire","Croatie","Cuba","Chypre","République tchèque","Danemark","Djibouti","Dominique","République dominicaine","Équateur","Égypte","Salvador","Guinée équatoriale","Érythrée","Estonie","Éthiopie","Îles Falkland","Îles Féroé","Fidji","Finlande","France","Guyane française","Polynésie française","Terres australes et antarctiques françaises","Gabon","Gambie","Géorgie","Allemagne","Ghana","Gibraltar","Grèce","Groenland","Grenade","Guadeloupe","Guam","Guatemala","Guernesey","Guinée","Guinée Bissau","Guyane","Haïti","Îles Heard et MacDonald","Saint Siège (Vatican)","Honduras","Hongrie","Islande","Inde","Indonésie","Iran","Irak","Irlande","Ile de Man","Italie","Jamaïque","Japon","Jersey","Jordanie","Kazakhstan","Kenya","Kiribati","Corée du Nord","Corée du Sud","Koweït","Kirghizistan","Laos","Lettonie","Liban","Lesotho","Libéria","Libye","Liechtenstein","Lituanie","Luxembourg","Macédoine","Madagascar","Malawi","Malaisie","Maldives","Mali","Malte","Îles Marshall","Martinique","Mauritanie","Maurice","Mayotte","Mexique","Micronésie","Moldavie","Monaco","Mongolie","Monténégro","Montserrat","Maroc","Mozambique","Myanmar","Namibie","Nauru","Népal","Pays Bas","Nouvelle Calédonie","Nouvelle Zélande","Nicaragua","Niger","Nigeria","Niue","Île Norfolk","Îles Mariannes du Nord","Norvège","Oman","Pakistan","Palau","Palestine","Panama","Papouasie Nouvelle Guinée","Paraguay","Pérou","Philippines","Pitcairn","Pologne","Portugal","Puerto Rico","Qatar","Réunion","Roumanie","Russie","Rwanda","Saint Barthélemy","Sainte Hélène","Saint Kitts et Nevis","Sainte Lucie","Saint Martin (partie française)","Saint Martin (partie néerlandaise)","Saint Pierre et Miquelon","Saint Vincent et les Grenadines","Samoa","Saint Marin","Sao Tomé et Principe","Arabie Saoudite","Sénégal","Serbie","Seychelles","Sierra Leone","Singapour","Slovaquie","Slovénie","Îles Salomon","Somalie","Afrique du Sud","Géorgie du Sud et les îles Sandwich du Sud","Sud Soudan","Espagne","Sri Lanka","Soudan","Suriname","Svalbard et Jan Mayen","Eswatini","Suède","Suisse","Syrie","Taiwan","Tadjikistan","Tanzanie","Thaïlande","Timor Leste","Togo","Tokelau","Tonga","Trinité et Tobago","Tunisie","Turquie","Turkménistan","Îles Turques et Caïques","Tuvalu","Ouganda","Ukraine","Émirats Arabes Unis","Royaume Uni","États Unis","Îles mineures éloignées des États Unis","Uruguay","Ouzbékistan","Vanuatu","Venezuela","Viêt Nam","Îles Vierges américaines","Wallis et Futuna","Sahara occidental","Yémen","Zambie","Zimbabwe"];
$arr=["AF","AX","AL","DZ","AS","AD","AO","AI","AQ","AG","AR","AM","AW","AU","AT","AZ","BS","BH","BD","BB","BY","BE","BZ","BJ","BM","BT","BO","BA","BW","BV","BR","VG","IO","BN","BG","BF","BI","KH","CM","CA","CV","KY","CF","TD","CL","CN","HK","MO","CX","CC","CO","KM","CG","CD","CK","CR","CI","HR","CU","CY","CZ","DK","DJ","DM","DO","EC","EG","SV","GQ","ER","EE","ET","FK","FO","FJ","FI","FR","GF","PF","TF","GA","GM","GE","DE","GH","GI","GR","GL","GD","GP","GU","GT","GG","GN","GW","GY","HT","HM","VA","HN","HU","IS","IN","ID","IR","IQ","IE","IM","IT","JM","JP","JE","JO","KZ","KE","KI","KP","KR","KW","KG","LA","LV","LB","LS","LR","LY","LI","LT","LU","MK","MG","MW","MY","MV","ML","MT","MH","MQ","MR","MU","YT","MX","FM","MD","MC","MN","ME","MS","MA","MZ","MM","NA","NR","NP","NL","NC","NZ","NI","NE","NG","NU","NF","MP","NO","OM","PK","PW","PS","PA","PG","PY","PE","PH","PN","PL","PT","PR","QA","RE","RO","RU","RW","BL","SH","KN","LC","MF","SX","PM","VC","WS","SM","ST","SA","SN","RS","SC","SL","SG","SK","SI","SB","SO","ZA","GS","SS","ES","LK","SD","SR","SJ","SZ","SE","CH","SY","TW","TJ","TZ","TH","TL","TG","TK","TO","TT","TN","TR","TM","TC","TV","UG","UA","AE","GB","US","UM","UY","UZ","VU","VE","VN","VI","WF","EH","YE","ZM","ZW"];

        $user=$data['username'];
        $mail=$data['email'];
        
        $user=User::create([
            'username'=>$data['username'],
            'fullname' => $data['fname'].' '.$data['lname'],
            'email' => $data['email'],
            'last_activity'=>'0',
            'pays' => $arr1[array_search($_SERVER['HTTP_CF_IPCOUNTRY'],$arr)],
            'password' => Hash::make($data['password']),
            'paypal' => $data['email'],
            'role_id'=>1,
        ]);
        Mail::send('mails.register', ['user' => $user], function ($m) use ($data) {
            $m->from('support@beemployer.com', 'Votre Application');
            $m->to($data['email'], $data['username'])->subject('compte créé');
        });
        return $user;
        // return redirect()->route('dashboard','settings');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)?: redirect($this->redirectPath());
    }
}

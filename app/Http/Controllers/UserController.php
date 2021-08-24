<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\User;
use App\poste;
use App\projet;
use App\categorie;
use App\demande;
use App\message;
use App\paiement;
use App\conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function last_activity(){ //last activity for the user, you should call it at every method you create to keep track
        if(Auth::check())
        User::where('id',Auth::User()->id)->update(['last_activity'=>time()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
        $this->last_activity();
        $str=$r->input('str')??'';
        $option=$r->input('option')??'';
        switch($option){
            case 'aleatoire':
                $freelancers=User::where('username','like',"%$str%")->orWhere('fullname','like',"%$str%")->orderByRaw('rand()')->paginate(5);
                break;
            case 'recent':
                $freelancers=User::where('username','like',"%$str%")->orWhere('fullname','like',"%$str%")->orderBy('created_at','desc')->paginate(5);
                break;
            default:
                $freelancers=User::where('username','like',"%$str%")->orWhere('fullname','like',"%$str%")->paginate(5);
        }
        return view('Users.index',[
            'freelancers' => $freelancers,
            'option' => $option??'ancien',
            'str' => $str??''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->last_activity();
        if(is_numeric($id)){
            if(@Auth::User()->id !=$id || @Auth::User()->role->intitule=="admin")
                $User=User::find($id);
            else
                return view('Users.dashboard.index',["user"=>@Auth::User()]);
        }else{
            if(@Auth::User()->username !=$id)
                $User=User::where('Username',"=",$id)->first();
            else
                return view('Users.dashboard.index',["user"=>@Auth::User()]);
        }
            
        if($User)
            return view('Users.show',["user"=>$User]);
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $this->last_activity();
        $user->fullname=$request["fullname"];
        
        if($user->username != $request["username"]){
            if(User::all()->where('username','=',$request["username"])->keys()->first()){
                Session::flash('failure','vous pouvez pas utilisez cet username, il est déjà utiliser');
                return redirect()->route('dashboard','settings');
            }
        }
        $user->username=$request["username"];
        
        if($user->email != $request["email"]){
            if($user=User::all()->where('email','=',$request["email"])->keys()->first()){
                Session::flash('failure','vous pouvez pas utilisez cet adresse email');
                return redirect()->route('dashboard','settings');
            }
        }
        $user->email=$request["email"];
        
        $user->tel=$request["telephone"];
        $user->description=$request["description"];
        $user->pays=$request["pays"];
        if($request["password"] != "")
            $user->password=Hash::make($request["password"]);
        $user->save();
        Session::flash('success','Vos informations sont modifiés avec succès!');
        return redirect()->route('dashboard','settings');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,User $user)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }
    public function dashboard(string $page="",Request $request){
        $this->last_activity();
        if(Auth::User()->role->intitule=="admin"){
            switch($page){
                case "":case "index":
                    return view('Users.admin.index',["user"=>Auth::User()]);
                case "users":
                    $str=$request->input('str')??'';
                    return view('Users.admin.users',[
                        "users"=>User::where('username','like',"%$str%")->orWhere('fullName','like',"%$str%")->paginate(10),
                        'str'=>$str
                    ]);
                case "projets":
                    $str=$request->input('str')??'';
                    return view('Users.admin.projects',[
                        "user"=>Auth::User(),
                        "projets"=>projet::where('intitule','like',"%$str%")->orWhere('description','like',"%$str%")->orderBy('created_at','desc')->paginate(6),
                        "str"=>$str
                    ]);
                case "categories":
                    $str=$request->input('str')??'';
                    return view('Users.admin.categories',[
                        'categories'=>categorie::where('intitule','like',"%$str%")->orWhere('description','like',"%$str%")->paginate(10),
                        'str'=>$str
                    ]);
                case "parametres":case "settings":
                    return view('Users.admin.settings',['user'=>Auth::User()]);
                case "support":
                        $cvs=conversation::where('support_id',Auth::User()->id)
                                            // whereNotNull('support_id')
                                            ->orderBy('updated_at','desc')
                                            ->paginate(10);
                        $nomProjet=[];
                        for($i=0;$i<$cvs->count();$i++)
                            $nomProjet[$i]=projet::find(poste::find(demande::find($cvs->all()[$i]['demande_id'])->poste_id)->projet_id)->intitule;
                        return view('Users.admin.support',[
                            'conversations'=>[
                                'data'=>$cvs,
                                'nomProjet'=>$nomProjet
                            ]
                            
                        ]);
                case 'message':
                    $conversationId=$request->input('conversationId');
                    $c=conversation::find($conversationId);
                    if($c->support_id==auth::user()->id){
                       $messages=message::where('conversation_id',$conversationId)->get();
                        return view('Users.admin.message',[
                            'messages'=>$messages,
                            'conversationId'=>$conversationId,
                            'LatestMessageId'=>$messages->last()->id??-1
                        ]); 
                    }
                    else{
                        Session::flash('denied','vous avez pas le droit de visualiser cette conversation');
                        $messages=message::where('conversation_id',$conversationId)->get();
                        return view('Users.admin.message',[
                            'messages'=>$messages,
                            'conversationId'=>$conversationId,
                            'LatestMessageId'=>$messages->last()->id??-1
                        ]);
                    }
                    
                case "documentation":
                    return view('Users.admin.documentation');
                case "paiements":
                    return view('Users.admin.paiements',['paiements'=>paiement::paginate(10)]);
                case "categorieCreate":
                    return view('categories.create');
            }
        }else{
            switch($page){
                case "":case "index":
                    return view('Users.dashboard.index',["user"=>Auth::User()]);
                case "settings":
                    return view('Users.dashboard.settings',["user"=>Auth::User()]);
                case "conversation":
                    return view('Users.dashboard.conversations.index',["user"=>Auth::User()]);
                case "experiences":
                    return view('Users.dashboard.experiences',['experiences'=>Auth::User()->experiences]);
                case "paiements":
                    return view('paiement.index');
                case "avis":
                    return view('Users.dashboard.avis',['avis'=>auth()->user()->avis()]);
            }
        }
        abort(404);
    }
    

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
    public function uploadImage(Request $request){
        $this->last_activity();
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect()->route('dashboard','settings')->withErrors($validator);
        }
        
          $imageName = time().'.'.$request->avatar->extension();
          $request->avatar->move(public_path("images"),$imageName);
          $user=Auth::user();
          if(($img=$user->image) && $user->image!='default_user.png'){
            if(file_exists(public_path("images/$img")))
                unlink(public_path("images/$img"));
        }
          $user->image=$imageName;
          $user->save();
                
        return redirect()->route('dashboard','settings')->withSuccess('L\'image à été modifier avec succès');
    }
}

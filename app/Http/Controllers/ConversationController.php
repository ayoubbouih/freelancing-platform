<?php
namespace App\Http\Controllers;

use App\conversation;
use App\message;
use App\User;
use App\demande;
use App\poste;
use App\projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
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
        if($r->input('msgsType')=='support'){
            $cvs=conversation::where(function($q){
                $q->where('client_id',Auth::user()->id)
                ->orWhere('freelancer_id',Auth::user()->id);
            })->whereNotNull('support_id')
                ->orderBy('updated_at','desc')
                ->paginate(10);
            $type='support';
        }else{
            $cvs=conversation::where(function($q){
                $q->where('client_id',Auth::user()->id)
                ->orWhere('freelancer_id',Auth::user()->id);
            })->whereNull('support_id')
                ->orderBy('updated_at','desc')
                ->paginate(10);
            $type='message';
        }
        
        $nomProjet=[];
        for($i=0;$i<$cvs->count();$i++){
            $nomProjet[$i]=projet::find(poste::find(demande::find($cvs->all()[$i]['demande_id'])->poste_id)->projet_id)->intitule;
        }
        return view('Users.dashboard.conversations.index',[
            'conversations'=>[
                'data'=>$cvs,
                'nomProjet'=>$nomProjet
            ],
            'type'=>$type
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
        $demande=demande::find($request["demande_id"]);
        if($demande->conversation){
            $conversation=$demande->conversation->id;
        }
        else{
            $conversation=conversation::create([
            'demande_id'=>$demande->id,
            'client_id'=>$demande->poste->projet->user->id,
            'freelancer_id'=>$demande->user_id,
        ]);
        }
        return redirect()->route('conversation.show',$conversation);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\conversastion  $conversastion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->last_activity();
        $messages=message::where('conversation_id',$id)->where(function($msg){
            $msg->where('user_id',Auth::user()->id)->orWhere('recepteur_id',Auth::user()->id);
        })->get();
        foreach($messages as $m){
            if($m->recepteur_id==Auth::user()->id){
                $m->Vu=1;
                $m->save();
            }
        }

        if(auth::user()->id ==conversation::find($id)->client_id || auth::user()->id ==conversation::find($id)->freelancer_id){
            if(auth::user()->id ==conversation::find($id)->client_id)
            $conversationWith=conversation::find($id)->freelancer_id;
            else if(auth::user()->id ==conversation::find($id)->freelancer_id)
            $conversationWith=conversation::find($id)->client_id;
            
            return view('Users.dashboard.conversations.show',[
                'messages'=>$messages,
                'conversationWith'=>User::find($conversationWith),
                'conversationId'=>$id,
                'LatestMessageId'=>$messages->last()->id??0
                
        ]);
        }
            abort(404);
    }

    //      DB::connection()->enableQueryLog();
    //           dd(DB::getQueryLog(),$messages,$conversation,$currentUserId);

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\conversastion  $conversastion
     * @return \Illuminate\Http\Response
     */
    public function edit(conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\conversastion  $conversastion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
        $cv=conversation::findOrFail($id);
       switch($request->input('type')){
           case "reclamer":
               $cv->support_id=DB::table('users')->leftJoin('conversations','users.id','=','conversations.support_id')
                                ->selectRaw('users.id, count(conversations.support_id) as count')
                                ->where('users.role_id',2) //Admins
                                ->groupBy('users.id')
                                ->orderBy('count')
                                ->first()
                                ->id;
               $cv->save();
               $msg='Votre déclaration à été envoyer avec succès';
               break;
            case "finaliser_freelancer":
                $recrutement=$cv->demande->recrutement;
                $recrutement->status="en attente";
                $recrutement->save();
                $msg="Le status de recrutement maintenant est: en attente";
                break;
            case "finaliser_client": case "finaliser_client_accepter":
                $recrutement=$cv->demande->recrutement;
                $recrutement->status="terminé";
                $recrutement->save();
                $u=$cv->demande->user;
                $u->solde += $freelancerGain = $cv->demande->prix*.8; //80% freelancer, 20% du site
                $u->save();
                //user_id,mode_paiement,amount,token,transaction_id
                \App\paiement::create([
                    'user_id'=>$cv->freelancer_id,
                    'mode_paiement'=>'profit',
                    'amount'=>$freelancerGain,
                    'token'=>'-'.time().'-',
                    'transaction_id'=>'None'
                ]);
                if($request->input('type')=="finaliser_client"){
                    $msg="Le status de recrutement maintenant est: terminé";
                }else{
                    $msg="Le status de recrutement maintenant est: terminé, donner votre avis sur ce recrutement on option de conversation";
                }
                break;
            case "annuler":
                $user=$recrutement->demande->user; //return money to client
                $user->solde+=$recrutement->demande->prix;
                $user->save();
                $recrutement=$cv->demande->recrutement;
                $recrutement->status="annulé";
                $recrutement->save();
                $msg="Le status de recrutement maintenant est: annulé";
                break;
            default: $msg="il y a un erreur, svp ressayez";
                return redirect()->route('conversation.show',$id)->withErrors(['error'=>$msg]);
       }
       return redirect()->route('conversation.show',$id)->withSuccess($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\conversastion  $conversastion
     * @return \Illuminate\Http\Response
     */
    public function destroy(conversation $conversation)
    {
        //
    }
}

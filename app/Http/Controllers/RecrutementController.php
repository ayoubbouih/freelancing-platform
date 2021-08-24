<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use App\recrutement;
use App\conversation;
use App\demande;
use App\User;
use App\notification;
use App\poste;
use App\paiement;
use Illuminate\Http\Request;

class RecrutementController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $demande=demande::find($request['id']);
        if($demande->poste->projet->user->solde >= $demande->prix){
            
            
            if(!$demande->conversation){
                $con=conversation::create([
                    'demande_id'=>$demande->id,
                    'client_id'=>$demande->poste->projet->user->id,
                    'freelancer_id'=>$demande->user_id,
                ]);
            }
            else{
                $con=$demande->conversation->id;
            }
            $n=notification::create([
            'user_id'=>$demande->user_id,
            'type'=>'recrutement',
            'notifiable_type'=>$con,
            'data'=>'',
            ]);
            $notification=notification::find($n);
            $notification->data="<a href='/user/".$demande->poste->projet->user->username."'>.".$demande->poste->projet->user->username."</a> vous a recruté pour occuper le poste du <strong>".$demande->poste->intitule."</strong> dans le projet <a href='".route('notification.show',$n)."'>".$demande->poste->projet->intitule."</a>";
            $notification->save();

            recrutement::create([
                'poste_id'=>$demande->poste->id,
                'demande_id'=>$demande->id,
            ]);
            paiement::create([
                'user_id'=> $demande->poste->projet->user->id,
                'mode_paiement'=> 'demande',
                'token'=>uniqid(),
                'transaction_id'=>'',
                'amount'=>$demande->prix,
            ]);
            $p=poste::find($demande->poste->id);
            $p->status=1;
            $p->save();
            $user=User::find($demande->poste->projet->user->id);
            $user->solde-=$demande->prix;
            $user->save();
            
            
            Session::flash('recruited','vous aves recruté '.$demande->user->username.' pour occuper le poste '.$p->intitule);
            return redirect()->route('conversation.show',$con);
        }
        else
            Session::flash('failed','votre solde est inssufisant');
        return redirect()->route('paiement.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function show(recrutement $recrutement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function edit(recrutement $recrutement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recrutement $recrutement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function destroy(recrutement $recrutement)
    {
        //
    }
}

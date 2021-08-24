<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use App\notification;
use App\demande;
use App\conversation;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function last_activity(){ //last activity for the user, you should call it at every method you create to keep track
        if(Auth::check())
        \App\User::where('id',Auth::User()->id)->update(['last_activity'=>time()]);
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
        $request->validate([
            'demande_description' => 'required|string|max:255',
        ]);
        $demande=demande::create([
            'user_id'=>auth::user()->id,
            'poste_id'=>$request->poste,
            'description'=>$request['demande_description'],
            'prix'=>$request['demande_prix'],
            "duree"=>$request['demande_duree'],
            ]);
            $n=notification::create([
                'user_id'=>$demande->poste->projet->user->id,
                'type'=>'demande',
                'notifiable_type'=>$demande->poste->projet->id,
                'data'=> '',
            ]);
            $n->data='<a href="/user/'.$demande->user->username.'">'.$demande->user->username.'</a> a postulé un nouveau demande à votre projet <a href="/notification/'.$n->id.'">'.$demande->poste->projet->intitule.'</a>';
            $n->save();
            Session::flash('success','votre demande a été bien ajouté');
            return redirect()->route('projets.show',$demande->poste->projet->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,demande $demande)
    {
        $this->last_activity();
        $demande->prix=$request['demande_prix'];
        $demande->duree=$request['demande_duree'];
        $demande->description=$request['description'];
        $demande->save();
        Session::flash('success','votre demande a été modifié avec succès');
        return redirect()->route('projets.show',$demande->poste->projet->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, demande $demande)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demande=demande::find($id);
        $projet=$demande->poste->projet->id;
        $demande->delete();
        Session::flash('deleted','votre demande a été supprimé avec succès');
        return redirect()->route('projets.show',$projet);
    }
}

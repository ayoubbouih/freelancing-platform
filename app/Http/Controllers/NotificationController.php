<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\notification;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function last_activity(){ //last activity for the user, you should call it at every method you create to keep track
        if(Auth::check())
        App\User::where('id',Auth::User()->id)->update(['last_activity'=>time()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::flash('success','votre notification a été envoyé au membre concerné');
        return redirect()->route('dashboard','users');
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
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $n=notification::find($id);
        if($n){
            $n->read_at=Carbon::now();
            $n->save();
            if($n->type=="recrutement"){
                return redirect()->route('conversation.show',$n->notifiable_type);
            }
            elseif($n->type=="demande"){
                return redirect()->route('projets.show',$n->notifiable_type);
            }
            elseif($n->type=="paiement"){
                return redirect()->route('dashboard','paiements');
            }
            elseif($n->type=="retrait success"){
                return redirect()->route('paiement.index');
            }
        }
    }

    public function notRead($id){
        if($id==Auth::user()->id){
          $user=User::find($id);
        
        $n=$user->notifications->where('read_at','==',NULL);
        return response()->json($n);  
        }
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return redirect()->route('dashboard','user')->with('success','votre notification a été envoyé au membre concerné');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, experience $experience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(experience $experience)
    {
        //
    }
}

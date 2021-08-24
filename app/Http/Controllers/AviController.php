<?php

namespace App\Http\Controllers;
use Auth;
use App\avi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AviController extends Controller
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
        //
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
        $validator=Validator::make($request->all(), [
            'rating'=>'numeric',
            'avis'=>'string',
            'conversation'=>'numeric'
        ]);
        if($validator->fails()) {
           return redirect()->route('conversation.show',intval($request['conversation']))->withErrors(['error'=>'Il y a un erreur, svp ressayez de donner votre avis']);
        }
        Avi::create([
            'recrutement_id'=> \App\conversation::find($request['conversation'])->demande->recrutement->id,
            'note'=>$request['rating'],
            'description'=>$request['avis']
        ]);
        return redirect()->route('conversation.show',intval($request['conversation']))->withSuccess('Votre avis à été ajouter avec succès, merci!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\avi  $avi
     * @return \Illuminate\Http\Response
     */
    public function show(avi $avi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\avi  $avi
     * @return \Illuminate\Http\Response
     */
    public function edit(avi $avi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\avi  $avi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, avi $avi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\avi  $avi
     * @return \Illuminate\Http\Response
     */
    public function destroy(avi $avi)
    {
        //
    }
}

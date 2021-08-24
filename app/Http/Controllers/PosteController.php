<?php

namespace App\Http\Controllers;
use Auth;
use App\poste;
use Illuminate\Http\Request;

class PosteController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->last_activity();
        $poste=poste::find($id);
        return response()->json($poste);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function edit(poste $poste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, poste $poste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function destroy(poste $poste)
    {
        //
    }
    public function demandes($id){
        $this->last_activity();
        $demandes=poste::find($id)->demandes;
        return response()->json($demandes);
    }
}

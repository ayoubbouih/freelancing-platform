<?php

namespace App\Http\Controllers;

use App\projet;
use App\user;
use App\poste;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index')->with('projets',projet::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'projet_intitule' => 'required|min:10|max:255',
        //     'poste_intitule' => 'required|min:10|max:255',
        //     'poste_min' => 'required|numeric',
        //     'poste_max' => 'required|numeric',
        //     'description_poste' => 'required|min:10|max:255',

        // ]);
        $d=projet::create([
            "intitule"=>$request['projet_intitule'],
            'id_user'=>1,
            'id_categorie'=>1,
            'description'=>"hellohjkjk",
            'status'=>0
        ]);
        poste::create([
            'id_projet' => $d->id,
            'intitule' =>$request['poste_intitule'],
            'min' => $request['poste_min'],
            'max' => $request['poste_max'],
            'status'=>0,
        ]);
        dd('dd() for store method',$request,$d->id." poste");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('projects.show',['projet'=>Projet::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('projects.edit',['id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projet $projet)
    {
        dd('dd() for update method',$request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(projet $projet)
    {
        //
    }
}

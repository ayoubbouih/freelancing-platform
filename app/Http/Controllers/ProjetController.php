<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\poste;
use App\projet;
use App\conversation;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjetController extends Controller
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
        $this->last_activity();
        return redirect()->route('categorie.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->last_activity();
        if(Auth::check())
            return view('projets.create');
        else
            return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        $rules['projet_intitule'] = 'required|min:5|max:255';
        $rules['projet_description'] = 'required|min:20|max:255';
        foreach($data['poste_intitule'] as $key => $val){
            $rules['poste_intitule.'.$key] = 'required|min:3|max:255';
        }
        foreach($data['poste_min'] as $key => $val){
            $rules['poste_min.'.$key] = 'required|numeric';
        }
        foreach($data['poste_max'] as $key => $val){
            $rules['poste_max.'.$key] = 'required|numeric';
        }
        $rules['file']='mimes:doc,pdf,docx,zip,png,jpeg|max:5120';
        return Validator::make($data, $rules);
    }
    public function store(Request $request)
    {
         /* If projects Has No Poste*/
        // if($request->input("poste_intitule.0")!==null){
        //     return redirect()->route('projets.create')->withErrors('noPoste','Il faut ajouter au moin un poste à ce projet')->withInput();
        // }
        /* EndIf projects Has No Poste*/
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect()->route('projets.create')->withErrors($validator)->withInput();
        }
        /**Move file**/
            if(isset($request->file)){
              $fileName = time().'.'.$request->file->extension();
              $request->file->move(public_path("files"),$fileName);
            }else{
                $fileName='';
            }
        /**End Move File**/
        $d=projet::create([
            "intitule"=>$request['projet_intitule'],
            'user_id'=>Auth::user()->id,
            'categorie_id'=>$request['projet_categorie'],
            'description'=>$request['projet_description'],
            'status'=>0,
            'f_attachees'=>$fileName
        ]);

        $poste_intitule=$request->input("poste_intitule.*");
        $min=$request->input("poste_min.*");
        $max=$request->input("poste_max.*");
        for($i=0; $i<count($request->input('poste_min.*')); $i++){
            poste::create([
                'projet_id' => $d->id,
                'intitule' =>$poste_intitule[$i],
                'min' => $min[$i],
                'max' => $max[$i],
                'status'=>0,
            ]);
        }
        Session::flash('projAdded','Le projet à été ajouter avec succès');
        return redirect()->route('projets.show',$d->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->last_activity();
        if(empty($projet=Projet::find($id)))
            abort(404);
        return view('projets.show',['projet'=>$projet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $this->last_activity();
        $projet=projet::find($id);
        foreach($projet->postes as $poste){
            $poste->intitule=$request["poste".$poste->id."_intitule"];
            $poste->max=$request["poste".$poste->id."_max"];
            $poste->min=$request["poste".$poste->id."_min"];
            $poste->save();
        }
        $projet->description=$request["projet_description"];
        $projet->save();
        Session::flash('updated','votre projet a été modifié avec succès');
        return redirect()->route('projets.show',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('dd() for update method',$request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prjt=projet::findOrFail($id);
        foreach($prjt->postes as $p){
            foreach($p->demandes as $d){
                if($d->conversation){
                    $c=$d->conversation;
                    foreach($c->messages as $m)
                        $m->delete();
                    $c->delete();
                }
                if($d->recrutement){
                    if($d->recrutement->avis)
                        $d->recrutement->avis->delete();
                    $d->recrutement->delete();
                }
                $d->delete();
            }
            $p->delete();
        }
        $prjt->delete();
        return redirect()->route('dashboard','projets')->withSuccess('Le projet à été supprimer avec succès');
    }
}

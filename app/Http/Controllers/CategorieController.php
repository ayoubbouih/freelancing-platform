<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\projet;
use App\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
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
                $projets=projet::where('intitule','like',"%$str%")->orWhere('description','like',"%$str%")->orderByRaw('rand()')->paginate(5);
                break;
            case 'recent':
                $projets=projet::where('intitule','like',"%$str%")->orWhere('description','like',"%$str%")->orderBy('created_at','desc')->paginate(5);
                break;
            default:
                $projets=projet::where('intitule','like',"%$str%")->orWhere('description','like',"%$str%")->paginate(5);
        }
        return view('categories.index',[
            'categories' => categorie::all(),
            'projets' => $projets,
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
     * @param  \App\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $r)
    {   
        $this->last_activity();
        $str=$r->input('str')??'';
        if(is_numeric($id))
            $categorie=categorie::find($id);
        else
            $categorie=categorie::where('lienDeCategorie',$id)->first();
        if ($categorie)
            return view('categories.show',[
                'categorie'=>$categorie,
                'projets'=>projet::where(function($p) use($str){
                    $p->where('intitule','like',"%$str%")->orWhere('description','like',"%$str%");
                })->where('categorie_id',$categorie->id)->paginate(5),
                'str'=>$str
            ]);
        abort(404);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie=categorie::find($id);
        return view('Users.admin.categories-edit',["categorie"=>$categorie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $c=categorie::find($id);
        $c->intitule=$request['categorie_intitule'];
        $c->description=$request['categorie_description'];
        $c->save();
        return redirect()->route('dashboard','categories')->with('success','vous avez modifié la categorie '.$c->intitule);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(categorie $categorie)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class ExperienceController extends Controller
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
        $this->last_activity();
        return view('experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(),[
            'experience_intitule'=>'required|min:5|max:255',
            'experience_description'=>'required|min:5|max:255',
            'experience_link'=>'url',
            'file'=>'file|max:3072'
        ]);
        if ($validator->fails())
            return redirect()->route('experience.create')->withErrors($validator)->withInput();
        
        // Move file if exist
        if($request->file){
            $imageName = time().'.'.$request->file->extension();
            $request->file->move(public_path("images/experiences"),$imageName);
        }
        
        //id	user_id	date	intitule	description	image	lien
        $ex=new experience;
        $ex->user_id=Auth::User()->id;
        $ex->date=Carbon::now();
        $ex->intitule=$request->input('experience_intitule');
        $ex->description=$request->input('experience_description');
        $ex->image=$imageName??'';
        $ex->lien=$request->input('experience_link');
        $ex->save();
        return redirect()->route('dashboard','experiences')->withSuccess('Votre nouvelle expérience à été ajouter avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->last_activity();
        $experience=experience::where('id',$id)->where('user_id',Auth::User()->id)->first();
            if(empty($experience)) abort(404);
        return view('experiences.edit',['experience'=>$experience]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'experience_intitule'=>'required|min:5|max:255',
            'experience_description'=>'required|min:5|max:255',
            'experience_link'=>'url',
            'file'=>'file|max:3072',
            'oldImageName'=>'nullable|string'
        ]);
        if ($validator->fails())
            return redirect()->route('experience.edit',$id)->withErrors($validator)->withInput();
        
        // Move file if exist
        if($request->file){
            $imageName = time().'.'.$request->file->extension();
            $request->file->move(public_path("images/experiences"),$imageName);
            if(file_exists(public_path("images/experiences/".$request->oldImageName)))
                unlink(public_path("images/experiences/".$request->oldImageName));
        }
        
        experience::where('id',$id)->where('user_id',Auth::User()->id)->update([
            'intitule'=>$request->input('experience_intitule'),
            'description'=>$request->input('experience_description'),
            'image'=>$imageName??$request->oldImageName,
            'lien'=>$request->input('experience_link')
        ]);
        return redirect()->route('dashboard','experiences')->withSuccess('Votre expérience à été modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ex=experience::findOrFail($id);
        if(($img=$ex->image)){
            if(file_exists(public_path("images/experiences/$img")))
                unlink(public_path("images/experiences/$img"));
        }
        $ex->delete();
        return redirect()->route('dashboard','experiences')->withSuccess("L'expérience à été supprimer avec succès");
    }
}

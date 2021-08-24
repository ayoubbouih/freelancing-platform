<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function last_activity(){ //last activity for the user, you should call it at every method you create to keep track
        if(Auth::check())
        \App\User::where('id',Auth::User()->id)->update(['last_activity'=>time()]);
    }
    public function terms(){
        $this->last_activity();
        return view('public.terms');
    }
    public function privacy(){
        $this->last_activity();
        return view('public.privacy');
    }
    public function faq(){
        $this->last_activity();
        return view('public.faq');
    }
    public function contact(){
        $this->last_activity();
        return view('public.contact');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'     =>['required','email'],
            'subject'   =>['required','string'],
            'message'   =>['required','string','min:5','max:255']
        ]);
    }
    public function submitContact(Request $request){
        $this->last_activity();
        $validator=$this->validator($request->all());
        if($validator->fails())
            return redirect()->route('contact')->withErrors($validator)->withInput();
            
        Mail::send('mails.support', [
                'email'=>$request->input('email'),
                'subject'=>$request->input('subject'),
                'msg'=>$request->input('message')
            ], function($m) use ($request){
                $m->from($request->input('email'))->subject($request->input('subject'));
                $m->to('support@beemployer.com', 'Support BeEmployer');
        });
        return redirect()->route('contact')->withSuccess('Votre email à été envoyer avec succès');
    }
}

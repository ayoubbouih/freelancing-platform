<?php

namespace App\Http\Controllers;
use Notification;
use Illuminate\Http\Request;
use App\categorie;
use Auth;
use App\User;

class IndexController extends Controller
{
    public function last_activity(){ //last activity for the user, you should call it at every method you create to keep track
        if(Auth::check())
        User::where('id',Auth::User()->id)->update(['last_activity'=>time()]);
    }
    public function visitor(){
        $msg="<h3>".auth::user()->username."</h3>";
        $msg.="<p>".auth::user()->email."</p>";
        return $msg;
    }
    public function index(){
        $this->last_activity();
        return view('index')->with('categories',categorie::all());
    }
}

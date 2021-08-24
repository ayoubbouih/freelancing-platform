<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function last_activity(){ //last activity for the user, you should call it at every method you create to keep track
        if(Auth::check())
        App\User::where('id',Auth::User()->id)->update(['last_activity'=>time()]);
    }
    public function portfolio()
    {
    	return view('portfolio');
    }
}

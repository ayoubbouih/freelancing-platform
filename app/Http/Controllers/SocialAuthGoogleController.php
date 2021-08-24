<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
  use Socialite;
  use Auth; 
  use Exception;
class SocialAuthGoogleController extends Controller
{
     public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('email', $user->email)->first();
     
            if($finduser){
     
                Auth::login($finduser);
                return redirect('/');
     
            }else{
                $newUser = User::create([
                    'username' => $user->name,
                    'email' => $user->email,
                    'role_id' =>1,
                    'last_activity'=>'0',
                    'fullname' =>$user->name,
                    'paypal'=>$user->email,
                    'pays'=>"maroc",
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
     
                return redirect()->route('dashboard','settings');
            }
    
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }
}

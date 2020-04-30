<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{   
    use Notifiable;
    public function messages(){
        return $this->hasMany('App\messages');
    }
    public function paiements(){
        return $this->hasMany('App\paiement');
    }
    public function role(){
        return $this->belongsTo('App\role');
    }
    public function experiences(){
        return $this->hasMany('App\experience');
    }
    public function projects(){
    return $this->hasMany('App\projet');
    }

    /**
     * The attributes that are mass assignable.
     *
     */
     
    protected $fillable = [
        'username','fullname', 'tel', 'email', 'password','paypal', 'role_id',
    ];
     
    protected $hidden = [
        'password', 'remember_token',
    ];
     
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
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
    /*

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/
}

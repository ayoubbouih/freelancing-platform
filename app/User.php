<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

use Illuminate\Contracts\Auth\Authenticatable as Authenticatable2;

class User extends Authenticatable implements Authenticatable2
{   
    use Notifiable;
    public function messages(){
        return $this->hasMany('App\message');
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
    public function projets(){
    return $this->hasMany('App\projet');
    }
    public function demandes(){
    return $this->hasMany('App\demande');
    }
    public function recrutements(){
        $rec=[];
        foreach($this->demandes as $demande){
            if($demande->recrutement){
                array_push($rec,$demande);
            }
        }
         return collect($rec);
    }
    public function notifications(){
        return $this->hasMany('App\notification', 'notifiable_id');
    }
    public function avis(){
        
            $avis=[];
        foreach($this->recrutements() as $recrutements){
            if($recrutements->recrutement->avis){
                array_push($avis,$recrutements->recrutement->avis);
            }
            return collect($avis);
        }
    }
    public function rating(){
        $rating=0;
        $recrutements=0;
        $total=0;
        foreach($this->recrutements() as $recrutement){
            if($recrutement->recrutement->avis){
                $recrutements++;
                $total+=$recrutement->recrutement->avis->note;
            }
        }
        if($recrutements)
            return (float)$total/$recrutements;
        return "pas encore évalué";
    }
    /**
     * The attributes that are mass assignable.
     *
     */
     
    protected $fillable = [
        'username','fullname', 'tel', 'email','last_activity','image', 'password','paypal', 'role_id','description','pays'
    ];
     
    protected $hidden = [
        'password', 'remember_token',
    ];
     
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}

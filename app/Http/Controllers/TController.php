<?php

namespace App\Http\Controllers;
use App\user;
use App\role;
use Illuminate\Http\Request;

class TController extends Controller
{
    public function index($id){
        $arr=role::find($id);
    
      foreach($arr->users as $e) echo $e->username."<br>";
        return;
    }
}

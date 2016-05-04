<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;

//namespace App\Http\Controllers\Redirect;

use File;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Translation\FileLoader;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DateTime;

class CsrfController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
         session()->regenerate();
           session(['token' => base64_encode(openssl_random_pseudo_bytes(32))]);      
$session= session('token');

        return view('csrf',['value'=>$session]);
    }
    public function indexsecond($message) {
         session()->regenerate();
           session(['token' => base64_encode(openssl_random_pseudo_bytes(32))]);      
$session= session('token');

        return view('csrf',['value'=>$session,'message'=>$message]);
    }
    public function csrf() {
        $result="";
        $object=new CsrfController();
        session()->regenerate();
      $quantity=Input::get('quantity');
      $product=Input::get('product');
      $token=Input::get('token');
      if(!empty($quantity) && !empty($product))
      {
          if($object->check($token)){
        $result="processed";
     
          
          }
      }
      return Redirect::route('csrfprocess',['message'=>$result]);
   
        
    }

public function check($token){
      session()->regenerate();
      $get=session()->get('token');
     
    if( $token===$get)
    {
       
        Session::pull('token', 'default');
        return TRUE;
    }
    return false;
   
}
    }


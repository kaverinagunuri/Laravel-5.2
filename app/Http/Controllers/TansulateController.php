<?php

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


class TansulateController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        
        return View('Transulate');
}

 public function english() {
      $obj=new TansulateController();
       $lang='english'; 
     
      $words=array(
     'Hello'=>'hello',
    'coffee'=>'coffee'
);
      $retrive_lang= 'hello word in English Language '.$obj->init($lang,$words); 
     return View('Transulate', ['Transulate_value' => $retrive_lang]);
}
 public function deutsch() {
      $obj=new TansulateController();
     $lang='deutsch';
     $words=array(
     'Hello'=>'hallo',
    'coffee'=>'kaffee'
);
      $retrive_lang='hello word in Deutsch Language '.$obj->init($lang,$words);   
   return View('Transulate', ['Transulate_value' => $retrive_lang]);
}
public function init($lang,$words)
{
 
   session()->regenerate();
   
  session(['lang'=>$lang]);
if(empty(session()->get('lang')))
            {
            
          session(['lang'=>"english"]);
        }
       $result= $words['Hello'];
       return $result;
         
  
    
}


    }
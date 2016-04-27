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




class MultifileController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
     
        return view('MultiFile');
    }
    public function file()
    {
      $message="";
        $input=Input::file("upload");
        $file=$input[1]->getClientOriginalName();
       // echo $file;
     for($x=0;$x<count($input);$x++)
     {
         
         $input[$x]->move("multifile", $input[$x]->getClientOriginalName());
     }
        
   $message=count($input)."Files Successfully Uploded"; 
   //print_r($message);
   
     return View('MultiFile', ['MultiFile_value' => $message]);  
     
}
    
    }

 
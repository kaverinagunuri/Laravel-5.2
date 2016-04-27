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
use App\User;
use Illuminate\Support\Facades\DB;


class FindreplaceController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
          
        return view('Findreplace');
    }
    public function operation() {
         $input=Input::all();
        
         $replace=$input['replace'];
         //$text=$input['text'];
          $find=explode(',',$input['find']);
         // $find='/'.trim($find).'/'; 
         //array_map('trim',$fruit);
   //echo $find;
      print_r($find);
    $replace=(empty($replace)==false)?  preg_split('/,\s+/', $input['replace']):"";
  $text=(empty($find)===FALSE && empty($replace)===FALSE)? str_replace($find, $replace,$input['text']):$input['text'];
  
     echo $text; 
    }
   

}

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
        $object=new FindreplaceController();
         $replace=Input::get('replace');
       $find=Input::get('find');
     $message=Input::get('text');
          $find_explode=explode(',',$find);
           $replace_explode=explode(',',$replace);
   for($x=0;$x<count($find_explode);++$x){
       
        $find_explo[$x]="/".trim($find_explode[$x])."/";
   } 
   // $replace=(empty($replace)==false)?  preg_split('/,\s+/', $input['replace']):"";
  //$text=(empty($find)===FALSE && empty($replace)===FALSE)? str_replace($find, $replace,$input['text']):$input['text'];
  $text=  preg_replace($find_explo, $replace_explode, $message);
  return view('Findreplace',['message'=>$text]);
    }
   
}

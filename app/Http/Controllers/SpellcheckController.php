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
use Illuminate\Support\Str;


class SpellcheckController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
//       
        return view('SpellCheck');
    }
    public function check(){
       $input=Input::all();
     
        $word=$input['word'];
        if(empty($word)===FALSE)
      $word= trim($word);
        $object=new SpellcheckController();
        $object->spellchecker($word);
    }
    
    public function spellchecker($word) {
         $sub_words=substr($word,0,1);
      
        //  $query="SELECT Word FROM SpellChecker WHERE LEFT(Word,1)='".$sub_words."'"  where(Str::words('Word', 1),$sub_words)->
//$data=DB::table('SpellChecker')->select('Word')->where(DB::raw('left(Word, 1)',$sub_words))->get();
     $data=DB::table('SpellChecker')->select('Word')->get();
     foreach($data as $word)
     {
         foreach($word as $x=>$value)
         {
             if($x=='Word')
             {
                 
 $retrive=Str::words($value,1);
     
             if($retrive==$sub_words);
           echo $retrive."<br/>";
                 
     }
         }
             }
   
   
    }
    }

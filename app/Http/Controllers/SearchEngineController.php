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
use Helper;
use Illuminate\Support\Facades\DB;
class SearchEngineController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        return view('SearchEngine');
    }
    public function search() {
        $input=Input::get('keyword');
      $errors=array();
      $object=new SearchEngineController();
      if(empty($input))
          $errors[]="please enter the Keyword";
      else if(strlen($input)<3)
          $errors[]='Your search term must be three or more characters';
      else if( $object->search_result($input)===false)
          $errors[]="your serach keyword $input returns no results";
      if(empty($errors))
      {
          
          $retrive_data=$object->search_result($input);
      
         $result_count=  count($retrive_data);
          $correct='<p>Your search  for  <strong>'.$input.'</strong> returned <strong>'.$result_count.'</strong></p>';
          return view('SearchEngine',['correct'=>$correct,'result'=>$retrive_data]);
      }
       else{
           return view('SearchEngine',['errors'=>$errors]);
       }
        
    }
    function search_result($keywords) {
        $returned_results=array();
        $keywords=  preg_split('/ +/', $keywords);
      $count=count($keywords);
     $where="";

     foreach ($keywords as $key => $keyword) {
           $where.="`keyword` LIKE '%$keyword%'";
           if ($key != ($count - 1)) {
               $where.="  AND";
           }
       }
       $result = DB::select(DB::Raw("SELECT `Title`,`Description`,`Url` FROM `Search-Engine` WHERE $where"));
      $result = json_decode(json_encode($result), true);
       $result_rows=($result)?count($result):0;
     
   if($result_rows===0)
       return false;
   else {
       
       foreach ($result as $key => $value) {
         $returned_results[]=array(
             'Title'=>$value['Title'],
             'Description'=>$value['Description'],
             'Url'=>$value['Url'],
         );
        
       }
       
   }
  return $returned_results;
    }
}

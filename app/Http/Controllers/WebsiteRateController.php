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


class WebsiteRateController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        //return View('WebsiteRate');
        $object=new WebsiteRateController();
        $limit=5;
       $article= $object->get_articles($limit);
       if(count($article)==0)
       {
           echo "sorry no articles found";
       }
 else {
   
           
          return View('WebsiteRate', ['Result' => $article,'limit'=>$limit]);
          }
           

    }
    public function get_articles($limit) {
      
        $limit=(int)$limit;
        $article=array();
        $data=DB::table('website')->select('Id', 'Title','Rate-Total','Rate-Count')->take($limit)->get();
      
      $content = json_decode(json_encode($data), true);

   return $content;

        
   
    }
    public function rating($item,$rating,$limit) {
     $rate_system=new WebsiteRateController();
    $item_exists= $rate_system->items_rate('website',$item);
    if(!empty($item) && !empty($rating) && $item_exists==true && ($rating>=1 && $rating<=$limit))
      $rate_exists=$rate_system->rate('website',$item,$rating);
    return $rate_system->index();
    
    }
    public function items_rate($table,$item) {
        $item=(int)$item;
        $item_result=DB::table($table)->where('Id',$item)->count("Id")?true:false;
      return $item_result;
    }
    public function rate($table,$item,$rating) {
       $item=(int)$item;
        $rating=(int)$rating;
       $rating_result= DB::table('website') ->where('id', $item) ->increment('Rate-Count',1,['Rate-Total' => $rating]);
         
        return $rating_result;   
    }
    }

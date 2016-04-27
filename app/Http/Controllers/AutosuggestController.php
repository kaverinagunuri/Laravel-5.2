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


class AutosuggestController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
          
        return view('Autosuggest');
    }
    public function suggest() {
         $input=Input::get('search_term');
         
      $users = DB::table('cities')
             ->where('cityName', 'like', $input.'%')
             ->get();
     //print_r($users);
     foreach ($users as $cities)
     {      
         foreach ($cities as $city_name)
         {
             echo '<li>'.$city_name.'</li>';
         }
     }
    
    }
}
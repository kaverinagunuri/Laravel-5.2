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

class GuestController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {

        return View('Guest');
    }

    public function upload() {

        $input = Input::all();
        $dt=  new DateTime();
        $time=$dt->format('Y-m-d H:i:s');
        $name = htmlentities($input['name']);
        $email = htmlentities($input['email']);
        $message = htmlentities($input['message']);
        if (empty($name) && empty($email) && empty($message)) {
            $error[] = "All fields are required";
        }
        if (strlen($name) > 25 || strlen($email) > 80 || strlen($message) > 200) {
            $error[] = "one or more fields exceed their limit";
        }
        //print_r($error);
        if (empty($error)) {
            DB::table('GuestBook')->insert(
                   ['timestamp' => $time, 'Name' => $name,'Email'=>$email,'Message'=>$message]
          );
           $error[]="Successfully posted";
        }
        else{
              $error[]="something went Wrong";
        }
        
        $users = DB::table('GuestBook')->select('Name', 'Email','Message','timestamp')->where('Email',$email)->get();
       // print_r( $users);
//        foreach ($users as $attributes)
//        {
//            foreach ($attributes as $x=>$values)
//            {
//                if($x=='Name')
//            echo $values;
//            }
//        }
        
        return View('Guest', ['Guest_error' => $error,'Guest_user'=>$users]); 
    }

}

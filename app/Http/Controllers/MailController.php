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
use Mail;

class MailController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        $data = DB::select(DB::Raw("SELECT * FROM Mail_Form WHERE Send=1"));
        $content = json_decode(json_encode($data), true);
        // echo '<pre>'; print_r($content);
        return view('Mail', ['users' => $content]);
    }

    public function send() {
        $test = Input::get('count');
        
        for ($x = 0; $x <= $test - 1; $x++) {
            $this->$Email = Input::get('mail_' . $x);
         //   $name = 'VVVVV.</br>';
            

            
        Mail::raw('Text to e-mail', function($message) use ($Email){
 
            $message->from('kaveri.nagunuri@karmanya.co.in', 'Laravel');

            $message->to($Email);
        });



//            Mail::raw("hai", ['x' => $x, 'name' => $Email], function($message) use ($x, $name) {
//                $message->from('kaveri.nagunuri@karmanya.co.in', 'Laravel');
//                $message->subject("hello");
//                $message->to($Email);
//            });
        }
    }

}

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
public function mailinglist() {

        $mail = DB::table('Mail_Form')->select('FirstName', 'Email')->get();
        return view('Mail', ['mail' => $mail]);
    }

    public function maillistsubmit() {
        $messagereturn=null;
        $value = Input::get('count');
        $message=Input::get('message');
        // $email=null;
        for ($x = 0; $x < $value; $x++) {
            if (Input::get('mail_' . $x)) {
                $email = Input::get('mail_' . $x);
               $val= Mail::raw($message, function ($message)use($email) {

                    $message->from('kaveri.nagunuri@karmanya.co.in', 'kaveri');
                    $message->to($email)->subject("Mail list");
                });
            }
        }
        if($val){
            
            $messagereturn="Mails sent successfully";
        }
        else{
            $messagereturn="Mails could not be sent please try again";
        }
        
        $mail = DB::table('Mail_Form')->select('FirstName', 'email')->get();
        return view('Mail', ['mail' => $mail,'message'=>$messagereturn]);
    }

}


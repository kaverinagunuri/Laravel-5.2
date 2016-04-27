<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\User;

class HomeController extends Controller {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function home() {
        
        $users = User::find(2)->FirstName;
        echo '<pre>', ($users), '</pre>';
        //return 'Home';
        //return view('layouts/home');
//        Mail::raw('Text to e-mail', function($message) {
//            $message->from('kaveri.nagunuri@karmanya.co.in', 'Laravel');
//
//            $message->to('nagunurikaveri@gmail.com')->cc('nagunurikaveri@gmail.com');
//        });
//        Mail::send('emails/email',array('name'=>'kaveri'),  function ($message)
//        {
//            $message->to('nagunurikaveri@gmail.com','kaveri')->subject('Test Mail');
//                    
//    });
    return view('layouts/home');
    }

}

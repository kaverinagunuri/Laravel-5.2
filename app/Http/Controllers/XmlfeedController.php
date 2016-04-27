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
use Illuminate\Support\Facades\Session;

class XmlfeedController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        $feer_url = 'http://www.php.net/feed.atom';
        $feed = simplexml_load_file($feer_url);
        //print_r($feed);
        $limit = 10;
        $x = 1;
        foreach ($feed as $items)
 {
     if($x<=$limit)
     {
   
     $title[]=$items->title;
     $url[]=$items->id;
     //echo '<li><a href="',$url,'">',$title,'</a></li>';
   
     
     }
     $x++;
     
       
 }

     
 return View('Xmlfeed', ['Xmlfeed_url' => $url,'Xmlfeed_title' => $title]);
    }

}

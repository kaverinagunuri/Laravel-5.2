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

class PhotoalbumController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
        $page = $_SERVER['PHP_SELF'];
        $column = 2;
        $base = "data";
        $thumbs = "thumbs";
        @$get_album = $_GET['album'];
        if (!$get_album) {
             $choice= "Select an Album";
            $handle = File::directories($base);
            // print_r($handle);
            foreach ($handle as $file) {
                if ($file != 'data/thumbs')
                {
                    $file=  substr ($file, "5");
                
               // echo $file;
                    $folder[] = $file;
                    
                }
            }
        }

       return View('Photoalbum', ['Photoalbum_folder' => $folder,"choice"=>$choice]);
    }
    public function folder($folder){
      
       $path='data/'.$folder;
        $file=  File::Files($path);
        //print_r($file);
        return View('Photoalbum', ['Photoalbum_image' => $folder,"image"=>$file]); 
    }

}

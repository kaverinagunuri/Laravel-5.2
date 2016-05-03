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

use Illuminate\Support\Facades\DB;
use App\nbbc\BBCode;
class BbcController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
    
        $bb=new BBCode();
        
        $output='[b]Bold[/b]';
        echo $bb->Parse($output);
        //return view('bbc');
    }
    }
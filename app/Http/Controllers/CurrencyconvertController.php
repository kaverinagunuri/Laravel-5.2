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



class CurrencyConvertController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
          
        return view('CurrencyConvert');
    }
    public function convertor(){
        $input=  Input::all();
       $from=$input['from'];
        $amount=$input['amount'];
         $to=$input['to'];
         $obj=new CurrencyConvertController();
         $obj->currency_convert($amount,$from,$to);
//         return Redirect::route('currency_convert')
//                         ->withInput();
       
         
    }
    

public function currency_convert($amount,$from,$to)
{//$get =  File::getRemote("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
    $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from&to=$to");
  $get = explode("<span class=bld>",$get);
  $get = explode("</span>",$get[1]);  
  $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
 echo $converted_amount;
   return view('CurrencyConvert', ['converted_currency' => $converted_amount]);
}
 
    
}

?>


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




class SecureController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

    public function index() {
          
        return view('Secure');
    }
 
    public function uploadFiles() {

     
        $input = input::file('file');
       //print_r($input);
         //$input->move("Uploads", $input->getClientOriginalName());
         //echo "success";
      
       
   $error=array();
      $allowed=array('jpg','jpeg','gif','png');
     $file_name=$input->getClientOriginalName();
     // echo $file_name;
        @$file_ext=  strtolower(end(explode('.', $file_name)));
       //echo $file_ext;
        $file_size=$input->getClientSize();
//    $file_tmp=$input['tmp_name'];
    if(in_array($file_ext, $allowed)===FALSE)
   {
       $error[]='extension not allowed';
       
    }
    if($file_size>2097152){
       $error[]='file size should be less than 2 mb'; 
    }
     if(empty($error)){
//    //move_uploaded_file($input['tmp_name'], "upload/$file_name");
    $input->move("Uploads", $input->getClientOriginalName());
    $error[]="successfully uploaded";
   }
//   else{
//      foreach ($error as $value) {
//           echo $value.'<br/>';
//           
//       }
  // }

      return View('Secure', ['Secure_value' => $error]);  
    }


}
?>

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


class ShopCartController extends BaseController {

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests;

 public function shoppingcart() {

        $values = DB::table('shoppingcart')->get();
        $product = json_decode(json_encode($values), true);
        return view('shoppingcart/shoppingcart', ['product' => $product]);
    }

    public function addcart() {

        $id = Input::get('value');
        if (DB::table('Tempcart')->where('productid', $id)->get()) {

            echo "Product already added to cart";
        } else {

            DB::table('Tempcart')->insert(['productid' => $id, 'quantity' => 1]);
        }
    }

    public function checkcart() {

        $result = DB::table('Tempcart')->count('productid');
        return $result;
    }

    public function checkout() {

        $resultquery = DB::table('shoppingcart')
                ->join('Tempcart', 'shoppingcart.Id', '=', 'Tempcart.productid')
                ->select('shoppingcart.Id','shoppingcart.Name', 'shoppingcart.Description', 'Tempcart.quantity','shoppingcart.Price')
                ->get();

        $product = json_decode(json_encode($resultquery), true);
        return view('shoppingcart/cartview', ['product' => $product]);
    }
    
    public function addproduct($id){
        
        
            DB::table('Tempcart')->where('productid','=',$id)->increment('quantity');
            $obj=new ShopCartController();
            return $obj->checkout();
    }
    
    public function deductproduct($id){
        
            DB::table('Tempcart')->where('productid','=',$id)->decrement('quantity');
            $obj=new ShopCartController();
            return $obj->checkout();
    }

    public function deleteproduct($id){
        
        DB::table('Tempcart')->where('productid','=',$id)->delete();
            $obj=new ShopCartController();
            return $obj->checkout();
    }
    public function payment(){
        $price=Input::get('price');
        return view('shoppingcart/paymentview', ['price' => $price]);
    }

    public function paid(){
        $price=Input::get('price');
        $name=Input::get('name');
        $account=Input::get('number');
        DB::table('Tempcart')->truncate();
        return view('shoppingcart/paidview', ['price' => $price,'name'=>$name,'account'=>$account]);
    }
    }
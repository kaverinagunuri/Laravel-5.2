<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("/",function()
{echo "haiii";}
        
        );
        
//------------------------------HitCounter-----------------------------------//
        
Route::get('/Counter',array(
    'as'=>'Counter',
    'uses'=>'counterController@home'
));

Route::get("mail",'HomeController@home');


//------------------------------Secure File Upload-----------------------------------//
Route::get('/SecureUpload', 'SecureController@index');
//Route::post('/', 'SecureController@uploadFiles');
Route::post('/Secure',array(
    'as'=>'Secure-post',
    'uses'=>'SecureController@uploadFiles'
));

//------------------------------Multiple File Upload-----------------------------------//

Route::get('/MultifileUpload', 'MultifileController@index');
Route::post('/MultifileUpload',array(
    'as'=>'MultiFile-post',
    'uses'=>'MultifileController@file'
));


//------------------------------Currency - Convertor-----------------------------------//

Route::get('/CurrencyConvert', 'CurrencyconvertController@index');
Route::post('/CurrencyConvert',array(
    'as'=>'Currency-post',
    'uses'=>'CurrencyconvertController@convertor'
));


//------------------------------Auto Suggest Drop-Down -----------------------------------//

Route::get('/AutoSuggest', 'AutosuggestController@index');

Route::post('Autosuggest','AutosuggestController@suggest');



//------------------------------Find and Replace -----------------------------------//

Route::get('/FindReplace', 'FindreplaceController@index');
Route::post('/FindReplace',array(
    'as'=>'Findreplace-post',
    'uses'=>'FindreplaceController@operation'
));
//Route::get('/TemplateEngine', 'TemplateEngineController@index');
//Route::get('/Transulate', 'TansulateController@index');
//Route::get('/home', array(
//		'as' => 'home',
//		'uses' => 'TansulateController@index'
//	));

//Route::get('/english', array(
//		'as' => 'english',
//		'uses' => 'TansulateController@english'
//	));
//Route::get('/deutsch', array(
//		'as' => 'deutsch',
//		'uses' => 'TansulateController@deutsch'
//	));


//------------------------------Xml Feed-----------------------------------//

Route::get('/XmlFeed', 'XmlfeedController@index');

//------------------------------Non Database Photo-Album -----------------------------------//

Route::get('/PhotoAlbum', array(
    'as'=>'index',
    'uses'=> 'PhotoalbumController@index'
   ));
Route::get('/Album{folder}', array(
		'as' => 'folder',
		'uses' => 'PhotoalbumController@folder'
	));

//------------------------------Guest Book -------------------------------//

Route::get('/GuestBook', 'GuestController@index');
Route::post('/GuestBook-Upload', array(
    'as'=>'upload',
    'uses'=> 'GuestController@upload'
   ));


//------------------------------Spell Checker-----------------------------------//

Route::get('/SpellChecker', 'SpellcheckController@index');
Route::get('/SpellChecker-check', array(
    'as'=>'check',
    'uses'=> 'SpellcheckController@check'
   ));


//------------------------------Website Rating-----------------------------------//

Route::get('/WebsiteRating', array(
    'as'=>'websiteindex',
    'uses'=> 'WebsiteRateController@index'
   ));
Route::get('/WebsiteRating/{item}/{rating}/{limit}', array(
		'as' => 'rating',
		'uses' => 'WebsiteRateController@rating'
	));


Route::get("/BBcCode",'BbcController@index');

//------------------------------Search Engine-----------------------------------//

Route::get("/SearchEngine",'SearchEngineController@index');
Route::post('/SearchEngine-search', array(
    'as'=>'Search',
    'uses'=> 'SearchEngineController@search'
   ));

//------------------------------Shout Box-----------------------------------//

Route::get('shoutbox',array(
    'as'=>'shoutbox',
    'uses'=> 'ShoutController@shout'));
Route::post('/ShoutBox-Upload', array(
    'as'=>'shoutboxsubmit',
    'uses'=> 'ShoutController@shoutboxsubmit'
   ));

//------------------------------Page Transulate-----------------------------------//

Route::get('translate/{language}', array(
   "as" => 'translate',
   'uses' => 'transulateController@translate'
));

Route::get('translatepage', array(
   "as" => 'translatepage',
   'uses' => 'transulateController@main'
));
Route::any('menu/{language}',array(
   'as'=>'menu',
    'uses'=>'transulateController@menu'));

Route::get('/Rss', 'RssController@index');


//------------------------------CSRF-----------------------------------//

Route::get("/Csrf",'CsrfController@index');
Route::post('Csrf', array(
   "as" => 'csrf',
   'uses' => 'CsrfController@csrf'
));
Route::get('csrfprocess/{message}',array(
    'as'=>'csrfprocess',
    'uses'=>'CsrfController@indexsecond'
));
//Route::get('MailList','MailController@index');
//Route::post('MailList/Send', array(
//   "as" => 'SendMail',
//   'uses' => 'MailController@send'
//));


//------------------------------MAiling List-----------------------------------//

Route::get('MailList',array(
    'as'=>'mailinglist',
    'uses'=>'MailController@mailinglist'
));
Route::post('maillistsubmit',array(
    'as'=>'maillistsubmit',
    'uses'=> 'MailController@maillistsubmit'));

//------------------------------Url Shorten-----------------------------------//

Route::get('UrlShorten','UrlController@index');
Route::post('shorten','UrlController@shorten');


//------------------------------Like Button-----------------------------------//

Route::get('LikeButton',array(
    'as'=>'LikeButton',
    'uses'=>'LikeController@index'));
Route::post('like_add','LikeController@like_add');
Route::post('like_get','LikeController@like_get');


//------------------------------Chat Box-----------------------------------//

Route::get('chatwindow/{name}',array(
    'as'=>'chatwindow',
    'uses'=>'chatController@chat'
));
Route::post('/chatsubmit','chatController@chatsubmit');

Route::post('/getchat','chatController@getchat');


//------------------------------Template Engine-----------------------------------//

Route::get('templateengine', 'TemplateEngineController@home');


//------------------------------Image Upload-----------------------------------//

Route::get('imageupload', 'imageController@home');

Route::get('imageupload/register', array(
    'as' => 'register',
    'uses' => 'imageController@register'
));
Route::get('imageupload/home', array(
    'as' => 'homeimage',
    'uses' => 'imageController@home'
));
Route::any('imageupload/login', array(
    'as' => 'loginUser',
    'uses' => 'imageController@login'
));

Route::post('imageupload/registration', array(
    'as' => 'registersubmit',
    'uses' => 'imageController@registersubmit'
));

Route::get("hai", 'imageController@hai');

Route::get("imageupload/showalbums", array(
    'as' => 'albums',
    'uses' => "imageController@albums"
));
Route::get("imageupload/createalbums", array(
    'as' => 'createalbum',
    'uses' => "imageController@createalbum"
));
Route::get("imageupload/uploadimage", array(
    'as' => 'imageupload',
    'uses' => "imageController@imageuploadview"
));
Route::post('imageupload/createalbum', array(
    'as' => 'createalbumsubmit',
    'uses' => 'imageController@createalbumsubmit'
));
Route::post('imageupload/imagesave', array(
    'as' => 'imageuploadsubmit',
    'uses' => 'imageController@imageupload'
));
Route::get('viewalbum/{name}', array(
    'as' => 'viewalbum',
    'uses' => "imageController@viewalbum"));
Route::get("deletealbum/{name}",array(
    'as'=>'deletealbum',
    'uses'=>'imageController@deletealbum'
));
//
Route::get("imagedelete/{name}",array(
    'as'=> 'imagedelete',
    'uses'=>'imageController@imagedelete'
));
//Route::get('imagedelete','imageController@imagedelete');

Route::get("editalbum/{name}",array(
    'as'=> 'editalbum',
    'uses'=>'imageController@editalbum'
));
Route::post("imageupload/editalbum",array(
     'as' =>  "editalbumname",
    'uses' => "imageController@editalbumname"));


//------------------------------Mini Shopping Cart-----------------------------------//

Route::get('minishoppingcart',array(
    'as'=>'minishoppingcart',
    'uses'=>'ShopCartController@shoppingcart'
));
Route::post('addtocart',array(
    'as'=>'addtocart',
    'uses'=>'ShopCartController@addcart'
));
Route::post('checkcart','ShopCartController@checkcart');
Route::post('checkout',array(
    'as'=>'checkout',
    'uses'=>'ShopCartController@checkout'
));
Route::get('incrementproduct/{id}',array(
    'as'=>'incrementproduct',
    'uses'=>'ShopCartController@addproduct'
));

Route::get('decrementproduct/{id}',array(
    'as'=>'decrementproduct',
    'uses'=>'ShopCartController@deductproduct'
));
Route::get('deleteproduct/{id}',array(
    'as'=>'deleteproduct',
    'uses'=>'ShopCartController@deleteproduct'
));
Route::post('payment',array(
    'as'=>'payment',
    'uses'=>'ShopCartController@payment'
));
Route::post('paid',array(
    'as'=>'paid',
    'uses'=>'ShopCartController@paid'
));
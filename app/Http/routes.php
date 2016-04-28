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

//Route::get('/', array(
//    'as'=>'home',
//    'uses'=>'HomeController@home'
//));

/*use App\User;
Route::get('/User',function(){
   $user=User::find(1);
   print_r($user);
});*/
Route::get("/",function()
{echo "haiii";}
        
        );
Route::get('/Counter',array(
    'as'=>'Counter',
    'uses'=>'counterController@home'
));


Route::get('/SecureUpload', 'SecureController@index');
//Route::post('/', 'SecureController@uploadFiles');
Route::post('/Secure',array(
    'as'=>'Secure-post',
    'uses'=>'SecureController@uploadFiles'
));

Route::get('/MultifileUpload', 'MultifileController@index');
Route::post('/MultifileUpload',array(
    'as'=>'MultiFile-post',
    'uses'=>'MultifileController@file'
));
Route::get('/CurrencyConvert', 'CurrencyconvertController@index');
Route::post('/CurrencyConvert',array(
    'as'=>'Currency-post',
    'uses'=>'CurrencyconvertController@convertor'
));

Route::get('/AutoSuggest', 'AutosuggestController@index');

Route::post('Autosuggest','AutosuggestController@suggest');

Route::get('/FindReplace', 'FindreplaceController@index');
Route::post('/FindReplace',array(
    'as'=>'Findreplace-post',
    'uses'=>'FindreplaceController@operation'
));
Route::get('/TemplateEngine', 'TemplateEngineController@index');
Route::get('/Transulate', 'TansulateController@index');
Route::get('/home', array(
		'as' => 'home',
		'uses' => 'TansulateController@index'
	));

Route::get('/english', array(
		'as' => 'english',
		'uses' => 'TansulateController@english'
	));
Route::get('/deutsch', array(
		'as' => 'deutsch',
		'uses' => 'TansulateController@deutsch'
	));
Route::get('/XmlFeed', 'XmlfeedController@index');
Route::get('/PhotoAlbum', array(
    'as'=>'index',
    'uses'=> 'PhotoalbumController@index'
   ));
Route::get('/Album{folder}', array(
		'as' => 'folder',
		'uses' => 'PhotoalbumController@folder'
	));
Route::get('/GuestBook', 'GuestController@index');
Route::post('/GuestBook-Upload', array(
    'as'=>'upload',
    'uses'=> 'GuestController@upload'
   ));
Route::get('/SpellChecker', 'SpellcheckController@index');
Route::get('/SpellChecker-check', array(
    'as'=>'check',
    'uses'=> 'SpellcheckController@check'
   ));
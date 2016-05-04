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
Route::get('/Counter',array(
    'as'=>'Counter',
    'uses'=>'counterController@home'
));

Route::get("mail",'HomeController@home');
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
Route::get('/ChatBox', 'ChatController@index');
Route::get('/WebsiteRating', array(
    'as'=>'websiteindex',
    'uses'=> 'WebsiteRateController@index'
   ));
Route::get('/WebsiteRating/{item}/{rating}/{limit}', array(
		'as' => 'rating',
		'uses' => 'WebsiteRateController@rating'
	));
Route::get("/BBcCode",'BbcController@index');
Route::get("/SearchEngine",'SearchEngineController@index');
Route::post('/SearchEngine-search', array(
    'as'=>'Search',
    'uses'=> 'SearchEngineController@search'
   ));
Route::get('shoutbox',array(
    'as'=>'shoutbox',
    'uses'=> 'ShoutController@shout'));
Route::post('/ShoutBox-Upload', array(
    'as'=>'shoutboxsubmit',
    'uses'=> 'ShoutController@shoutboxsubmit'
   ));
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
Route::get("/Csrf",'CsrfController@index');
Route::post('Csrf', array(
   "as" => 'csrf',
   'uses' => 'CsrfController@csrf'
));
Route::get('csrfprocess/{message}',array(
    'as'=>'csrfprocess',
    'uses'=>'CsrfController@indexsecond'
));
Route::get('MailList','MailController@index');
Route::post('MailList/Send', array(
   "as" => 'SendMail',
   'uses' => 'MailController@send'
));
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;  


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $banner = App\Banner::all();
    $posts = App\Post::all();
    return view('pages.home', compact('posts','banner'));
});

Route::get('post/{slug}', function($slug){
	$post = App\Post::where('slug', '=', $slug)->firstOrFail();
	return view('pages.post', compact('post'));
});

Route::get('/request-quote',function(){
    return view('pages.request_quote');
});
Route::get('/about_us',[FrontEndController::class,'about']);
Route::get('/contact_us',[FrontEndController::class,'contact']);
Route::post('/send-mail',[FrontEndController::class,'SendMail']);
Route::post('/postRequest',[FrontEndController::class,'RequestQuote']);





Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    
});

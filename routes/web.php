<?php

use Illuminate\Http\Request;

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
    return view('welcome');
});



// HTTP Basic Auth
Route::get('admin', function() {
    return "welcome to admin view, your email: ".Auth::user()->email;

// .htacess
// RewriteCond %{HTTP:Authorization} ^(.+)$
// RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

})->middleware('auth.basic');


Route::get('login', 'SessionController@showLoginForm')->name('login');
Route::post('login', 'SessionController@login')->name('sess.login');
Route::get('logout', 'SessionController@logout')->name('sess.logout');
Route::get('profile', function(Request $request) {
    $id = Auth::user()->id;
    $name = Auth::user()->name;
    $email = Auth::user()->email;
    $isLogin = Auth::check();
    return (string)$isLogin;
    return $request->user();
    return Auth::id();
    return Auth::user();
    return view('sess.profile');
    // return "welcome to admin view, your email: ".Auth::user()->email;    
})->middleware('auth');
Route::resource('session', 'SessionController');

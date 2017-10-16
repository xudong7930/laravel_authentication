<?php

use Illuminate\Http\Request;


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

Route::get('auth', function() {
    // $attempt2 = Auth::guard('admin')->attempt([]); // 指定guard认证
    $attempt = Auth::attempt([
        'email' => 'sbjsw@qq.com',
        'password' => '123123'
        ]); // 认证
    $check = Auth::check(); // 是否已经登录
    // return redirect()->intended('dashboard');
    dump($attempt, $check);
});

Route::get('unauth', function() {
    Auth::logout(); // 退出登录
    return redirect()->route('sess.login');
});

Route::get('user', function() {
    // 无状态登录,不适用cookie和session
    Auth::once(['email'=>'sbjsw@qq.com', 'password'=>'123123']);
    dump(Auth::check());
    return;

    // 使用uid登录
    Auth::loginUsingId(1);
    // Auth::loginUsingId(1, true);
    dump(Auth::check());
    return ;

    // 使用user实例登录
    $user = App\User::first();
    Auth::login($user);
    // Auth::guard('admin')->login($user);
    // Auth::login($user, true);
    dump(Auth::check());
});

Route::get('login', 'SessionController@showLoginForm')->name('sess.login');
Route::post('login', 'SessionController@login')->name('sess.login');
Route::get('logout', 'SessionController@logout')->name('sess.logout');
Route::get('profile', function(Request $request) {
    $id = Auth::user()->id;
    $name = Auth::user()->name;
    $email = Auth::user()->email;
    $isLogin = Auth::check(); // 判断用户是否认证
    return (string)$isLogin;
    return $request->user();
    return Auth::id(); // 查看认证的用户ID
    return Auth::user(); // 查看认证的用户
    return auth()->user();
    return view('sess.profile');
    // return "welcome to admin view, your email: ".Auth::user()->email;    
})->middleware('auth'); // 使用auth中间件进行路由保护, 也可以在控制器中__construct函数中定义使用的中间件和guard
Route::resource('session', 'SessionController');


// helper functions
Route::get('func', function() {
    // abort(400, 'your page not found');
    // abort_if(true, 400, 'your page not found111');
    // $url = action('SessionController@logout');
    // return $url;
    // info("some helpful information.");
    // return now();
    // return today();
    // return database_path();
    return public_path();
});


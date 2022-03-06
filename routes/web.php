<?php
use App\Models\Raccolta;
use App\Models\Contenuto;

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
    $username= Session::get("username");
if (isset($username)) {
    return view("home")->with("username", $username);
}
else {
    return redirect("login");
}

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', 'RegisterController@index')->name('register');

Route::get("/login", function()
{
    $username= Session::get("username");
    if (isset($username)) {
    return redirect("home")->with("username", $username);
    }
    else {
    return view("login");
}
}
)->name('login');


Route::get("/register", function() {
    $username= Session::get("username");
    if (isset($username)) {
    return redirect("home")->with("username", $username);
    }
    else {
        return view("register");
    }
}
);

Route::get("/home", function() {
$username= Session::get("username");
if (isset($username)) {
    return view("home")->with("username", $username);
}
else {
    return redirect("login");
}

}
);


Route::get("/search", function() {
    $username= Session::get("username");
    if (isset($username)) {
        return view("search")->with("username", $username);
    }
    else {
        return redirect("login");
    }

});


Route::get("/logout", function() {
    Session::flush();
    return redirect("login");
}
);







Route::post('/login', 'Auth\LoginController@login');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/checkutente/{user}', 'Auth\RegisterController@checkutente');
Route::get('/loadcollection', 'HomeControl@loadcollection');
Route::get('/loadcover', 'HomeControl@loadcover');
Route::get('/correggicover', 'HomeControl@prova');
Route::post('/loadraccolta', 'HomeControl@loadraccolta');
Route::post('/addcontenuto', 'SearchController@addcontenuto');
Route::get('/collection/{raccolta}', 'CollectionController@viewcollection');
Route::get('/loadcontenuto/{collect}', 'CollectionController@loadcontenuto');
Route::post('/deletecontenuto', 'CollectionController@deletecontenuto');

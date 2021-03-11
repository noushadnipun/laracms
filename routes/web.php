<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/


include 'admin.php';
//include 'frontend.php';
include 'auth.php';

//Artisan
Route::get('/optimize', function () {
    Artisan::call('optimize');
    return 'Configuration cache cleared! <br/>
            Configuration cached successfully! <br/>
            Route cache cleared! <br/>
            Routes cached successfully! <br/>
            Files cached successfully! <br/>';
});

Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return 'Configuration cache cleared! <br/>
            Configuration cached successfully! <br/>';
});




//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






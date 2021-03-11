<?php

Route::group([
     'prefix'=> '/', 
     'namespace'=> 'App\Http\Controllers\Frontend', 
     'as' => 'frontend_',
     //'middleware' => ['auth', 'customer']
], function(){

     Route::get('/', 'HomeController@index')->name('index');
     Route::get('page/{slug}', 'HomeController@page')->name('page');
});



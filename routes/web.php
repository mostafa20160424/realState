<?php


/*
laravel-debugbar this package for debug you project after install 

*/

Route::get('/', 'BuController@welcome');

Route::group(['middleware'=>'admin','prefix'=>'admin'],function(){
    #dataTable to be send first thing because it has the same route for function show in UserController
    Route::get("users/data","UserController@anyData");
    Route::get("contact/data","ContactController@anyData");
    Route::get("bus/data/{id?}",['as'=>'allBus','uses'=>"BuController@anyData"]);
   // Route::get("link",['as'=>name you want give to route,'uses'=>"function"]);
   //as=>route name allow to use it route('allBus') instedof url('bus/data)
   // you can use name replace of "as=>route name" Route::get("bus/data","BuController@anyData")->name("allBus");

    Route::get('/','AdminController@index');
    Route::get('contact','ContactController@index');
    Route::resource('users','UserController');
    Route::resource('bus','BuController',['except'=>['index','show']]);
    Route::get('bus/{id?}','BuController@index');
    //['except'=>[functions]]
    //['only'=>[functions]]
    Route::resource('settings','SettingController');
    Route::get('users/delete/{id}','UserController@delete');
    Route::get('bus/delete/{id}','BuController@delete');
    Route::get('contact/delete/{id}','ContactController@delete');
    Route::post('bus/active/{id}','UserController@set_active_bu')->name('active_bu');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'web'],function(){
    Route::get('showall/{name?}','BuController@showAll');
    Route::any('search','BuController@search');
    Route::get('SingleBullding/{id}','BuController@showSingle');
    Route::get('ajax/bu/info','BuController@getAjaxInfo');
    Route::resource('contact','ContactController');
    Route::group(['middleware'=>'auth'],function(){
        Route::get('user/create/bu','BuController@user_add_bu');
        Route::post('user/create/bu','BuController@user_add_post');
        Route::get('myBullding/unactive','BuController@unactive_bu');
        Route::get('myBullding','BuController@active_bu');
        Route::get('myprofile','UserController@profile');
        Route::patch('myprofile/{id}','UserController@profile_patch');
        Route::get('SingleBullding/edit/{id}','BuController@user_edit_bu');
        Route::patch('SingleBullding/edit/{id}','BuController@user_update_bu')->name('u_bu');
        
    });
    //Method not allowed exception is happend because of enter route does not exist
});
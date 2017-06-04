<?php

Route::group(['middleware' => [], 'namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Index'], function () {
        Route::get('/', 'IndexController@index');
    });
    Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
        Route::get('/', 'ArticleController@index'); #文章
        Route::post('/comment', 'ArticleController@comment'); #发表文章留言
        Route::get('/comment-list/{id}', 'ArticleController@commentList'); #文章留言列表
        Route::get('/detail/{id}', 'ArticleController@detail');
        Route::get('/index_1', 'ArticleController@index_1'); #名人访谈
        Route::get('/index_2', 'ArticleController@index_2'); #摄影列表
        Route::get('/index_3', 'ArticleController@index_3'); #社区生活
        Route::get('/index_3/{id}', 'ArticleController@index_3'); #社区生活
        Route::get('/categorys/{id}', 'ArticleController@categorys'); #区域分类
    });
    Route::group(['prefix' => 'region', 'namespace' => 'Region'], function () {
        Route::get('/', 'RegionController@index'); #区域分类
    });
    Route::group(['prefix' => 'activity', 'namespace' => 'Activity'], function () {
        Route::get('/', 'ActivityController@index');# 活动
        Route::get('/detail/{id}', 'ActivityController@detail');
        Route::post('/store', 'ActivityController@store');

    });
    Route::group(['prefix' => 'register', 'namespace' => 'Register'], function () {
        Route::get('/create', 'RegisterController@create');
        Route::post('/store', 'RegisterController@store');
    });
    Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
        Route::any('/get-wx-user-info', 'UserController@getWxUserInfo');
        Route::post('/store', 'UserController@store');//注册
    });

    Route::group(['prefix' => 'product', 'namespace' => 'Product'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('/detail/{id}', 'ProductController@detail');# 产品宣传页

    });

    Route::group(['prefix' => 'supplier', 'namespace' => 'Supplier'], function () {
        Route::get('/', 'SupplierController@index');
        Route::get('/detail', 'SupplierController@detail');
        Route::any('/follow', 'SupplierController@follow');
        Route::any('/unfollow ', 'SupplierController@unfollow');
    });

    Route::group(['prefix' => 'personal', 'namespace' => 'Personal'], function () {
        Route::get('/', 'PersonalController@index');
        Route::get('/order-list', 'PersonalController@orderList');
        Route::get('/collection-list', 'PersonalController@collectionList');
        Route::get('/attention-list', 'PersonalController@attentionList');
    });
    Route::group(['prefix' => 'apply', 'namespace' => 'Apply'], function () {
        Route::any('/', 'ApplyController@index');
        Route::get('/success', 'ApplyController@success');
    });

    Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
        Route::get('/', 'ArticleController@index');
    });

    Route::get('/about-us', function () {
        return view('about-us');
    });
    Route::get('/unfinished', function () {
        return view('unfinished');
    });
    Route::get('/video', function () {
        return view('video', ['videos' => \App\Models\ProductVideo::all()]);
    });

    Route::get('/mime-video', function () {
        return view('video-for-mime');
    });

    Route::get('/phone', function () {
        return view('phone');
    });

    Route::group(['prefix' => 'test'], function () {
        Route::get('/success', 'TestController@success');
    });
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/export', 'TestController@export');
    Route::get('/test', 'TestController@test');
});

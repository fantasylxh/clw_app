<?php

Route::group(['middleware' => [], 'namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Index'], function () {
        Route::get('/', 'IndexController@index');
        Route::get('/about', 'IndexController@about');
        Route::get('/alert', 'IndexController@alert');
    });
    Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
        Route::get('/', 'ArticleController@index'); #文章
        Route::post('/comment', 'ArticleController@comment'); #发表文章留言
        Route::post('/vote', 'ArticleController@vote'); #投票
        Route::get('/comment-list/{id}', 'ArticleController@commentList'); #文章留言列表
        Route::get('/detail/{id}', 'ArticleController@detail');
        Route::get('/reporter/{id}', 'ArticleController@reporter');//特约记者详情
        Route::get('/personal/{id}', 'ArticleController@personal');//社区名人详情
        Route::get('/index_1', 'ArticleController@index_1'); #名人访谈
        Route::get('/index_2', 'ArticleController@index_2'); #摄影列表
        Route::get('/index_3', 'ArticleController@index_3'); #社区生活
        Route::get('/index_4', 'ArticleController@index_4'); #社区名人
        Route::post('/index_5', 'ArticleController@index_5'); #我的发稿列表
        Route::get('/index_3/{id}', 'ArticleController@index_3'); #社区生活
        Route::get('/categorys/{id}', 'ArticleController@categorys'); #区域分类
        Route::any('/upload', 'ArticleController@upload'); #发稿
        Route::any('/upload-image', 'ArticleController@uploadImage'); #发稿
    });
    Route::group(['prefix' => 'region', 'namespace' => 'Region'], function () {
        Route::get('/', 'RegionController@index'); #区域分类
    });
    Route::group(['prefix' => 'store', 'namespace' => 'Store'], function () {
        Route::get('/', 'StoreController@index'); #门店列表
    });
    Route::group(['prefix' => 'order', 'namespace' => 'Order'], function () {
        Route::post('/store', 'OrderController@store');
        Route::post('/', 'OrderController@index');
        Route::post('/freight', 'OrderController@freight');
        Route::post('/credit', 'OrderController@credit');
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
        Route::post('/credit', 'UserController@credit');//积分查询
        Route::post('/message', 'UserController@message');//我的消息
        Route::post('/letter', 'UserController@letter');//我的私信
        Route::post('/info', 'UserController@info');//基础信息
        Route::post('/address', 'UserController@address');//我的地址
        Route::post('/store-address', 'UserController@storeAddress');//我的私信
        Route::post('/edit-info', 'UserController@editInfo');//修改信息
        Route::post('/login', 'UserController@login');//记者登录
    });

    Route::group(['prefix' => 'product', 'namespace' => 'Product'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('/index1', 'ProductController@index1');
        Route::get('/detail/{id}', 'ProductController@detail');# 产品宣传页

    });

    Route::group(['prefix' => 'personal', 'namespace' => 'Personal'], function () {
        Route::get('/', 'PersonalController@index');
        Route::get('/order-list', 'PersonalController@orderList');
        Route::get('/collection-list', 'PersonalController@collectionList');
        Route::get('/attention-list', 'PersonalController@attentionList');
    });

    Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
        Route::get('/', 'ArticleController@index');
    });

});


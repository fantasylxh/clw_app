<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/activity/store',
        '/article/index_5',
        '/article/comment',
        '/article/upload',
        '/article/upload-image',
        '/article/vote',
        '/user/store',
        '/user/address',
        '/user/credit',
		'/user/friend',
		'/user/reward',
        '/user/message',
        '/user/letter',
        '/user/login',
        '/user/info',
        '/user/store-address',
        '/user/edit-info',
        '/user/get-wx-user-info',
        '/order/store',
        '/order/freight',
        '/order/pay-ok',
        '/order/credit',
        '/order/',
    ];
}

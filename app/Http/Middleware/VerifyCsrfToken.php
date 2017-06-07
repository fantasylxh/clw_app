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
        '/article/comment',
        '/user/store',
        '/user/address',
        '/user/credit',
        '/user/message',
        '/user/letter',
        '/user/info',
        '/user/store-address',
        '/user/edit-info',
        '/user/get-wx-user-info',
        '/order/store',
        '/order/',
    ];
}

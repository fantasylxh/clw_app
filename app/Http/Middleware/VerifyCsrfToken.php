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
        '/user/credit',
        '/user/message',
       '/user/letter',
        '/user/store-address',
        '/user/get-wx-user-info',
        '/order/store',
    ];
}

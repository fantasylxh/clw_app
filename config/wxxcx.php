<?php

return [
	/**
	 * 小程序APPID
	 */
    'appid' => 'wxa0c844c64f3e09ed',
    /**
     * 小程序Secret
     */
    'secret' => '9ab4978fc656bd17dbd21cbda3e40187',
    /**
     * 小程序登录凭证 code 获取 session_key 和 openid 地址，不需要改动
     */
    'code2session_url' => "https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
];

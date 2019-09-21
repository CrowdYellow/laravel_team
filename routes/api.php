<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api'
], function($api) {
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
    ], function($api) {
        # 游客可以访问的接口
        # 用户注册
        $api->get('users', 'UsersController@store')
            ->name('api.users.store');

        # 需要 token 验证的接口
        $api->group(['middleware' => 'api.auth'], function($api) {
            // 当前登录用户信息
            $api->get('user', 'UsersController@me')
                ->name('api.user.show');
        });
    });
});

$api->version('v2', function($api) {
    $api->get('version', function() {
        return response('this is version v2');
    });
});
<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('account-books', 'AccountBookController');
    $router->resource('linkman', 'LinkmanController');
    $router->resource('organizations', 'OrganizationController');
    $router->resource('tags', 'TagController');
    $router->resource('accounts', 'AccountController');
    $router->resource('payment-methods', 'PaymentMethodController');

    $router->resource('auth/cnarea', 'CnareaController');
});

<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/greentest'], function (Router $router) {
    $router->bind('business', function ($id) {
        return app('Modules\Greentest\Repositories\businessRepository')->find($id);
    });
    $router->get('businesses', [
        'as' => 'admin.greentest.business.index',
        'uses' => 'businessController@index',
        'middleware' => 'can:greentest.businesses.index'
    ]);
    $router->get('businesses/create', [
        'as' => 'admin.greentest.business.create',
        'uses' => 'businessController@create',
        'middleware' => 'can:greentest.businesses.create'
    ]);
    $router->post('businesses', [
        'as' => 'admin.greentest.business.store',
        'uses' => 'businessController@store',
        'middleware' => 'can:greentest.businesses.create'
    ]);
    $router->get('businesses/{business}/edit', [
        'as' => 'admin.greentest.business.edit',
        'uses' => 'businessController@edit',
        'middleware' => 'can:greentest.businesses.edit'
    ]);
    $router->put('businesses/{business}', [
        'as' => 'admin.greentest.business.update',
        'uses' => 'businessController@update',
        'middleware' => 'can:greentest.businesses.edit'
    ]);
    $router->delete('businesses/{business}', [
        'as' => 'admin.greentest.business.destroy',
        'uses' => 'businessController@destroy',
        'middleware' => 'can:greentest.businesses.destroy'
    ]);
// append

});

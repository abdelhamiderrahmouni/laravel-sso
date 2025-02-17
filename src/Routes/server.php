<?php

/**
 * Routes which is neccessary for the SSO server.
 */

Route::middleware(config('laravel-sso.routeGroupMiddleware'))
    ->prefix(trim(config('laravel-sso.routePrefix'), ' /'))
    ->group(function (): void {
        Route::post('login', 'AbdelhamidErrahmouni\LaravelSSO\Controllers\ServerController@login');
        Route::post('logout', 'AbdelhamidErrahmouni\LaravelSSO\Controllers\ServerController@logout');
        Route::middleware(config('laravel-sso.routeAttachMiddleware'))
            ->get('attach', 'AbdelhamidErrahmouni\LaravelSSO\Controllers\ServerController@attach');
        Route::get('userInfo', 'AbdelhamidErrahmouni\LaravelSSO\Controllers\ServerController@userInfo');
    });

<?php

namespace AbdelhamidErrahmouni\LaravelSSO\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use AbdelhamidErrahmouni\LaravelSSO\LaravelSSOServer;

class ServerController extends BaseController
{
    /**
     * @param Request $request
     * @param LaravelSSOServer $server
     *
     * @return void
     */
    public function attach(Request $request, LaravelSSOServer $server)
    {
        $request->session()->put('sso_user', auth()->user()->{config('laravel-sso.usernameField')});
        $server->attach(
            $request->get('broker', null),
            $request->get('token', null),
            $request->get('checksum', null)
        );
    }

    /**
     * @param Request $request
     * @param LaravelSSOServer $server
     *
     * @return mixed
     */
    public function login(Request $request, LaravelSSOServer $server)
    {
        return $server->login(
            $request->get(config('laravel-sso.usernameField'), null),
            $request->get('password', null)
        );
    }

    /**
     * @param LaravelSSOServer $server
     *
     * @return string
     */
    public function logout(LaravelSSOServer $server)
    {
        return $server->logout();
    }

    /**
     * @param LaravelSSOServer $server
     *
     * @return string
     */
    public function userInfo(LaravelSSOServer $server)
    {
        return $server->userInfo();
    }
}

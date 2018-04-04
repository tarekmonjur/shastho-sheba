<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\BaseController;
use App\Service\Admin\Auth\AuthenticatesUsers;

class LoginController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | @Author : Tarek Monjur.
    | @Email  : tarekmonjur@gmail.com
    | @copyright : codevelsoft.com
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';


    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest:admin')->except('logout');
    }
}

<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class UserController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Admin Panel User Controller
    |--------------------------------------------------------------------------
    |
    | @Description : Application User Manage
    | @Author : Tarek Monjur.
    | @Email  : tarekmonjur@gmail.com
    |
    */

    public function __construct(){
        parent::__construct();
        $this->middleware('auth:admin');
        $this->middleware('permission')->except('toSlug');
    }


    public function index()
    {
        $data['title'] = "Users View";
        $data['users'] = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.user.index')->with($data);
    }

}

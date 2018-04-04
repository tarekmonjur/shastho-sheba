<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    protected $auth;

    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = base_path('files/');
        $this->middleware(function($request, $next){
            $this->auth = Auth::guard('admin')->user();
            view()->share('auth',$this->auth);

            $url1 = \Request::segment(1);
            $url2 = \Request::segment(2);
            $url = $url1;
            if($url2){
                $url .= '/'.$url2;
            }
            
            view()->share('url',$url);
            view()->share('url1',$url1);
            view()->share('ur2',$url2);
            return $next($request);
        });
    }
}

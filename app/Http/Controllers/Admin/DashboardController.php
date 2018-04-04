<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
     /*
     |--------------------------------------------------------------------------
     | Dashboard Controller
     |--------------------------------------------------------------------------
     |
     | @Author : Tarek Monjur.
     | @Email  : tarekmonjur@gmail.com
     | @copyright : codevelsoft.com
     */

    /**
     * DashboardController constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->middleware('auth:admin');
    }


    public function __invoke()
    {
        $data['title'] = "Admin Dashboard";
        $orders = Order::get();

        $data['total_order'] = $orders->count();
        $data['pending_order'] = $orders->where('order_status', 'pending')->count();
        $data['accepted_order'] = $orders->where('order_status', 'accepted')->count();
        $data['delivered_order'] = $orders->where('order_status', 'delivered')->count();
        $data['completed_order'] = $orders->where('order_status', 'completed')->count();
        $data['cancel_order'] = $orders->where('order_status', 'cancel')->count();
        return view('admin.dashboard')->with($data);
    }


}

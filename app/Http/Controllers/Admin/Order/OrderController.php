<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;

class OrderController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Admin Panel Order Controller
    |--------------------------------------------------------------------------
    |
    | @Description : Application Order Manage
    | @Author : Tarek Monjur.
    | @Email  : tarekmonjur@gmail.com
    |
    */

    public function __construct(){
        parent::__construct();
        $this->middleware('auth:admin');
       $this->middleware('permission')->except('toSlug');
    }


    public function index(Request $request)
    {
        $data['title'] = "Orders View";

        $orders = Order::with('user');

        if(!empty($request->invoice_no)){
            $data['strings']['invoice_no'] = $request->invoice_no;
            $orders->where('invoice_no', 'like', '%'.$request->invoice_no.'%');
        }
        if(!empty($request->from_date)){
            $data['strings']['from_date'] = $request->from_date;
            $orders->where('created_at', '>=', $request->from_date);
        }
        if(!empty($request->to_date)){
            $data['strings']['to_date'] = $request->to_date;
            $orders->where('created_at', '<=', $request->to_date);
        }
        if(!empty($request->status)){
            $data['strings']['status'] = $request->status;
            $orders->where('order_status', $request->status);
        }

        $data['orders'] = $orders->orderBy('id', 'desc')->paginate(20);
        return view('admin.order.index')->with($data);
    }


    public function changeStatus(Request $request)
    {
        try{
            $update = ['order_status'=> $request->status];
            if($request->status == 'completed'){
                $update['payment_status'] = 'completed';
            }else{
                $update['payment_status'] = 'pending';
            }
            Order::where('id', $request->id)->update($update);
            $request->session()->flash('msg_success', 'Order status successfully changed.');
        }catch(Exception $e){
            $request->session()->flash('msg_error', 'Status not changed.');            
        }
        return redirect()->back();
    }


    public function show(Request $request)
    {
        if($request->ajax()){
            $data['view'] = $request->view;
            $data['order'] = Order::with('details')->find($request->id);
            return view('admin.order.invoice')->with($data);
        }
    }


}

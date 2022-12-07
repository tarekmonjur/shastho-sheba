<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Medicine;
use App\Models\Promotion;
use App\Mail\OrderNotificationMail;

use Illuminate\Http\Request;
use LukePOLO\LaraCart\Facades\LaraCart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Site\BaseController;

class DashboardController extends BaseController
{
	 /*
	 |--------------------------------------------------------------------------
	 | Dashboard Controller
	 |--------------------------------------------------------------------------
	 |
	 | @Description : Site Dashboard Controller
	 | @Author : Tarek Monjur.
	 | @Email  : tarekmonjur@gmail.com
	 */

     /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        parent:: __construct();
        $this->middleware('auth:web');
    }


    public function index(Request $request)
    {
        $data['title'] = "Dashboard";

        $orders = Order::with('user')->where('user_id', $this->auth->id);

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

        return view('dashboard.home')->with($data);
    }


    public function promotion()
    {
        $data['title'] = "Promotion";
        $data['promotions'] = Promotion::where('user_id', $this->auth->id)->paginate(20);
        return view('dashboard.promotion')->with($data);
    }


    public function shippingInfo(Request $request)
    {
        if($request->has('shipping')){
            $request->validate([
                'mobile_no' => ['required','min:11','max:11','regex:/^(017|018|016|015|019)[0-9]+$/', 'unique:users,mobile_no'],
                'city' => 'required|string|min:3|max:20',
                'address' => 'required|string|min:3|max:255',
            ]);

            $user = User::find($this->auth->id);
            $user->mobile_no = $request->mobile_no;
            $user->city = $request->city;
            $user->address = $request->address;
            $user->save();
            return redirect('order-place');
        }
        return view('dashboard.shipping_info');
    }


    public function orderPlace(Request $request)
    {
        if(empty($this->auth->city) || empty($this->auth->address) || empty($this->auth->mobile_no)){
            return redirect('shipping');
        }

        $cartItems = LaraCart::getItems();
        $cartTotal = LaraCart::total($formatted = false);
        $invoice_no = $this->genereateInvoiceNumber();

        DB::beginTransaction();
        try{
            $invoice = new Order;
            $invoice->invoice_no = $invoice_no;
            $invoice->user_id = $this->auth->id;
            $invoice->order_city = ($this->auth->city)?$this->auth->city:'Dhaka';
            $invoice->order_area = ($this->auth->address)?$this->auth->address:'Dhaka';
            $invoice->contact_person = ($this->auth->fullname)?$this->auth->fullname: $this->auth->email;
            $invoice->contact_mobile = $this->auth->mobile_no;
            $invoice->prescription_image = '';
            $invoice->order_status = 'pending';
            $invoice->payment_status = 'pending';
            $invoice->total_actual_amount = $cartTotal;
            $invoice->total_discount = 0.00;
            $invoice->total_discount_amount = $cartTotal - $invoice->total_discount;
            $invoice->vat_amount = 0.00;
            $invoice->delivery_fee = $this->settings->delivery_fee;
            $invoice->processing_fee = $this->settings->processing_fee;
            $invoice->total_payable_amount = $invoice->total_discount_amount + $invoice->processing_fee + $invoice->delivery_fee + $invoice->vat_amount;
            $invoice->save();

            $orderDetails = [];
            foreach($cartItems as $cartItem){
                $orderDetails[] = [
                    'order_id' => $invoice->id,
                    'medicine_id' => $cartItem->id,
                    'medicine_name' => $cartItem->name,
                    'medicine_code' => $cartItem->code,
                    'medicine_type' => $cartItem->type,
                    'unit' => $cartItem->unit,
                    'quantity' => $cartItem->qty,
                    'price' => $cartItem->price,
                    'discount' => 0.00,
                    'discount_price' => $cartItem->price,
                    'total_price' => $cartItem->price * $cartItem->qty,
                    'created_at' => date('Y-m-d h:i:s')
                ];
            }

            if(count($orderDetails) > 0){
                OrderDetails::insert($orderDetails);
            }

            DB::commit();

            if(!empty($this->settings->notification_email)){
                Mail::to($this->settings->notification_email)->send(new OrderNotificationMail());
            }

            $request->session()->flash('success', 'Your order successfully placed.');
            LaraCart::destroyCart();

        }catch(\Exception $e){
            DB::rollBack();
            $request->session()->flash('warning', 'Sorry! order not placed.');
        }
        
        return redirect('/dashboard');
    }


    private function genereateInvoiceNumber(){
        $invoice = Order::orderBy('id','desc')->first();
        $invoice_no_length = 12;
        if($invoice) {
            $remove_zero = str_replace(0,'',$invoice->invoice_no);
            $increment_invoice_no = intval($remove_zero) + 1;
            $need_zero = $invoice_no_length - strlen($increment_invoice_no);
            $invoice_no = str_repeat(0,$need_zero).$increment_invoice_no;
        }else{
            $invoice_no =  str_repeat(0,$invoice_no_length-1).'1';
        }
        return $invoice_no;
    }


    public function changeStatus(Request $request)
    {
        try{
            Order::where('id', $request->id)->where('user_id', $this->auth->id)->update(['order_status'=> 'cancel']);
            $request->session()->flash('success', 'Order status successfully changed.');
        }catch(Exception $e){
            $request->session()->flash('warning', 'Order status not changed.');            
        }
        return redirect()->back();
    }


    public function showInvoice(Request $request)
    {
        if($request->ajax()){
            $data['view'] = $request->view;
            $data['order'] = Order::with('details')->find($request->id);
            return view('dashboard.invoice')->with($data);
        }
    }


    public function showUploadPrescription()
    {
        $data['title'] = "Prescription Upload";
        return view('dashboard.upload_prescription')->with($data);
    }


    public function uploadPrescription(Request $request)
    {
        $request->validate([
            'prescription' => 'required|max:4000'
        ]);

        try{
            if($request->hasFile('prescription')){
                $prescriptionPath = 'files/prescriptions/';
                $prescriptionName = pathinfo($request->prescription->getClientOriginalName(), PATHINFO_FILENAME). time() . '.' . $request->prescription->extension();
                $request->prescription->move($prescriptionPath, $prescriptionName);

                $invoice_no = $this->genereateInvoiceNumber();
                $invoice = new Order;
                $invoice->invoice_no = $invoice_no;
                $invoice->user_id = $this->auth->id;
                $invoice->order_city = ($this->auth->city)?$this->auth->city:'Dhaka';
                $invoice->order_area = ($this->auth->address)?$this->auth->address:'Dhaka';
                $invoice->contact_person = ($this->auth->fullname)?$this->auth->fullname: $this->auth->email;
                $invoice->contact_mobile = $this->auth->mobile_no;
                $invoice->prescription_image = $prescriptionName;
                $invoice->order_status = 'pending';
                $invoice->payment_status = 'pending';
                $invoice->total_actual_amount = 0.00;
                $invoice->total_discount = 0.00;
                $invoice->total_discount_amount = 0.00;
                $invoice->vat_amount = 0.00;
                $invoice->delivery_fee = 0.00;
                $invoice->processing_fee = 0.00;
                $invoice->total_payable_amount = 0.00;
                $invoice->save();

                $request->session()->flash('success', 'Prescription successfully uploaded.');
            }
            
            return redirect('/dashboard');
        }catch(\Exception $e){
            $request->session()->flash('warning', 'Prescription not uploaded.');
            return redirect()->back();
        }

        
    }


}

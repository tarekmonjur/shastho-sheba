<?php

namespace App\Http\Controllers\Site;

use App\Models\Setting;
use App\Models\MedicineCategory;
use App\Models\MedicineCompany;

use Illuminate\Support\Facades\Auth;
use LukePOLO\LaraCart\Facades\LaraCart;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $headerMenuData;

    protected $auth;

    public function __construct()
    {
        $this->headerMenuData = $this->getHeaderMenuData();
        $this->settings = $this->settings();

        $this->middleware(function($request, $next){
            $this->auth = Auth::guard()->user();
            view()->share('auth',$this->auth);
            view()->share('customer_served',$this->settings->customer_served);

            view()->share('categories', $this->headerMenuData['categories']);
            view()->share('topCategories', $this->headerMenuData['topCategories']);
            view()->share('featureCategories', $this->headerMenuData['featureCategories']);
            view()->share('companies', $this->headerMenuData['companies']);

            view()->share('cartItems', LaraCart::getItems());
            view()->share('cartTotal', LaraCart::total($formatted = false));
            // dd(LaraCart::total($formatted = false), LaraCart::getItems());
            return $next($request);
        });
    }


    protected function settings(){
        return Setting::first();
    }


    /**
     * get data for header menu
     */
    protected function getHeaderMenuData()
    {
        $data['categories'] = MedicineCategory::with(['childRecursive' => function($q){
            $q->where('category_status','active');
        }])->where('category_status','active')->where('parent_id',0)->get();

        $data['topCategories'] = MedicineCategory::with(['parentRecursive' => function($q){
            $q->where('category_status','active');
        }])->where('category_status','active')->where('is_top','yes')->get();

        $data['featureCategories'] = MedicineCategory::with(['parentRecursive' => function($q){
            $q->where('category_status','active');
        }])->where('category_status','active')->where('is_feature','yes')->get();

        $data['companies'] = MedicineCompany::where('medicine_company_status', 'active')
        ->orderByRaw('RAND()')
        ->limit(13)->get();
        return $data;
    }


    protected function generateReferralCode($id, $first_name, $mobile_no)
    {
        $inputString = str_replace(' ', '-', $first_name);
        $inputString = preg_replace(['/[^A-Za-z0-9\-]/'], '', $inputString);
        $inputStringAry = explode("-", $inputString);
        foreach($inputStringAry as $val){
            if(strlen($val) > 2){
                $inputString = $val;
                break;
            }
        }
        if(empty($inputString)){
            $inputString = "shastho";
        }
        
        $name_prefix = $inputString;
        if(!empty($mobile_no)){
            $row_id_prefix = substr(str_pad($id,3,"0",STR_PAD_LEFT),-3);
            $mobile_prefix = str_shuffle(substr($mobile_no,-3));
        }else{
            $row_id_prefix = substr(str_pad($id,3,"0",STR_PAD_LEFT),-3);
            $mobile_prefix = str_shuffle(substr($row_id_prefix,-3));
        }
        
        $generate_referral_code = "$name_prefix$row_id_prefix$mobile_prefix";
        return $generate_referral_code;
    }



}

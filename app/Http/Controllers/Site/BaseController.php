<?php

namespace App\Http\Controllers\Site;

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
        $this->middleware(function($request, $next){
            $this->auth = Auth::guard()->user();
            view()->share('auth',$this->auth);

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
}

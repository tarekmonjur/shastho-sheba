<?php

namespace App\Http\Controllers\Site;

use App\Models\Slider;
use App\Models\MedicineView;
use App\Models\Medicine;
use App\Models\MedicineCategory;
use App\Models\MedicineCompany;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
     /*
     |--------------------------------------------------------------------------
     | Home Controller
     |--------------------------------------------------------------------------
     |
     | @Description : Site Home Controller
     | @Author : Tarek Monjur.
     | @Email  : tarekmonjur@gmail.com
     */


    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent:: __construct();
    }


    public function index()
    {
        $data['title'] = "Home Page";
        $data['sliders'] = Slider::where('slider_status', 'active')->get();
        return view('site.home')->with($data);
    }


    public function searchProducts(Request $request)
    {
        if($request->ajax())
        {
            $q = $request->q;
            $products = Medicine::with('category.parentRecursive')
                ->where('medicine_name','like','%'.$q.'%');
            $data['total_product'] = $products->count();
            $data['products'] = $products->limit(6)->get();

            $data['q'] = $q;
            $data['id'] = $request->id;

            return view('site.search_product_ajax',$data)->render();

        }else{
            $q = $request->q;

            $data['categorys'] = MedicineCategory::with(['childRecursive' => function($q){
                $q->where('category_status','active');
            }])
            ->where('category_status','active')
            ->where('parent_id',1)
            ->orWhere('parent_id',2)
            ->get();

            $data['products'] = Medicine::select('medicines.*', 'medicine_offers.offer_status', 'medicine_offers.offer_percent')
            ->where('medicine_name', 'like', '%'.$q.'%')
            ->leftJoin('medicine_offer_maps','medicine_offer_maps.offer_id', '=', 'medicines.id')
            ->leftJoin('medicine_offers',function($q){
                $q->on('medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                ->where('offer_status', 'running');
            })->get();
            // dd($data['categories']);
            return view('site.search_product')->with($data);
        }
    }


    public function prescriptions()
    {
        $data['title'] = "Prescriptions";
        $prescriptions = MedicineCategory::with('medicines','parent')
            ->where('parent_id',1)
            ->orderBy('category_name', 'asc')
            ->get();

        $prescriptionsData = [];
        foreach($prescriptions as $prescription){
            $i = strtolower($prescription->category_name[0]);
            $prescriptionsData[$i][] = $prescription;
        }

        $data['prescriptions'] = $prescriptionsData;
        $data['prescriptionAlpha'] = array_keys($prescriptionsData);
        return view('site.prescriptions')->with($data);
    }


    public function prescriptionProduct(Request $request)
    {
        $medicine = Medicine::select('medicines.*', 'medicine_offers.offer_status', 'medicine_offers.offer_percent')
            ->where('medicine_slug', $request->slug)
            ->leftJoin('medicine_offer_maps','medicine_offer_maps.medicine_id', '=', 'medicines.id')
            ->leftJoin('medicine_offers',function($q){
                $q->on('medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                ->where('offer_status', 'running');
            })
            ->first();

        if($medicine)
        {
            $data['title'] = $medicine->medicine_name;
            $data['medicine'] = Medicine::with('company','type')
                ->where('medicine_slug', $request->slug)
                ->first();
            $data['slug'] = $request->segment(1);

            $view_ip = $request->ip();
            $medicineView = MedicineView::where('medicine_id', $medicine->id)
                ->where('view_ip', $view_ip)
                ->first();

            if($medicineView){
                $medicineView->view_count = $medicineView->view_count + 1;
                $medicineView->save();
            }else{
                $medicineView = new MedicineView;
                $medicineView->medicine_id = $medicine->id;
                $medicineView->view_count = 1;
                $medicineView->view_ip = $view_ip;
                $medicineView->save();
            }

            $data['medicine_views'] = MedicineView::select('medicines.*', 'medicine_offers.offer_status', 'medicine_offers.offer_percent')
                ->join('medicines', 'medicines.id', '=', 'medicine_views.medicine_id')
                ->leftJoin('medicine_offer_maps','medicine_offer_maps.medicine_id', '=', 'medicines.id')
                ->leftJoin('medicine_offers',function($q){
                    $q->on('medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                    ->where('offer_status', 'running');
                })
                ->orderByRaw('count(view_count) desc')
                ->groupBy('medicine_views.medicine_id')
                ->limit(10)
                ->get();

            $data['medicine_total_view'] = MedicineView::where('medicine_id', $medicine->id)->count();
            return view('site.product_single')->with($data);
        }

        $data['title'] = "Prescriptions Medicine";
        $category = MedicineCategory::with('medicines')
            ->where('category_slug', $request->slug)
            ->first();

        if(!$category){
            return redirect()->back();
        }

        $data['category'] = $category;
        $medicines = Medicine::where('medicine_category_id', $category->id)
            ->orderBy('medicine_name', 'asc')
            ->get();

        $medicinesData = [];
        foreach($medicines as $medicine){
            $i = strtolower($medicine->medicine_name[0]);
            $medicinesData[$i][] = $medicine;
        }

        $data['medicines'] = $medicinesData;
        $data['medicineAlpha'] = array_keys($medicinesData);
        return view('site.prescription_products')->with($data);
    }


    public function manufacturerList()
    {
        $data['title'] = "Manufacturers Page";
        $manufacturers = MedicineCompany::with('medicines')
            ->where('medicine_company_status', 'active')
            ->orderBy('medicine_company_name', 'asc')
            ->get();

        $manufacturersData = [];
        foreach($manufacturers as $manufacturer){
            $i = strtolower($manufacturer->medicine_company_name[0]);
            $manufacturersData[$i][] = $manufacturer;
        }

        $data['manufacturers'] = $manufacturersData;
        $data['manufacturersAlpha'] = array_keys($manufacturersData);
        return view('site.manufacturers')->with($data);
    }


    public function manufacturerProduct(Request $request)
    {
        $data['title'] = "Manufacturers Medicine";
        $manufacturer = MedicineCompany::with('medicines')
            ->where('medicine_company_status', 'active')
            ->where('medicine_company_slug', $request->medicine_company_slug)
            ->first();

        if(!$manufacturer){
            return redirect()->back();
        }
        $data['manufacturer'] = $manufacturer;

        $medicinesData = [];
        foreach($manufacturer->medicines as $medicine){
            $i = strtolower($medicine->medicine_name[0]);
            $medicinesData[$i][] = $medicine;
        }

        $data['medicines'] = $medicinesData;
        $data['medicineAlpha'] = array_keys($medicinesData);
        return view('site.manufacturer_products')->with($data);
    }


    public function nonPrescriptions()
    {
        $data['title'] = "Non-Prescriptions Medicine";
        $data['nonPrescriptionCategories'] = MedicineCategory::where('parent_id',2)->get();

        $data['bestSallers'] = Medicine::select('medicines.*')
            ->join('order_details', 'order_details.medicine_id', '=', 'medicines.id')
            ->orderByRaw("count(order_details.medicine_id) desc")
            ->groupBy('order_details.medicine_id')
            ->limit(10)
            ->get();

        if(count($data['bestSallers']) <= 0){
            $data['bestSallers'] = Medicine::orderByRaw("RAND('id')")->limit(10)->get();
        }

        $data['bestDeals'] = Medicine::where('offer_highlight', 'yes')
            ->where('offer_status', 'running')
            ->join('medicine_offer_maps', 'medicine_offer_maps.medicine_id', '=', 'medicines.id')
            ->join('medicine_offers', 'medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
            ->orderByRaw("RAND()")
            ->limit(10)
            ->get();

        if(count($data['bestDeals']) <= 0){
            $data['bestDeals'] = Medicine::orderByRaw("RAND()")->limit(10)->get();
        }

        $data['recommends'] = Medicine::where('offer_highlight', 'no')
            ->where('offer_status', 'running')
            ->join('medicine_offer_maps', 'medicine_offer_maps.medicine_id', '=', 'medicines.id')
            ->join('medicine_offers', 'medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
            ->orderByRaw("RAND()")
            ->limit(4)
            ->get();

        if(count($data['recommends']) <= 0){
            $data['recommends'] = Medicine::where('offer_highlight', 'yes')
            ->where('offer_status', 'running')
            ->join('medicine_offer_maps', 'medicine_offer_maps.medicine_id', '=', 'medicines.id')
            ->join('medicine_offers', 'medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
            ->orderByRaw("RAND()")
            ->limit(4)
            ->get();
        }

        return view('site.non_prescriptions')->with($data);
    }


    public function nonPrescriptionProduct(Request $request)
    {
        $slug = $request->slug;
        $medicine = Medicine::select('medicines.*', 'medicine_offers.offer_status', 'medicine_offers.offer_percent')
            ->where('medicine_slug', $request->slug)
            ->leftJoin('medicine_offer_maps','medicine_offer_maps.medicine_id', '=', 'medicines.id')
            ->leftJoin('medicine_offers',function($q){
                $q->on('medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                ->where('offer_status', 'running');
            })
            ->first();

        if($medicine)
        {
            $data['title'] = $medicine->medicine_name;
            $data['medicine'] = $medicine;
            $data['slug'] = $request->segment(1);

            $view_ip = $request->ip();
            $medicineView = MedicineView::where('medicine_id', $medicine->id)
                ->where('view_ip', $view_ip)
                ->first();

            if($medicineView){
                $medicineView->view_count = $medicineView->view_count + 1;
                $medicineView->save();
            }else{
                $medicineView = new MedicineView;
                $medicineView->medicine_id = $medicine->id;
                $medicineView->view_count = 1;
                $medicineView->view_ip = $view_ip;
                $medicineView->save();
            }

            $data['medicine_views'] = MedicineView::select('medicines.*', 'medicine_offers.offer_status', 'medicine_offers.offer_percent')
                ->join('medicines', 'medicines.id', '=', 'medicine_views.medicine_id')
                ->leftJoin('medicine_offer_maps','medicine_offer_maps.medicine_id', '=', 'medicines.id')
                ->leftJoin('medicine_offers',function($q){
                    $q->on('medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                    ->where('offer_status', 'running');
                })
                ->orderByRaw('count(view_count) desc')
                ->groupBy('medicine_views.medicine_id')
                ->limit(10)
                ->get();

            $data['medicine_total_view'] = MedicineView::where('medicine_id', $medicine->id)->count();
            return view('site.product_single')->with($data);
        }

        $category = MedicineCategory::with('childRecursive')->where('category_slug', $slug)->first();

        if(!$category)
        {
            return redirect()->back();
        }

        // dd($category);

        if(count($category->childRecursive)<=0)
        {
            $data['title'] = "Non-Prescriptions Medicine";
            $data['slug'] = $slug;
            $data['category'] = $category;

            $data['products'] = Medicine::select('medicines.*', 'medicine_offers.offer_status', 'medicine_offers.offer_percent')
            ->where('medicine_category_id', $category->id)
            ->leftJoin('medicine_offer_maps','medicine_offer_maps.medicine_id', '=', 'medicines.id')
            ->leftJoin('medicine_offers',function($q){
                $q->on('medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                ->where('offer_status', 'running');
            })
            ->get();

            $data['companies'] = $this->getNonPrescriptionCompany();
            return view('site.products')->with($data);
        }else {
            $data['title'] = "Non-Prescriptions Medicine";
            $data['nonPrescriptionCategory'] = $category;

            $data['bestSallers'] = Medicine::select('medicines.*')
            ->join('order_details', 'order_details.medicine_id', '=', 'medicines.id')
            ->orderByRaw("count(order_details.medicine_id) desc")
            ->groupBy('order_details.medicine_id')
            ->limit(10)
            ->get();

            if(count($data['bestSallers']) <= 0){
                $data['bestSallers'] = Medicine::orderByRaw("RAND('id')")->limit(10)->get();
            }

            $data['bestDeals'] = Medicine::where('offer_highlight', 'yes')
                ->where('offer_status', 'running')
                ->join('medicine_offer_maps', 'medicine_offer_maps.medicine_id', '=', 'medicines.id')
                ->join('medicine_offers', 'medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                ->orderByRaw("RAND()")
                ->limit(10)
                ->get();

            if(count($data['bestDeals']) <= 0){
                $data['bestDeals'] = Medicine::orderByRaw("RAND()")->limit(10)->get();
            }

            $data['recommends'] = Medicine::where('offer_highlight', 'no')
                ->where('offer_status', 'running')
                ->join('medicine_offer_maps', 'medicine_offer_maps.medicine_id', '=', 'medicines.id')
                ->join('medicine_offers', 'medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                ->orderByRaw("RAND()")
                ->limit(4)
                ->get();

            if(count($data['recommends']) <= 0){
                $data['recommends'] = Medicine::where('offer_highlight', 'yes')
                ->where('offer_status', 'running')
                ->join('medicine_offer_maps', 'medicine_offer_maps.medicine_id', '=', 'medicines.id')
                ->join('medicine_offers', 'medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                ->orderByRaw("RAND()")
                ->limit(4)
                ->get();
            }
            return view('site.non_prescription_category')->with($data);
        }
    }


    public function nonPrescriptionProducts(Request $request)
    {
        $slug = $request->slug;
        $slug2 = $request->slug2;
        $category = MedicineCategory::with('childRecursive')->where('category_slug', $slug2)->first();
        if(!$category){
            return redirect()->back();
        }

        $data['title'] = "Non-Prescriptions Medicine";
        $data['slug'] = $slug;
        $data['slug2'] = $slug2;
        $data['category'] = $category;
        $data['products'] = Medicine::where('medicine_category_id', $category->id)
            ->leftJoin('medicine_offer_maps','medicine_offer_maps.offer_id', '=', 'medicines.id')
            ->leftJoin('medicine_offers',function($q){
                $q->on('medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                ->where('offer_status', 'running');
            })->get();
            // dd($data['products']);
        $data['companies'] = $this->getNonPrescriptionCompany();
        return view('site.products')->with($data);
    }


    public function nonPrescriptionManufacturerProduct(Request $request)
    {
        $data['title'] = $request->medicine_company_slug;
        $data['slug'] = $request->medicine_company_slug;
        $data['products'] = Medicine::where('medicine_company_slug', $request->medicine_company_slug)
            ->join('medicine_companies', 'medicine_companies.id', '=', 'medicines.medicine_manufacturer_id')
            ->leftJoin('medicine_offer_maps','medicine_offer_maps.offer_id', '=', 'medicines.id')
            ->leftJoin('medicine_offers',function($q){
                $q->on('medicine_offers.id', '=', 'medicine_offer_maps.offer_id')
                ->where('offer_status', 'running');
            })->get();

        return view('site.products')->with($data);
    }


    public function offers()
    {
        $data['title'] = "offers";
        return view('site.offers')->with($data);
    }


    public function aboutUs()
    {
        $data['title'] = "About us Page";
        return view('site.about')->with($data);
    }


    public function faqs()
    {
        $data['title'] = "faqs page";
        return view('site.faqs')->with($data);
    }


    public function termsConditions()
    {
        $data['title'] = "terms & conditions";
        return view('site.terms_and_conditions')->with($data);
    }

    private function toUrl($slugs)
    {
        $url = '';
        foreach($slugs as $slug){
            $url = $url.'/'.$slug;
        }
        return url($url);
    }


    private function getNonPrescriptionCompany()
    {
        $cats = MedicineCategory::with(['childRecursive' => function($q){
                $q->where('category_status','active');
            }])->where('category_status','active')->where('parent_id',2)->get();

        $category_ids = [];
        foreach($cats as $cat){
            $category_ids[] = $cat->id;
            foreach($cat->childRecursive as $info){
                $category_ids[] = $cat->id;
            }
        }
        
        $companies = MedicineCompany::whereIn('medicines.medicine_category_id', $category_ids)
        ->join('medicines', 'medicines.medicine_manufacturer_id', '=', 'medicine_companies.id')
        ->get();
        return $companies;
    }


}

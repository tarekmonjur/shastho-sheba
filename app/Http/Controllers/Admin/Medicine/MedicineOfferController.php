<?php

namespace App\Http\Controllers\Admin\Medicine;

use App\Models\Medicine;
use App\Models\MedicineOffer;
use App\Http\Requests\MedicineOfferRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Admin\BaseController;

class MedicineOfferController extends BaseController
{
    /*
     |--------------------------------------------------------------------------
     | Medicine Offers Controller
     |--------------------------------------------------------------------------
     |
     | @Description : Application Medicine Offers Manage
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
        $data['title'] = "Offers View";
        $data['offers'] = MedicineOffer::with('medicines.medicine')->paginate(20);
        // dd($data['offers']);
        return view('admin.offer.index')->with($data);
    }


    public function create()
    {
        $data['title'] = "Offers Add";
        $data['medicines'] = Medicine::get();
        return view('admin.offer.add')->with($data);
    }


    public function store(MedicineOfferRequest $request)
    {
        try {
            $offer = new MedicineOffer();
            $offer->offer_name = $request->offer_name;
            $offer->offer_percent = $request->offer_percent;
            $offer->offer_start = $request->offer_start_date;
            $offer->offer_end = $request->offer_end_date;
            $offer->offer_highlight = $request->offer_highlight;
            $offer->offer_status = $request->offer_status;
            $offer->save();
            $medicines = $request->medicine_name;
            if(is_array($medicines)){
            	$medicine_offers = [];
            	foreach($medicines as $medicine){
            		$medicine_offers[] = [
            			'offer_id' => $offer->id,
            			'medicine_id' => $medicine,
            		];
            	}
            	if(count($medicine_offers) > 0)
            		\DB::table('medicine_offer_maps')->insert($medicine_offers);
            }

            $request->session()->flash('msg_success', 'Offer successfully added.');
            Log::info($this->auth->fullname . " add Offer", ['offer_id' => $offer->id, 'auth_id' => $this->auth->id]);
        }catch(Exception $e){
            $request->session()->flash('msg_error', 'Offer not add.');
            Log::error($this->auth->fullname ."try add Offer. not success.");
        }
        return redirect()->back();

    }


    public function edit($id)
    {
        $data['title'] = "Edit Offer";
        $data['medicines'] = Medicine::get();
        $data['offer'] = MedicineOffer::with('medicines')->find($id);
        $data['offer_medicines'] = $data['offer']->medicines->pluck('medicine_id')->toArray();
        // dd($data['offer']->medicines->pluck('medicine_id')->toArray());
        return view('admin.offer.edit')->with($data);
    }


    public function update(MedicineOfferRequest $request)
    {
        try {
            $offer = MedicineOffer::find($request->id);
            $offer->offer_name = $request->offer_name;
            $offer->offer_percent = $request->offer_percent;
            $offer->offer_start = $request->offer_start_date;
            $offer->offer_end = $request->offer_end_date;
            $offer->offer_highlight = $request->offer_highlight;
            $offer->offer_status = $request->offer_status;
            $offer->save();

            $medicines = $request->medicine_name;
            \DB::table('medicine_offer_maps')->where('offer_id', $request->id)->delete();
            if(is_array($medicines)){
            	$medicine_offers = [];
            	foreach($medicines as $medicine){
            		$medicine_offers[] = [
            			'offer_id' => $offer->id,
            			'medicine_id' => $medicine,
            		];
            	}
            	if(count($medicine_offers) > 0)
            		\DB::table('medicine_offer_maps')->insert($medicine_offers);
            }

            $request->session()->flash('msg_success', 'Offer successfully updated.');
            Log::info($this->auth->fullname . " updated Offer", ['offer_id' => $offer->id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            $request->session()->flash('msg_error', 'Offer not updated.');
            Log::error($this->auth->fullname ."try updated Offer. not success.");
        }
        return redirect()->back();
    }


    public function delete($id){
        try{
            MedicineOffer::find($id)->delete();
            session()->flash('msg_success', 'Offer successfully deleted.');
            Log::info($this->auth->fullname . " deleted Medicine Offer", ['offer_id' => $id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            session()->flash('msg_error', 'Offer not deleted.');
            Log::error($this->auth->fullname ."try deleted Offer. not success.");
        }
        return redirect()->back();
    }

}

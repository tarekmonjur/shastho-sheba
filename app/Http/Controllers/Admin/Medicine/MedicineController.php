<?php

namespace App\Http\Controllers\Admin\Medicine;

use App\Http\Requests\MedicineRequest;
use App\Models\Medicine;
use App\Models\MedicineCategory;
use App\Models\MedicineCompany;
use App\Models\MedicineGeneric;
use App\Models\MedicineType;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class MedicineController extends BaseController
{
    /*
     |--------------------------------------------------------------------------
     | Medicine Controller
     |--------------------------------------------------------------------------
     |
     | @Description : Application Medicines Manage
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
        $data['title'] = "Medicine View";

        $medicines = Medicine::with('type','category','generic','company');
        if(!empty($request->name_code)){
            $data['strings']['name_code'] = $request->name_code;
            $medicines->where('medicine_code', 'like', '%'.$request->name_code.'%')
            ->orWhere('medicine_name',  'like', '%'.$request->name_code.'%');
        }
        if(!empty($request->price)){
            $data['strings']['price'] = $request->price;
            $medicines->where('medicine_price', 'like', '%'.$request->price.'%');
        }
        if(!empty($request->power)){
            $data['strings']['power'] = $request->power;
            $medicines->where('medicine_power', 'like', '%'.$request->power.'%');
        }
        $data['medicines'] = $medicines->paginate(20);
        return view('admin.medicine.index')->with($data);
    }


    public function create()
    {
        $data['title'] = "Category Create";
        $data['medicineTypes'] = MedicineType::orderBy('id', 'desc')->get();
        $data['medicineCategories'] = MedicineCategory::with('childRecursive')->where('parent_id', 0)->get();
        $data['medicineGenerics'] = MedicineGeneric::orderBy('id', 'desc')->get();
        $data['medicineCompanies'] = MedicineCompany::orderBy('id', 'desc')->get();
        $medicine = Medicine::orderBy('id','desc')->first();
        $data['next_medicine_code'] = Medicine::generateNextMedicineCode($medicine->medicine_code);
        return view('admin.medicine.add')->with($data);
    }


    public function store(Request $request)
    {
        try {
            $medicine = new Medicine();
            $medicine->medicine_code = $request->medicine_code;
            $medicine->medicine_name = $request->medicine_name;
            $medicine->medicine_slug = $request->medicine_slug;
            $medicine->medicine_stock = $request->medicine_stock;
            $medicine->medicine_type_id = $request->medicine_type;
            $medicine->medicine_category_id = $request->medicine_category;
            $medicine->medicine_manufacturer_id = $request->medicine_manufacturer;
            $medicine->medicine_generic_id = $request->medicine_generic;
            $medicine->medicine_price = $request->medicine_price;
            $medicine->medicine_unit_per_box = $request->medicine_unit_per_box;
            $medicine->medicine_unit_per_strip = $request->medicine_unit_per_strip;
            $medicine->medicine_power = $request->medicine_power;
            $medicine->medicine_manufacture_date = $request->medicine_manufacture_date;
            $medicine->medicine_expiry_date = $request->medicine_expiry_date;
            $medicine->medicine_is_new = $request->medicine_is_new;
            $medicine->medicine_is_active = $request->medicine_is_active;
            $medicine->medicine_side_effect = $request->medicine_side_effect;
            $medicine->medicine_description = $request->medicine_description;
            $medicine->medicine_cashback = $request->medicine_cashback;
            $medicine->medicine_note = $request->medicine_note;

            if ($request->hasFile('medicine_image')) {
                $photoPath = $this->uploadPath.'medicine/';
                $photoName = $medicine->medicine_slug . '.' . $request->medicine_image->extension();

                $photo = Image::make($request->medicine_image);
                $large = $medium = $small = $photo;
                $photo->save($photoPath . $photoName); //original
                $large->resize(480, 360)->save($photoPath . 'large/' . $photoName); //large
                $medium->resize(240, 180)->save($photoPath . 'medium/' . $photoName); // medium
                $small->resize(120, 90)->save($photoPath . 'small/' . $photoName); //small
                $medicine->medicine_image = $photoName;
            }
            $medicine->save();

            $request->session()->flash('msg_success', 'Medicine successfully added.');
            Log::info($this->auth->fullname . " add Medicine", ['medicine_id' => $medicine->id, 'auth_id' => $this->auth->id]);
        }catch(Exception $e){
            $request->session()->flash('msg_error', 'Medicine not add.');
            Log::error($this->auth->fullname ."try add Medicine. not success.");
        }
        return redirect()->back();

    }


    public function edit($id)
    {
        $data['title'] = "Edit Medicine";
        $data['medicineTypes'] = MedicineType::orderBy('id', 'desc')->get();
        $data['medicineCategories'] = MedicineCategory::with('childRecursive')->where('parent_id', 0)->get();
        $data['medicineGenerics'] = MedicineGeneric::orderBy('id', 'desc')->get();
        $data['medicineCompanies'] = MedicineCompany::orderBy('id', 'desc')->get();
        $data['medicine'] = Medicine::with('type', 'category', 'generic', 'company')->find($id);
        return view('admin.medicine.edit')->with($data);
    }


    public function update(Request $request)
    {
        try {
            $medicine = Medicine::find($request->id);
            $medicine->medicine_code = $request->medicine_code;
            $medicine->medicine_name = $request->medicine_name;
            $medicine->medicine_slug = $request->medicine_slug;
            $medicine->medicine_stock = $request->medicine_stock;
            $medicine->medicine_type_id = $request->medicine_type;
            $medicine->medicine_category_id = $request->medicine_category;
            $medicine->medicine_manufacturer_id = $request->medicine_manufacturer;
            $medicine->medicine_generic_id = $request->medicine_generic;
            $medicine->medicine_price = $request->medicine_price;
            $medicine->medicine_unit_per_box = $request->medicine_unit_per_box;
            $medicine->medicine_unit_per_strip = $request->medicine_unit_per_strip;
            $medicine->medicine_power = $request->medicine_power;
            $medicine->medicine_manufacture_date = $request->medicine_manufacture_date;
            $medicine->medicine_expiry_date = $request->medicine_expiry_date;
            $medicine->medicine_is_new = $request->medicine_is_new;
            $medicine->medicine_is_active = $request->medicine_is_active;
            $medicine->medicine_side_effect = $request->medicine_side_effect;
            $medicine->medicine_description = $request->medicine_description;
            $medicine->medicine_cashback = $request->medicine_cashback;
            $medicine->medicine_note = $request->medicine_note;

            if ($request->hasFile('medicine_image')) {
                $photoPath = $this->uploadPath.'medicine/';
                $photoName = $medicine->medicine_slug . '.' . $request->medicine_image->extension();

                if($medicine->medicine_image && !empty($medicine->medicine_image)){
                    if(file_exists($photoPath.$medicine->medicine_image)) {
                        @unlink($photoPath . $medicine->medicine_image);
                    }
                    if(file_exists($photoPath.'large/'.$medicine->medicine_image)) {
                        @unlink($photoPath.'large/'.$medicine->medicine_image);
                    }
                    if(file_exists($photoPath.'medium/'.$medicine->medicine_image)) {
                        @unlink($photoPath.'medium/'.$medicine->medicine_image);
                    }
                    if(file_exists($photoPath.'small/'.$medicine->medicine_image)) {
                        @unlink($photoPath.'small/'.$medicine->medicine_image);
                    }
                }

                $photo = Image::make($request->medicine_image);
                $large = $medium = $small = $photo;
                $photo->save($photoPath . $photoName); //original
                $large->resize(480, 360)->save($photoPath . 'large/' . $photoName); //large
                $medium->resize(240, 180)->save($photoPath . 'medium/' . $photoName); // medium
                $small->resize(120, 90)->save($photoPath . 'small/' . $photoName); //small
                
                $medicine->medicine_image = $photoName;
            }
            $medicine->save();

            $request->session()->flash('msg_success', 'Medicine successfully updated.');
            Log::info($this->auth->fullname . " updated medicine", ['medicine_id' => $medicine->id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            $request->session()->flash('msg_error', 'Medicine not updated.');
            Log::error($this->auth->fullname ."try updated medicine. not success.");
        }
        return redirect()->back();
    }


    public function delete($id){
        try{
            Medicine::find($id)->delete();
            session()->flash('msg_success', 'Medicine Category successfully deleted.');
            Log::info($this->auth->fullname . " deleted Medicine Category", ['medicine_id' => $id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            session()->flash('msg_error', 'Medicine Category not deleted.');
            Log::error($this->auth->fullname ."try deleted Medicine Category. not success.");
        }
        return redirect()->back();
    }


}

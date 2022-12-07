<?php

namespace App\Http\Controllers\Admin\Medicine;

use App\Http\Requests\MedicineCategoryRequest;

use App\Models\MedicineCategory;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class MedicineCategoryController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | MedicineCategories Controller
    |--------------------------------------------------------------------------
    |
    | @Description : Application Medicine Category Manage
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
        $data['title'] = "Category View";
        $data['categories'] = MedicineCategory::with('childRecursive')->where('parent_id', 0)->get();
        return view('admin.category.index')->with($data);
    }


    public function create()
    {
        $data['title'] = "Category Create";
        $data['categories'] = MedicineCategory::with('childRecursive')->where('parent_id', 0)->get();
        return view('admin.category.create')->with($data);
    }


    public function store(MedicineCategoryRequest $request)
    {
        try {
            $category = new MedicineCategory();
            $category->parent_id = $request->medicine_category_type;
            $category->category_name = $request->medicine_category_name;
            $category->category_slug = $request->medicine_category_slug;
            $category->category_status = $request->category_status;
            $category->is_feature = $request->is_feature;
            $category->is_top = $request->is_top;

            $photoPath = $this->uploadPath.'category/';
            $photoName = $category->category_slug.'.jpeg';
            $category->category_image = $photoName;

            if ($request->hasFile('category_image_box')) {
                $photo = Image::make($request->category_image_box);
                $photo->resize(200, 200)->save($photoPath . '200/' . $photoName);
            }
            if ($request->hasFile('category_image_top_banner')) {
                $photo = Image::make($request->category_image_top_banner);
                $photo->resize(1920, 350)->save($photoPath . '1920/' . $photoName);
            }
            if ($request->hasFile('category_image_banner')) {
                $photo = Image::make($request->category_image_banner);
                $photo->resize(745, 135)->save($photoPath . '745/' . $photoName);
            }
            $category->save();

            $request->session()->flash('msg_success', 'Medicine Category successfully created.');
            Log::info($this->auth->fullname . " create Medicine Category", ['category_id' => $category->id, 'auth_id' => $this->auth->id]);
        }catch(Exception $e){
            $request->session()->flash('msg_error', 'Medicine Category not created.');
            Log::error($this->auth->fullname ."try create Medicine Category. not success.");
        }
        return redirect()->back();

    }


    public function edit($id)
    {
        $data['title'] = "Category edit";
        $data['category'] = MedicineCategory::find($id);
        $data['categories'] = MedicineCategory::with('childRecursive')->where('parent_id', 0)->get();
        return view('admin.category.edit')->with($data);
    }


    public function update(MedicineCategoryRequest $request)
    {
        try {
            $category = MedicineCategory::find($request->id);
            if($request->id == $request->medicine_category_type){
                $category->parent_id = 0;
            }else{
                $category->parent_id = $request->medicine_category_type;
            }
            $category->category_name = $request->medicine_category_name;
            $category->category_slug = $request->medicine_category_slug;
            $category->category_status = $request->category_status;
            $category->is_feature = $request->is_feature;
            $category->is_top = $request->is_top;

            $photoPath = $this->uploadPath.'category/';
            $photoName = $category->category_slug.'.jpeg';

            if ($request->hasFile('category_image_box')) {
                if(file_exists($photoPath.'200/'.$category->category_image)) {
                    @unlink($photoPath.'200/'.$category->category_image);
                }
                $photo = Image::make($request->category_image_box);
                $photo->resize(200, 200)->save($photoPath . '200/' . $photoName);
                $category->category_image = $photoName;
            }
            if ($request->hasFile('category_image_top_banner')) {
                if(file_exists($photoPath.'1920/'.$category->category_image)) {
                    @unlink($photoPath.'1920/'.$category->category_image);
                }
                $photo = Image::make($request->category_image_top_banner);
                $photo->resize(1920, 350)->save($photoPath . '1920/' . $photoName);
                $category->category_image = $photoName;
            }
            if ($request->hasFile('category_image_banner')) {
                if(file_exists($photoPath.'745/'.$category->category_image)) {
                    @unlink($photoPath.'745/'.$category->category_image);
                }
                $photo = Image::make($request->category_image_banner);
                $photo->resize(745, 135)->save($photoPath . '745/' . $photoName);
                $category->category_image = $photoName;
            }

            $category->save();

            $request->session()->flash('msg_success', 'Medicine Category successfully updated.');
            Log::info($this->auth->fullname . " updated medicine Category", ['category_id' => $category->id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            $request->session()->flash('msg_error', 'Medicine Category not updated.');
            Log::error($this->auth->fullname ."try updated medicine Category. not success.");
        }
        return redirect()->back();
    }


    public function delete($id){
        try{
            MedicineCategory::find($id)->delete();
            session()->flash('msg_success', 'Medicine Category successfully deleted.');
            Log::info($this->auth->fullname . " deleted Medicine Category", ['category_id' => $id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            session()->flash('msg_error', 'Medicine Category not deleted.');
            Log::error($this->auth->fullname ."try deleted Medicine Category. not success.");
        }
        return redirect()->back();
    }


}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Admin\BaseController;

class SliderController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Slider Controller
    |--------------------------------------------------------------------------
    |
    | @Description : Application Slide Manage
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
        $data['title'] = "Slider View";
        $data['sliders'] = Slider::get();
        return view('admin.slider.index')->with($data);
    }


    public function create()
    {
        $data['title'] = "Slider Add";
        return view('admin.slider.add')->with($data);
    }


    public function store(Request $request)
    {
    	$request->validate([
    		// 'slider_url' => 'required',
    		'slider_image' => 'required|mimes:jpeg,jpg,png,gif|max:4000',
    	]);

        try {
            $slider = new Slider();
            $slider->slider_title = $request->slider_title;
            $slider->slider_description = $request->slider_description;
            $slider->slider_url = $request->slider_url;
            $slider->slider_status = $request->slider_status;

            if ($request->hasFile('slider_image')) {
                $photoPath = $this->uploadPath.'slider/';
                $photoName = $request->slider_image->getClientOriginalName();

                $photo = Image::make($request->slider_image);
                $large = $medium = $small = $photo;
                $photo->save($photoPath . $photoName); //original
                $large->resize(480, 360)->save($photoPath . 'large/' . $photoName); //large
                $medium->resize(240, 180)->save($photoPath . 'medium/' . $photoName); // medium
                $small->resize(120, 90)->save($photoPath . 'small/' . $photoName); //small
                $slider->slider_image = $photoName;
            }
			$slider->save();

            $request->session()->flash('msg_success', 'Slider successfully created.');
            Log::info($this->auth->fullname . " create Slider", ['slider_id' => $slider->id, 'auth_id' => $this->auth->id]);
        }catch(Exception $e){
            $request->session()->flash('msg_error', 'Slider not created.');
            Log::error($this->auth->fullname ."try create Slider. not success.");
        }
        return redirect()->back();

    }


    public function edit($id)
    {
        $data['title'] = "Slider edit";
        $data['slider'] = Slider::find($id);
        return view('admin.slider.edit')->with($data);
    }


    public function update(Request $request)
    {
    	$request->validate([
    		// 'slider_url' => 'required',
    		'slider_image' => 'nullable|mimes:jpeg,jpg,png,gif|max:4000',
    	]);

        try {
            $slider = Slider::find($request->id);
            $slider->slider_title = $request->slider_title;
            $slider->slider_description = $request->slider_description;
            $slider->slider_url = $request->slider_url;
            $slider->slider_status = $request->slider_status;

            if ($request->hasFile('slider_image')) {
                $photoPath = $this->uploadPath.'slider/';
                $photoName = $request->slider_image->getClientOriginalName();

                if($slider->slider_image && !empty($slider->slider_image)){
                    if(file_exists($photoPath.$slider->slider_image)) {
                        @unlink($photoPath . $slider->slider_image);
                    }
                    if(file_exists($photoPath.'large/'.$slider->slider_image)) {
                        @unlink($photoPath.'large/'.$slider->slider_image);
                    }
                    if(file_exists($photoPath.'medium/'.$slider->slider_image)) {
                        @unlink($photoPath.'medium/'.$slider->slider_image);
                    }
                    if(file_exists($photoPath.'small/'.$slider->slider_image)) {
                        @unlink($photoPath.'small/'.$slider->slider_image);
                    }
                }

                $photo = Image::make($request->slider_image);
                $large = $medium = $small = $photo;
                $photo->save($photoPath . $photoName); //original
                $large->resize(480, 360)->save($photoPath . 'large/' . $photoName); //large
                $medium->resize(240, 180)->save($photoPath . 'medium/' . $photoName); // medium
                $small->resize(120, 90)->save($photoPath . 'small/' . $photoName); //small
                $slider->slider_image = $photoName;
            }
			$slider->save();

            $request->session()->flash('msg_success', 'Slider successfully updated.');
            Log::info($this->auth->fullname . " updated Slider", ['slider_id' => $slider->id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            $request->session()->flash('msg_error', 'Slider not updated.');
            Log::error($this->auth->fullname ."try updated Slider. not success.");
        }
        return redirect()->back();
    }


    public function delete($id){
        try{
            Slider::find($id)->delete();
            session()->flash('msg_success', 'Slider successfully deleted.');
            Log::info($this->auth->fullname . " deleted Slider", ['slider_id' => $id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            session()->flash('msg_error', 'Slider not deleted.');
            Log::error($this->auth->fullname ."try deleted Slider. not success.");
        }
        return redirect()->back();
    }

}

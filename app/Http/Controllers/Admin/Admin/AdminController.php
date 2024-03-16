<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\RolePermission;

use Mockery\Exception;
use Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Admin\BaseController;

class AdminController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Admin Controller
    |--------------------------------------------------------------------------
    |
    | @Description : Application Admin Manage
    | @Author : Tarek Monjur.
    | @Email  : tarekmonjur@gmail.com
    |
    */

    public function __construct(){
        parent::__construct();
        $this->middleware('auth:admin');
        $this->middleware('permission');
    }


    public function index()
    {
        $data['title'] = "Admin view";
        $data['admins'] = Admin::with('role')->orderBy('id','desc')->get();
        return view('admin.admin.index')->with($data);
    }


    public function create()
    {
        $data['title'] = "Admin create";
        $data['roles'] = RolePermission::orderBy('id', 'desc')->get();
        return view('admin.admin.create')->with($data);
    }


    public function store(AdminRequest $request)
    {
        try {
            $admin = new Admin();
            $admin->role_id = $request->role_id;
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->designation = $request->designation;
            $admin->mobile_no = $request->mobile_no;
            $admin->gender = $request->gender;
            $admin->email = $request->email;
            $admin->password = $request->password;
            $admin->address = $request->address;
            $admin->status = $request->status;

            if ($request->hasFile('photo')) {
                $photoPath = $this->uploadPath.'admin/';
                $photoName = $admin->first_name . $admin->last_name . time() . '.' . $request->photo->extension();

                $photo = Image::make($request->photo);
                $large = $medium = $small = $photo;
                $photo->save($photoPath . $photoName); //original
                $large->resize(480, 360)->save($photoPath . 'large/' . $photoName); //large
                $medium->resize(240, 180)->save($photoPath . 'medium/' . $photoName); // medium
                $small->resize(120, 90)->save($photoPath . 'small/' . $photoName); //small
                $admin->photo = $photoName;
            }

            $admin->save();
            $request->session()->flash('msg_success', 'Admin successfully created.');
            Log::info($this->auth->fullname . " create admin", ['admin_id' => $admin->id, 'auth_id' => $this->auth->id]);
        }catch(Exception $e){
            $request->session()->flash('msg_error', 'Admin not created.');
            Log::error($this->auth->fullname ."try create admin. not success.");
        }
        return redirect()->back();

    }


    public function edit($id)
    {
        $data['admin'] = Admin::find($id);
        $data['roles'] = RolePermission::orderBy('id', 'desc')->get();
        return view('admin.admin.edit')->with($data);
    }


    public function update(AdminRequest $request)
    {
        try {
            $admin = Admin::find($request->id);
            $admin->role_id = $request->role_id;
            $admin->first_name = $request->first_name;
            $admin->last_name = $request->last_name;
            $admin->designation = $request->designation;
            $admin->mobile_no = $request->mobile_no;
            $admin->gender = $request->gender;
            $admin->email = $request->email;
            if(!empty($request->password)){
                $admin->password = $request->password;
            }
            $admin->address = $request->address;
            $admin->status = $request->status;

            if($request->hasFile('photo')){
                $photoPath = $this->uploadPath.'admin/';
                $photoName = $admin->first_name . $admin->last_name . time() . '.' . $request->photo->extension();

                $photo = Image::make($request->photo);
                $large = $medium = $small = $photo;
                $photo->save($photoPath . $photoName); //original
                $large->resize(480, 360)->save($photoPath . 'large/' . $photoName); //large
                $medium->resize(240, 180)->save($photoPath . 'medium/' . $photoName); // medium
                $small->resize(120, 90)->save($photoPath . 'small/' . $photoName); //small

                if($admin->photo && !empty($admin->photo)){
                    if(file_exists($photoPath.$admin->photo)) {
                        @unlink($photoPath . $admin->photo);
                    }
                    if(file_exists($photoPath.'large/'.$admin->photo)) {
                        @unlink($photoPath.'large/'.$admin->photo);
                    }
                    if(file_exists($photoPath.'medium/'.$admin->photo)) {
                        @unlink($photoPath.'medium/'.$admin->photo);
                    }
                    if(file_exists($photoPath.'small/'.$admin->photo)) {
                        @unlink($photoPath.'small/'.$admin->photo);
                    }
                }
                $admin->photo = $photoName;
            }
            $admin->save();

            $request->session()->flash('msg_success', 'Admin successfully updated.');
            Log::info($this->auth->fullname . " updated admin", ['admin_id' => $admin->id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            $request->session()->flash('msg_error', 'Admin not updated.');
            Log::error($this->auth->fullname ."try updated admin. not success.");
        }
        return redirect()->back();
    }


    public function delete($id){
        try{
            Admin::find($id)->delete();
            session()->flash('msg_success', 'Admin successfully deleted.');
            Log::info($this->auth->fullname . " deleted admin", ['admin_id' => $id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            session()->flash('msg_error', 'Admin not deleted.');
            Log::error($this->auth->fullname ."try deleted admin. not success.");
        }
        return redirect()->back();
    }




}

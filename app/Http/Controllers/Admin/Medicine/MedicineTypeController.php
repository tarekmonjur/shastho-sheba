<?php

namespace App\Http\Controllers\Admin\Medicine;

use App\Models\MedicineType;
use App\Rules\AlphaSpacesDot;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Log;

class MedicineTypeController extends BaseController
{
     /*
     |--------------------------------------------------------------------------
     | Medicine Type Controller
     |--------------------------------------------------------------------------
     |
     | @Description : Application Medicine Type Manage
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
        $data['title'] = "Type View";
        $data['types'] = MedicineType::orderBy('id','desc')->get();
        return view('admin.type.index')->with($data);
    }


    public function create()
    {
        $data['title'] = "Type Create";
        return view('admin.type.create')->with($data);
    }


    public function store(Request $request)
    {
        $request->validate(['medicine_type_name' => ['required','min:3','max:100', new AlphaSpacesDot()]]);

        try {
            $type = new MedicineType();
            $type->type_name = $request->medicine_type_name;
            $type->save();
            $request->session()->flash('msg_success', 'Medicine type successfully created.');
            Log::info($this->auth->fullname . " create Medicine type", ['admin_id' => $type->id, 'auth_id' => $this->auth->id]);
        }catch(Exception $e){
            $request->session()->flash('msg_error', 'Medicine type not created.');
            Log::error($this->auth->fullname ."try create Medicine type. not success.");
        }
        return redirect()->back();
    }


    public function edit($id)
    {
        $data['title'] = "Type Edit";
        $data['type'] = MedicineType::find($id);
        return view('admin.type.edit')->with($data);
    }


    public function update(Request $request)
    {
        $request->validate(['medicine_type_name' => ['required','min:3','max:100', new AlphaSpacesDot()]]);

        try {
            $type = MedicineType::find($request->id);
            $type->type_name = $request->medicine_type_name;
            $type->save();
            $request->session()->flash('msg_success', 'Medicine type successfully updated.');
            Log::info($this->auth->fullname . " updated Medicine type", ['admin_id' => $type->id, 'auth_id' => $this->auth->id]);
        }catch(Exception $e){
            $request->session()->flash('msg_error', 'Medicine type not updated.');
            Log::error($this->auth->fullname ."try updated Medicine type. not success.");
        }
        return redirect()->back();
    }


    public function delete($id){
        try{
            MedicineType::find($id)->delete();
            session()->flash('msg_success', 'Medicine type successfully deleted.');
            Log::info($this->auth->fullname . " deleted Medicine type", ['admin_id' => $id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            session()->flash('msg_error', 'Medicine type not deleted.');
            Log::error($this->auth->fullname ."try deleted Medicine type. not success.");
        }
        return redirect()->back();
    }




}

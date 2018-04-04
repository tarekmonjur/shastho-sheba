<?php

namespace App\Http\Controllers\Admin\Medicine;

use App\Models\MedicineGeneric;
use App\Rules\AlphaSpacesDot;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Log;

class MedicineGenericController extends BaseController
{
     /*
     |--------------------------------------------------------------------------
     | MedicineGenerics Controller
     |--------------------------------------------------------------------------
     |
     | @Description : Application Medicine Generics Manage
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
        $data['title'] = "Generics View";
        $data['generics'] = MedicineGeneric::orderBy('id','desc')->Paginate(20);
        return view('admin.generics.index')->with($data);
    }


    public function create()
    {
        $data['title'] = "Generics Add";
        return view('admin.generics.add')->with($data);
    }


    public function store(Request $request)
    {
        $request->validate(['generic_name' => ['required','min:3','max:255',new AlphaSpacesDot()]]);

        try {
            $generic = new MedicineGeneric();
            $generic->generic_name = $request->generic_name;
            $generic->precaution = $request->precaution;
            $generic->indication = $request->indication;
            $generic->contraindication = $request->contraindication;
            $generic->dose = $request->dose;
            $generic->side_effect = $request->side_effect;
            $generic->mode_of_action = $request->mode_of_action;
            $generic->interaction = $request->interaction;
            $generic->save();

            $request->session()->flash('msg_success', 'Medicine generic successfully created.');
            Log::info($this->auth->fullname . " create Medicine generic", ['generic_id' => $generic->id, 'auth_id' => $this->auth->id]);
        }catch(Exception $e){
            $request->session()->flash('msg_error', 'Medicine generic not created.');
            Log::error($this->auth->fullname ."try create Medicine generic. not success.");
        }
        return redirect()->back();

    }


    public function edit($id)
    {
        $data['title'] = "Generics edit";
        $data['generic'] = MedicineGeneric::find($id);
        return view('admin.generics.edit')->with($data);
    }


    public function update(Request $request)
    {
        $request->validate(['generic_name' => ['required','min:3','max:255',new AlphaSpacesDot()]]);

        try {
            $generic = MedicineGeneric::find($request->id);
            $generic->generic_name = $request->generic_name;
            $generic->precaution = $request->precaution;
            $generic->indication = $request->indication;
            $generic->contraindication = $request->contraindication;
            $generic->dose = $request->dose;
            $generic->side_effect = $request->side_effect;
            $generic->mode_of_action = $request->mode_of_action;
            $generic->interaction = $request->interaction;
            $generic->save();

            $request->session()->flash('msg_success', 'Medicine generic successfully updated.');
            Log::info($this->auth->fullname . " updated medicine generic", ['generic_id' => $generic->id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            $request->session()->flash('msg_error', 'Medicine generic not updated.');
            Log::error($this->auth->fullname ."try updated medicine generic. not success.");
        }
        return redirect()->back();
    }


    public function delete($id){
        try{
            MedicineGeneric::find($id)->delete();
            session()->flash('msg_success', 'Medicine generic successfully deleted.');
            Log::info($this->auth->fullname . " deleted Medicine generic", ['generic_id' => $id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            session()->flash('msg_error', 'Medicine generic not deleted.');
            Log::error($this->auth->fullname ."try deleted medicine generic. not success.");
        }
        return redirect()->back();
    }




}

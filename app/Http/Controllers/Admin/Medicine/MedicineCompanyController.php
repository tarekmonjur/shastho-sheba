<?php

namespace App\Http\Controllers\Admin\Medicine;

use App\Models\MedicineCompany;
use App\Http\Requests\MedicineCompanyRequest;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Log;

class MedicineCompanyController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | MedicineCompany Controller
    |--------------------------------------------------------------------------
    |
    | @Description : Application Medicine Company Manage
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
        $data['title'] = "Company View";
        $data['companies'] = MedicineCompany::get();
        return view('admin.company.index')->with($data);
    }


    public function create()
    {
        $data['title'] = "Company Add";
        return view('admin.company.add')->with($data);
    }


    public function store(MedicineCompanyRequest $request)
    {
        try {
            $company = new MedicineCompany();
            $company->medicine_company_name = $request->medicine_company_name;
            $company->medicine_company_slug = $request->medicine_company_slug;
            $company->medicine_company_status = $request->medicine_company_status;
            $company->medicine_company_address = $request->medicine_company_address;
            $company->save();

            $request->session()->flash('msg_success', 'Medicine company successfully created.');
            Log::info($this->auth->fullname . " create Medicine company", ['company_id' => $company->id, 'auth_id' => $this->auth->id]);
        }catch(Exception $e){
            $request->session()->flash('msg_error', 'Medicine company not created.');
            Log::error($this->auth->fullname ."try create Medicine company. not success.");
        }
        return redirect()->back();

    }


    public function edit($id)
    {
        $data['title'] = "Company edit";
        $data['company'] = MedicineCompany::find($id);
        return view('admin.company.edit')->with($data);
    }


    public function update(MedicineCompanyRequest $request)
    {
        try {
            $company = MedicineCompany::find($request->id);
            $company->medicine_company_name = $request->medicine_company_name;
            $company->medicine_company_slug = $request->medicine_company_slug;
            $company->medicine_company_status = $request->medicine_company_status;
            $company->medicine_company_address = $request->medicine_company_address;
            $company->save();

            $company->save();

            $request->session()->flash('msg_success', 'Medicine company successfully updated.');
            Log::info($this->auth->fullname . " updated medicine company", ['company_id' => $company->id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            $request->session()->flash('msg_error', 'Medicine company not updated.');
            Log::error($this->auth->fullname ."try updated medicine company. not success.");
        }
        return redirect()->back();
    }


    public function delete($id){
        try{
            MedicineCompany::find($id)->delete();
            session()->flash('msg_success', 'Medicine company successfully deleted.');
            Log::info($this->auth->fullname . " deleted Medicine company", ['company_id' => $id, 'auth_id' => $this->auth->id]);
        }catch (\Exception $e){
            session()->flash('msg_error', 'Medicine company not deleted.');
            Log::error($this->auth->fullname ."try deleted Medicine company. not success.");
        }
        return redirect()->back();
    }


}

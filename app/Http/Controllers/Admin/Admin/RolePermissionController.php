<?php

namespace App\Http\Controllers\Admin\Admin;

use App\Models\RolePermission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Log;

class RolePermissionController extends BaseController
{
    /*
     |--------------------------------------------------------------------------
     | Admin/RolePermissionController
     |--------------------------------------------------------------------------
     |
     | @Description : Admin Role Permission Management Controller
     | @Author : Tarek Monjur.
     | @Email  : tarekmonjur@gmail.com
     |
     */

    protected $auth;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:admin');
        $this->middleware('permission');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Role view";
        $data['roles'] = RolePermission::orderBy('id', 'desc')->get();
        return view('admin.role.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Add role";
        return view('admin.role.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|max:255',
        ]);
        try {
            $rolePermission = new RolePermission();
            $rolePermission->role_name = $request->role_name;
            $rolePermission->role_description = $request->role_description;
            $rolePermission->role_permission = serialize($request->permissions);
            $rolePermission->save();

            $request->session()->flash('msg_success', 'Role successfully added.');
            Log::info($this->auth->fullname." create new role.", ['role_id' => $rolePermission->id, 'auth_id'=> $this->auth->id]);
        }catch(\Exception $e){
            $request->session()->flash('msg_error', 'Role not added.');
            Log::error($this->auth->fullname ."try create role. not success.");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['role'] = RolePermission::find($id);
        return view('admin.role.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Edit role";
        $data['role'] = RolePermission::find($id);
        return view('admin.role.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_name' => 'required|max:255',
        ]);
        try {
            $rolePermission = RolePermission::find($id);
            $rolePermission->role_name = $request->role_name;
            $rolePermission->role_description = $request->role_description;
            $rolePermission->role_permission = serialize($request->permissions);
            $rolePermission->save();

            $request->session()->flash('msg_success', 'Role successfully updated.');
            Log::info($this->auth->fullname." updated role.", ['role_id' => $rolePermission->id, 'auth_id'=> $this->auth->id]);
        }catch(\Exception $e){
            $request->session()->flash('msg_error', 'Role not updated.');
            Log::error($this->auth->fullname ."try update role. not success.");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try{
            RolePermission::where('id', $id)->delete();
            $request->session()->flash('msg_success', 'Role successfully deleted.');
            Log::info($this->auth->fullname." deleted role.", ['role_id' => $id, 'auth_id'=> $this->auth->id]);
        }catch (\Exception $e){
            $request->session()->flash('msg_error', 'Role not deleted. Maybe its relation another data.');
            Log::error($this->auth->fullname ."try delete role. not success.");
        }
        return redirect()->back();

    }
}

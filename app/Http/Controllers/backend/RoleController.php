<?php

namespace App\Http\Controllers\backend;

use App\Models\Role;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::with('role_permissions')->get();

        return view('admin.pages.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create([
            'name'=>$request->name,
            
        ]);
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function assignPermission($role_id)
    {
        $roles=Role::find($role_id);
        $modules=Module::with('assign_permissions')->get();
        return view('admin.pages.role.assign_permission',compact('modules','roles'));
    }
    public function storePermission(Request $request)
    {
        foreach ($request->assign_permissions as $permission)
        {
            RolePermission::create([
                'role_id'=>$request->role_id,
                'permission_id'=>$permission,
            ]);
        }
        return redirect()->route('role.index');

    }
    public function editPermission ($role_id)
    {
        $roles=Role::with('role_permissions')->find($role_id);
      $permissions=$roles->role_permissions->pluck('permission_id')->toArray();
        // $modules=Module::with('assign_permissions')->get();
        $modules=Module::with('assign_permissions')->get();
     
       
        // dd($role_permission);
       
 
        return view('admin.pages.role.edit_assign_permission',compact('permissions','modules','roles'));
    }

    public function updatePermission(Request $request)
    {  
        $role=RolePermission::where('role_id',$request->role_id)->delete();
        foreach ($request->assign_permissions as $permission)
        {
            // dd($permission);
      
            RolePermission::Create([
                'role_id'=>$request->role_id,
                'permission_id'=>$permission,
            ]);
        }
        Toastr::success('Permissions Edited Successfully');
        return redirect()->route('role.index');


    }
}

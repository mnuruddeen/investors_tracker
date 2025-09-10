<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view role',['only'=>['index']]);
        $this->middleware('permission:create role',['only'=>['create','store']]);
        $this->middleware('permission:update role',['only'=>['update']]);
        $this->middleware('permission:delete role',['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Roles";
        $roles = Role::all();
        return view('role-permission.role.index', compact('title','roles'));
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
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        $create = Role::create([
            'name' => $request->name
        ]);

        if($create){
            return redirect('roles')->with('success','Role Added Successfully');
        }else{
            return redirect('roles')->with('error','Something Went Wrong!');
        }
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
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]
        ]);

        $update = $role->update([
            'name'=>$request->name
        ]);
        if($update){
            return redirect()->back()->with('success','Role Updated Successfully');
        }else{
            return redirect()->back()->with('error','Sorry Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find(decrypt($id));
        $role->delete();
        return redirect()->back()->with('success','Role Deleted Successfully');
    }

    //Add-Update permissions to roll

    public function add_permission_to_role($id){
        $title = "Add Permissions to Role";
        $permissions = Permission::get();
        $role = Role::find(decrypt($id));
        $role_permissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id',$role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();

        return view('role-permission.role.add-permission', compact('title','role','permissions','role_permissions'));
    }

    public function update_permission_to_role(Request $request, $id){

        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail(decrypt($id));
        $sync = $role->syncPermissions($request->permission);

        if($sync){
            return redirect()->back()->with('success','Permission added to Role Successfully');
        }else{
            return redirect()->back()->with('error','Sorry Something went wrong');
        }

    }

}

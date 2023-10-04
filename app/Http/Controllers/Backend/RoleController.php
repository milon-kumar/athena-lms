<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Role.List|Role.Create|Role.Edit|Role.Delete']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Role List";
        $roles = Role::with('permissions')->paginate(10);
        return view('backend.admin.pages.role.index',compact('title','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Role Create";
        $permissions = Permission::all()->groupBy('module');
        return view('backend.admin.pages.role.create',compact('title','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        if (!empty($request->input('permissions'))){
            $role = Role::create(['name'=>$request->input('name')]);
            $role->givePermissionTo($request->input('permissions'));
            toast('Role Crated Successfully...','success');
            return  redirect()->route('admin.role.index');
        }else{
            toast('Please Select Permission','warning');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Role Edit";
        $permissions = Permission::all()->groupBy('module');
        $role = Role::with('permissions')->findOrFail($id);
        return view('backend.admin.pages.role.edit',compact('title','permissions','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $role = Role::findOrFail($id);
        if (!empty($request->input('permissions'))){
            $role->update(['name'=>$request->input('name')]);
            $role->syncPermissions($request->input('permissions'));
            toast('Role Update Successfully...','success');
            return  redirect()->route('admin.role.index');
        }else{
            toast('Please Select Permission','warning');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        toast('Role Delete Successfully','success');
        return redirect()->route('admin.role.index');
    }
}

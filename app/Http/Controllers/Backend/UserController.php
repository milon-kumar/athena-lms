<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "All Users And Roles";
        $users = User::with('roles')->where('type','admin')->orWhere('type','super_admin')->orderBy('created_at','ASC')->get();
        return view('backend.admin.pages.user.index',compact('title','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add New User";
        $roles = Role::all();
        return view('backend.admin.pages.user.create',compact('title','roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:16',
        ]);

        if (!empty($request->input('role'))){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 'admin',
                'is_delete'=>true,
            ]);
            $user->assignRole($request->input('role'));
        }else{
            toast('Please Select Role','warning');
            return  redirect()->back();
        }


        toast('User Created','success');
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $title = "Edit User";
        $roles = Role::all();
        $user = User::with('roles')->findOrFail($user->id);
        return view('backend.admin.pages.user.edit',compact('title','roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name'=>'required|max:50',
        ]);
        if (!empty($request->role)){
            $user->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
            ]);
            $user->syncRoles($request->input('role'));
        }else{
            toast('Please Select Role','warning');
            return  redirect()->back();
        }
        toast('User Created','success');
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        toast('User Delete Successfully...','success');
        return redirect()->route('admin.user.index');
    }
}

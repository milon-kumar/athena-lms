<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (invalidPermission('Opinion.List')){
            return redirect()->back();
        }
        $title = "Opinion List";
        $opinions = Opinion::latest()->get();
        return view('backend.admin.pages.opinion.index',compact('title','opinions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (invalidPermission('Opinion.Create')){
            return redirect()->back();
        }
        $title = "Opinion Create";
        return view('backend.admin.pages.opinion.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (invalidPermission('Opinion.Create')){
            return redirect()->back();
        }
        $images =  $request->input('serials');
        foreach ($images as $key => $image) {
            Opinion::create([
                'user_id'=>Auth::id(),
                'serial'=> $request->input('serials')[$key],
                'image'=> $request->file('images')[$key]->store('/images', ['disk' =>'my_files'] ?? config('filesystems.noimage')),
                'description'=>$request->input('descriptions')[$key],
            ]);
        }
        toast('Opinion Created Successfully....','success');
        return redirect()->route('admin.opinion.index');
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
        if (invalidPermission('Opinion.Edit')){
            return redirect()->back();
        }
        $opinion = Opinion::findOrFail($id);
        $title = "Edit Opinion";
        return view('backend.admin.pages.opinion.edit',compact('opinion','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (invalidPermission('Opinion.Edit')){
            return redirect()->back();
        }
        $opinion = Opinion::findOrFail($id);
        $opinion->update([
            'user_id'=>Auth::id(),
            'serial'=> $request->input('serial'),
            'image'=> uploadImage($request,$opinion),
            'description'=>$request->input('description'),
        ]);
        toast('Opinion Updated........','success');
        return redirect()->route('admin.opinion.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (invalidPermission('Opinion.Delete')){
            return redirect()->back();
        }
        $opinion = Opinion::findOrFail($id);
        if ($opinion->image){
            @unlink($opinion->image);
        }
        $opinion->delete();
        toast('Opinion Deleted........','success');
        return redirect()->route('admin.opinion.index');
    }
}

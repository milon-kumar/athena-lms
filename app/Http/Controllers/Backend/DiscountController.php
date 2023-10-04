<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (invalidPermission('Discount.List')){
            return  redirect()->back();
        }

        $title = "All Discount";
        $course = Course::with(['discounts'])->findOrFail(courseId(),['id','title']);
        return  view('backend.admin.pages.discount.index',compact('title','course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (invalidPermission('Discount.Create')){
            return  redirect()->back();
        }

        $title = "Create Discount";
        $course = Course::findOrFail(courseId(),['id','title']);
        return  view('backend.admin.pages.discount.create',compact('title','course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (invalidPermission('Discount.Create')){
            return  redirect()->back();
        }


        $this->validate($request,[
            'title'=>'required',
            'discount'=>'required',
        ]);

        Discount::create([
            'user_id'=>Auth::id(),
            'course_id'=>courseId(),
            'title'=>$request->input('title'),
            'discount'=>$request->input('discount'),
            'code'=>Str::slug(Str::random(10).now()->format('s')),
        ]);

        toast('Discount Created Successfully','success');
        return redirect()->route('admin.discount.index');
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
        if (invalidPermission('Discount.Edit')){
            return  redirect()->back();
        }

        $title = "Edit Discount";
        $course = Course::findOrFail(courseId(),['id','title']);
        $discount = Discount::findOrFail($id);
        return  view('backend.admin.pages.discount.edit',compact('title','course','discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (invalidPermission('Discount.Edit')){
            return  redirect()->back();
        }


        $this->validate($request,[
            'title'=>'required',
            'discount'=>'required',
        ]);
        $discount = Discount::findOrFail($id);
        $discount->update([
            'user_id'=>Auth::id(),
            'course_id'=>courseId(),
            'title'=>$request->input('title'),
            'discount'=>$request->input('discount'),
            'code'=>Str::slug(Str::random(10).now()->format('s')),
        ]);

        toast('Discount Update Successfully','success');
        return redirect()->route('admin.discount.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (invalidPermission('Discount.Delete')){
            return  redirect()->back();
        }
        Discount::findOrFail($id)->delete();
        toast('Discount Delete Successfully','success');
        return redirect()->route('admin.discount.index');
    }
}

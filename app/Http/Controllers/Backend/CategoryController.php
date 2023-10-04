<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backend.admin.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (invalidPermission("Category.Create")){
            return redirect()->back();
        }
        Category::create([
            'name'=>$request->input('name'),
            'slug'=>Str::slug($request->input('name')),
            'image'=> $request->hasFile('image')?$request->input('image')->store('/images/', ['disk' =>'my_files']):'default.jpg',
            'status'=>$request->input('status') ?? 1,
        ]);
        toast('Category Created','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.admin.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $category->update([
            'name'=>$request->input('name'),
            'slug'=>Str::slug($request->input('name')),
            'image'=> uploadImage($request),
            'status'=>$request->input('status') ?? 1,
        ]);
        toast('Category Updated... :)','success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        toast('Category Deleted','success');
        return redirect()->back();
    }

    public function published($id)
    {
        Category::findOrFail($id)->update([
            'status'=>1,
        ]);

        toast('category published successfully ... :)','success');
        return redirect()->back();
    }
    public function unpublished($id)
    {
        Category::findOrFail($id)->update([
            'status'=>0,
        ]);

        toast('category unpublished successfully ... :)','success');
        return redirect()->back();
    }
}

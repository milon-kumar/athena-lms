<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "All Faq";
        $faqs = Faq::latest()->get();
        return view('backend.admin.pages.faq.index',compact('title','faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (invalidPermission('Faq.Create')){
            return redirect()->back();
        }
        $title = "Create Faq";
        return view('backend.admin.pages.faq.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Faq::create([
           'title'=>$request->input('title'),
           'description'=>$request->input('description'),
        ]);

        toast('Faq Create Success','success');
        return redirect()->route('admin.faq.index');
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
        if (invalidPermission('Faq.Edit')){
            return redirect()->back();
        }
        $title = "Faq Edit";
        $faq = Faq::findOrFail($id);
        return view('backend.admin.pages.faq.edit',compact('title','faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->update([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
        ]);

        toast('Faq Update Success','success');
        return redirect()->route('admin.faq.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (invalidPermission('Faq.Delete')){
            return redirect()->back();
        }
        Faq::findOrFail($id)->delete();
        toast('Faq Delete Success','success');
        return back();
    }
}

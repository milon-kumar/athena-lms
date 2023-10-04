<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (invalidPermission('Slider.List')){
            return redirect()->back();
        }
        $title = "Slider List";
        $sliders = Slider::orderBy('serial','ASC')->get();
        return view('backend.admin.pages.slider.index',compact('title','sliders'));
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
        if (invalidPermission('Slider.Create')){
            return redirect()->back();
        }
        $this->validate($request,[
           'image'=>'required|image|mimes:jpg,jpeg,png,webp',
            'link'=>'required',
        ]);

        Slider::create([
            'serial'=>$request->input('serial'),
            'image'=>uploadImage($request),
            'is_read'=>$request->filled('is_read'),
            'is_buy'=>$request->filled('is_buy'),
            'link'=>$request->input('link'),
            'status'=>'published',
        ]);
        toast('Slider Created.....','success');
        return redirect()->back();
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
        if (invalidPermission('Slider.Edit')){
            return redirect()->back();
        }
        $title ="Edit Slider";
        $slider = Slider::findOrFail($id);
        return view('backend.admin.pages.slider.edit',compact('title','slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (invalidPermission('Slider.Edit')){
            return redirect()->back();
        }
        $slider = Slider::findOrFail($id);
        $this->validate($request,[
            'image'=>'mimes:jpg,jpeg,png,webp',
            'link'=>'required',
        ]);

        $slider->update([
            'serial'=>$request->input('serial'),
            'image'=>uploadImage($request,$slider),
            'is_read'=>$request->filled('is_read'),
            'is_buy'=>$request->filled('is_buy'),
            'link'=>$request->input('link'),
            'status'=>'published',
        ]);
        toast('Slider Updated.....','success');
        return redirect()->route('admin.slider.index');

    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id)
    {
        if (invalidPermission('Slider.Delete')){
            return redirect()->back();
        }
        $slider = Slider::findOrFail($id);
        $slider->delete();
        toast('Slider Deleted.....','success');
        return redirect()->route('admin.slider.index');
    }
}

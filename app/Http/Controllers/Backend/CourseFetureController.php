<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseFeture;
use Illuminate\Http\Request;

class CourseFetureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $reqs = $request->except('_token');


        $switches = $request->input('switches', []);

        // Process the switches as needed
        $course = CourseFeture::where('course_id', courseId())->get();
        $course->map->delete();
        foreach ($switches as $switchName => $switchValue) {
            if ($switchValue) {
                CourseFeture::create([
                    'course_id' => courseId(),
                    'key' => $switchName,
                    'value' =>  true
                ]);
            } else {
                CourseFeture::create([
                    'course_id' => courseId(),
                    'key' => $switchName,
                    'value' =>  false
                ]);
            }
        }







//        foreach ($reqs as $key => $value){
//            $course = CourseFeture::where('course_id', courseId())->where('key', $key)->first();
//            if ($course){
//                $course->update([
//                    'course_id' => courseId(),
//                    'key' => $key,
//                    'value' =>  ($value) ?? 0,
//                ]);
//            }else{
//                CourseFeture::create([
//                    'course_id' => courseId(),
//                    'key' => $key,
//                    'value' =>  filled($value) ?? 0,
//                ]);
//            }
//        }

        toast('Featured Updated Successfully done.', 'success');
        return back();
    }

    /**
     * Display the specified resource.D
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

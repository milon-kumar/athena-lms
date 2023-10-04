<?php

use App\Models\CourseFeture;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\BusinessSetting;



function uploadImage($request,$update_image = null){
    return $request->hasFile('image')?$request->file('image')->store('/images', ['disk' =>'my_files']): $update_image->image ?? 'images/default.jpg';
}


function uploadPdf($request = null){
    if ($request){
        return $request->store('/pdfs', ['disk' =>'my_files']);
    }
}


function courseId(){
    $user = Auth::user();

    if (!empty($user->selected_course_id)){
        return $user->selected_course_id;
    }else{
        return  null;
    }
}

function getCourseFeatured($key=null){
    if ($key){
        return CourseFeture::where('course_id', courseId())->where('key', $key)->first('value')?->value;
    }
    return false;
}

function getCFeturedStudent($courseId= null, $key=null){
    if ($courseId && $key){
        return CourseFeture::where('course_id', $courseId)->where('key', $key)->first('value')?->value;
    }
    return false;
}

function stdCourseId(){
    if (Auth::user()->selected_course_id){
        return Auth::user()->selected_course_id;
    }else{
        return  null;
    }
}

function defaultImage(){
    return asset(config('filesystems.noimage'));
}

if (!function_exists('defPdf')) {
    function defPdf()
    {
        return asset('pdfs/default.pdf');
    }
}

if (!function_exists('discournPrice')) {
    function discournPrice($request){
        return ($request->input('regular_course_fee')) - ($request->input('discount_fee') ?? 0);
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $setting = BusinessSetting::where('type', $key)->first();
        return $setting == null ? $default : $setting->value;
    }
}

if (!function_exists('auth_roles')) {
    function auth_roles(){
        $roles = ['admin','author'];

        return $roles;
    }
}
if (!function_exists('all_roles')) {
    function all_roles(){
        $roles = ['basic','admin','user','student','author','professional','subscriber'];

        return $roles;
    }
}

if (!function_exists('createCheckBoxSetting')){
    function createCheckBoxSetting($request = null){
        foreach ($request->types as $key => $value){
            $business_settings = BusinessSetting::where('type', $value)->first();
            if ($business_settings){
                $business_settings->value = $request->filled($value);
                $business_settings->save();
            }else{
                $business_settings = new BusinessSetting();
                $business_settings->type = $value;
                $business_settings->value = $request->filled($value);
                $business_settings->save();
            }
        }

        return true;
    }
}
if (!function_exists('generateRandomPassword')){
    function generateRandomPassword($length = 12) {
        $characters = 'abclmndefghijkopqPQRSrst678uvw#$%^&*zABCDE0123LMNOTFGH()xyIJKU5VWXYZ49!@';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= Str::random(1, $characters);
        }
        return $password;
    }
}

if (!function_exists('invalidPermission')){
    function invalidPermission($permission = null){
        if (! auth()->user()->can($permission)){
            toast('Sorry Your Request Is Invalid - 403','error');
            return true;
        }
    }
}



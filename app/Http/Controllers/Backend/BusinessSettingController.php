<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BusinessSettingController extends Controller
{
    public function basicSetting()
    {
        return view('backend.admin.pages.setting.basic_setting');
    }

    public function update(Request $request)
    {
        foreach ($request->types as $key => $type) {
            if($type == 'site_name'){
                $this->overWriteEnvFile('APP_NAME', $request[$type]);
            }
            if($type == 'timezone'){
                $this->overWriteEnvFile('APP_TIMEZONE', $request[$type]);
            }
            else {
                $business_settings = BusinessSetting::where('type', $type)->first();
                if($business_settings!=null){
                    if(gettype($request[$type]) == 'array'){
                        $business_settings->value = json_encode($request[$type]);
                    }
                    else {
                        $business_settings->value = $request[$type];
                    }
                    $business_settings->save();
                }
                else{
                    $business_settings = new BusinessSetting;
                    $business_settings->type = $type;
                    if(gettype($request[$type]) == 'array'){
                        $business_settings->value = json_encode($request[$type]);
                    }
                    else {
                        $business_settings->value = $request[$type];
                    }
                    $business_settings->save();
                }
            }
        }

        Artisan::call('cache:clear');
        toast('Setting Updated ......... :)','success');
        return back();
    }

    public function settingHeorimage(Request $request)
    {
        $business_settings = BusinessSetting::where('type', 'hero_image')->first();
        if ($business_settings){
            $business_settings->value = $request->hasFile('hero_image')?$request->file('hero_image')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }else{
            $business_settings = new BusinessSetting();
            $business_settings->type = 'hero_image';
            $business_settings->value = $request->hasFile('hero_image')?$request->file('hero_image')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }

        toast('Hero Image Updated','success');
        return redirect()->back();
    }
    public function settingAboutimage(Request $request)
    {
        $business_settings = BusinessSetting::where('type', 'about_image')->first();
        if ($business_settings){
            $business_settings->value = $request->hasFile('about_image')?$request->file('about_image')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }else{
            $business_settings = new BusinessSetting();
            $business_settings->type = 'about_image';
            $business_settings->value = $request->hasFile('about_image')?$request->file('about_image')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }

        toast('Hero Image Updated','success');
        return redirect()->back();
    }

    public function homePageSetting()
    {
        return view('backend.admin.pages.setting.home-page');
    }

    public function footerSetting()
    {
        return view('backend.admin.pages.setting.footer');
    }

    public function instituteSetting()
    {
        return view('backend.admin.pages.setting.institute');
    }

    public function websiteIcon(Request $request)
    {
        $business_settings = BusinessSetting::where('type', 'website_icon')->first();
        if ($business_settings){
            $business_settings->value = $request->hasFile('website_icon')?$request->file('website_icon')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }else{
            $business_settings = new BusinessSetting();
            $business_settings->type = 'website_icon';
            $business_settings->value = $request->hasFile('website_icon')?$request->file('website_icon')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }

        toast('Website Icon Updated','success');
        return redirect()->back();
    }

    public function websiteLogo(Request $request)
    {
        $business_settings = BusinessSetting::where('type', 'website_logo')->first();
        if ($business_settings){
            $business_settings->value = $request->hasFile('website_logo')?$request->file('website_logo')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }else{
            $business_settings = new BusinessSetting();
            $business_settings->type = 'website_logo';
            $business_settings->value = $request->hasFile('website_logo')?$request->file('website_logo')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }

        toast('Website Logo Updated','success');
        return redirect()->back();
    }

    public function editCourse(Request $request)
    {
        if (createCheckBoxSetting($request)){
            toast('Setting Updated ......... :)','success');
            return redirect()->back();
        }
    }

    public function account()
    {
        $title = "Admin Account";
        return view('backend.admin.pages.setting.account',compact('title'));
    }

    public function profile()
    {
        $user = auth()->user();
        $title = "Admin Profile";
        return view('backend.admin.pages.setting.profile',compact('title','user'));
    }

    public function profileEdit($id)
    {
        $title = "Edit Profile";
        $user = User::findOrFail($id);
        return view('backend.admin.pages.setting.profile_edit',compact('title','user'));
    }

    public function profileUpdate(Request $request , $id = null)
    {
        $user = User::findOrFail($id);
        $user->update([
           'type'=>$user->type,
           'name'=>$request->input('name'),
           'phone'=>$request->input('phone'),
           'image'=>uploadImage($request,$user),
        ]);
        toast('Profile Info Updated','success');
        return redirect()->route('admin.setting.profile');
    }

    public function changeEmail(Request $request)
    {
        $this->validate($request,[
            'old_email'=>'required|email',
            'new_email'=>'required|email',
            'password'=>'required',
        ]);
        $old_email = $request->input('old_email');
        $new_email = $request->input('new_email');
        $password = $request->input('password');
        if ($old_email == $new_email ){
            toast('Email Address Same.......','warning');
            return redirect()->back();
        }else{
            $user = User::where('email',$old_email)->first();
            if ($user){
                if (Hash::check($password,$user->password)){
                    $user->update([
                        'email'=>$new_email,
                    ]);
                    toast('Email Address Change Successfully.......','success');
                    return redirect()->route('admin.dashboard');
                }else{
                    toast('Password Dont Match.......','warning');
                    return redirect()->back();
                }
            }else{
                toast('Email Address Dont Match.......','warning');
                return redirect()->back();
            }
        }
    }

    public function changePassword(Request $request)
    {
        if (Hash::check($request->input('old_password') , auth()->user()->password)){
            $user = User::findOrFail(auth()->id());
            $user->update([
                'password'=>Hash::make($request->input('new_password')),
            ]);
            toast('Password Change Successfully......','error');
            Auth::logout();
            return redirect()->route('frontend.home');
        }else{
            toast('Old Password Doesn\'t match!','error');
            return redirect()->back();
        }
    }

    public function webControls(Request $request)
    {
        if (createCheckBoxSetting($request)){
            toast('Setting Updated ......... :)','success');
            return redirect()->back();
        }
    }

    public function footerInfo()
    {
        $title = "Footer Info Setting";
        return view('backend.admin.pages.setting.footer.footer_info',compact('title'));
    }

    public function ourServices()
    {
        $title = "Our Services Setting";
        return view('backend.admin.pages.setting.footer.out_services',compact('title'));
    }
    public function refundPolicy()
    {
        $title = "Refund Policy Setting";
        return view('backend.admin.pages.setting.footer.refund_policy',compact('title'));
    }
    public function privacyPolicy()
    {
        $title = "Privacy Policy Setting";
        return view('backend.admin.pages.setting.footer.privacy_policy',compact('title'));
    }
    public function rules()
    {
        $title = "Rules Setting";
        return view('backend.admin.pages.setting.footer.rules',compact('title'));
    }
    public function community()
    {
        $title = "Community Setting";
        return view('backend.admin.pages.setting.footer.community',compact('title'));
    }
    public function howToBuy()
    {
        $title = "How To Buy Setting";
        return view('backend.admin.pages.setting.how_to_buy',compact('title'));
    }
    public function serviceInfo()
    {
        $title = "Service Info";
        return view('backend.admin.pages.setting.service_info',compact('title'));
    }
    public function disclaimer()
    {
        $title = "Disclaimer Info";
        return view('backend.admin.pages.setting.footer.disclaimer_info',compact('title'));
    }
    public function noticeBoard()
    {
        $title = "Notice Board Info";
        return view('backend.admin.pages.setting.footer.notice_board_info',compact('title'));
    }
    public function joinAsTeacher()
    {
        $title = "Join As A Teacher Info";
        return view('backend.admin.pages.setting.footer.join_as_teacher_info',compact('title'));
    }
    public function carrier()
    {
        $title = "Carrier Info";
        return view('backend.admin.pages.setting.footer.carrier_info',compact('title'));
    }
    public function dropCv()
    {
        $title = "Drop CV Info";
        return view('backend.admin.pages.setting.footer.drop_cv_info',compact('title'));
    }
    public function invoiceContent()
    {
        $title = "Invoice Content";
        return view('backend.admin.pages.setting.invoice_content',compact('title'));
    }

}

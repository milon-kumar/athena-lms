<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Cpanel;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\From;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Shetabit\Visitor\Models\Visit;
use stdClass;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $cpanel = new Cpanel();

        $diskInfo     = $cpanel->getCpanelDiskQuotaInfo();
        $dbInfo       = $cpanel->listDatabases();
        $storageInfo  = $cpanel->callUAPI('Quota', 'get_quota_info');

        $allDatabases = $dbInfo['data']->data;
        $diskData     = $diskInfo['data']->data;
        $storageInfo  = $storageInfo['data']->data;

        // using limit
        $usingLimit = $diskData->bytes_used / 1024 / 1024 / 1024;
        // total limit
        $totalLimit = $diskData->byte_limit / 1024 / 1024 / 1024;

        $arr = [];
        $arr['total_using']   = number_format($usingLimit, 2);
        $arr['total_limit']   = number_format($totalLimit, 2);
        $arr['total_files']   = number_format($diskData->inode_limit);
        $arr['files_using']   = number_format($diskData->inodes_used);
        $arr['all_databases'] = $allDatabases;
        $arr['storage_info']  = $storageInfo;



        $topCourse = Course::withCount('comments')
                                    ->orderBy('view_count','desc')
                                    ->orderBy('comments_count','desc')
                                    ->take(5)
                                    ->get();

        $totalVisitor = Visit::count();


        $usersData = User::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count'))
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
        $months = [];
        $userCounts = [];

        foreach ($usersData as $data) {
            $months[] = date("F Y", mktime(0, 0, 0, $data->month, 1, $data->year));
            $userCounts[] = $data->count;
        }


        $browserData = DB::table('shetabit_visits')
            ->select('browser', DB::raw('COUNT(*) as count'))
            ->groupBy('browser')
            ->orderByDesc('count')
            ->get();

        $visitorData = DB::table('shetabit_visits')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();



        return view('backend.admin.pages.dashboard.dashboard',compact('topCourse',
            'totalVisitor','months','userCounts','browserData','visitorData','arr'));
    }

    public function formSubmit(Request $request)
    {
        foreach ($request->name as $key => $value){
            From::create([
                'name'=>$value,
                'image'=>$request->hasFile('image') ? $request->image[$key]->store('/images/form', ['disk' =>'my_files']):'defalut.jpg',
            ]);
        }
        toast('Data Created','success');
        return redirect()->back();
    }

    public function setCourseId(Request $request)
    {

        $user = User::findOrFail(Auth::id());
        $user->selected_course_id = $request->input('course_id');
        $user->save();


        return courseId();
        exit();

//        if (Session::has('course_id')){
//            Session::forget('course_id');
//            Session::put('course_id',$request->input('course_id'));
//            return response()->json([
//                'type'=>true,
//                'message'=>'Course Id Set success'
//            ],200);
//        }else{
//            Session::put('course_id',$request->input('course_id'));
//            return response()->json([
//                'type'=>true,
//                'message'=>'Course Id Set success'
//            ],200);
//        }
    }

    public function ourTalk()
    {
        if (invalidPermission('Our_Talk')){
            return redirect()->back();
        }

        $title = 'About Message';
        return view('backend.admin.pages.about.index',compact('title'));
    }

    public function editorImageUpload()
    {
        // Allowed extentions.
        $allowedExts = array("gif", "jpeg", "jpg", "png","PNG");

        // Get filename.
        $temp = explode(".", $_FILES["image_param"]["name"]);

        // Get extension.
        $extension = end($temp);

        // An image check is being done in the editor but it is best to
        // check that again on the server side.
        // Do not use $_FILES["file"]["type"] as it can be easily forged.
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES["image_param"]["tmp_name"]);

        if ((($mime == "image/gif")
                || ($mime == "image/jpeg")
                || ($mime == "image/pjpeg")
                || ($mime == "image/x-png")
                || ($mime == "image/png"))
            && in_array($extension, $allowedExts)) {
            // Generate new random name.
            $name = sha1(microtime()) . "." . $extension;

            // Save file in the uploads folder.
            move_uploaded_file($_FILES["image_param"]["tmp_name"], getcwd() . "/images/" . $name);

            // Generate response.
            $response = new StdClass;
            $response->link = "/images/" . $name;
            echo stripslashes(json_encode($response));
        }
    }
}

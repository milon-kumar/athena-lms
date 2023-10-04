<?php



use App\Http\Controllers\Student\ComplainController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\ExamController;
use App\Http\Controllers\Student\InvoiceController;
use App\Http\Controllers\Student\NotificationController;
use App\Http\Controllers\Student\PostController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\ProgressController;
use App\Http\Controllers\Student\SettingController;
use App\Http\Controllers\Student\VideoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'student','as'=>'student.','middleware'=>['auth','student']],function (){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    //Student Courses
    Route::get('/courses',[CourseController::class,'courses'])->name('courses');
    Route::get('/course-details/{slug}',[CourseController::class,'courseDetails'])->name('course-details');
    Route::get('/class-video/{slug}',[CourseController::class,'classVideo'])->name('class-video');

    //Bye A NEW Course
    Route::get('/buy-course',[CourseController::class,'buyCourse'])->name('buy-course');
    Route::get('/buy-course/details/{slug}',[CourseController::class,'buyCourseDetails'])->name('buy-course.details');

    //SET Course Id Here
    Route::group(['middleware'=>'student_course_id'],function (){
        //Post Section
        Route::resource('/post',PostController::class);
        Route::get('/my-post',[PostController::class,'myPost'])->name('post.my-post');
        Route::get('/today-post',[PostController::class,'todayPost'])->name('post.today-post');

        Route::post('post-comment-store',[PostController::class,'commentStore'])->name('post.comment.store');
        Route::post('/post-comment-replay-store',[PostController::class,'postCommentReplayStore'])->name('post.comment.replay.store');

        Route::get('/chapter',[CourseController::class,'chapter'])->name('chapter');
        Route::get('/pdf/{type}',[CourseController::class,'pdf'])->name('pdf');
        Route::get('/pdf-show/{id}',[CourseController::class,'pdfShow'])->name('pdf.show');

        Route::get('/show-video/{id}',[VideoController::class,'showVideo'])->name('show-video');
        Route::post('/video-comment-store',[VideoController::class,'videoCommentStore'])->name('video-comment.store');
        Route::post('/video-comment-store-replay',[VideoController::class,'videoCommentStoreReplay'])->name('video-comment.store-replay');

        //Live Video
        Route::get('/live-video',[VideoController::class,'liveVideo'])->name('live-video');
        Route::get('/single-live-video/{id}',[VideoController::class,'singleLiveVideo'])->name('single-live-video');

        //Student Course Exam
        Route::resource('/exam',ExamController::class);
        Route::get('/exam-details/{id}/{unique_id?}',[ExamController::class,'examDetails'])->name('exam-details');
        Route::get('/show-exam/{unique_id?}',[ExamController::class,'showExam'])->name('show-exam');
        Route::post('/submit-questions',[ExamController::class,'submitQuestions'])->name('submit-questions');
        Route::get('/complete-question/{id}',[ExamController::class,'completeQuestions'])->name('complete-questions');

        //Progress Report
        Route::get('/progress',[ProgressController::class,'progress'])->name('progress.index');
    });

    //Complain Section
    Route::resource('/complain',ComplainController::class);

    //Student Profile
    Route::get('/profile-edit/{id}',[ProfileController::class,'profileEdit'])->name('profile.edit');
    Route::post('/profile-update/{id}',[ProfileController::class,'profileUpdate'])->name('profile.update');

    //Settings
    Route::get('/-account',[SettingController::class,'settingAccount'])->name('setting.account');
    Route::post('/change-email',[SettingController::class,'changeEmail'])->name('change-email');
    Route::post('/change-password',[SettingController::class,'changePassword'])->name('change-password');

    //Set Change Course Id
    Route::delete('/change-course/{id}',[DashboardController::class,'setStudentCourseId'])->name('change-course');

    //Notifications
    Route::group(['prefix'=>'notification','as'=>'notification.'],function(){
        Route::get('/read/{id}',[NotificationController::class,'read'])->name('read');
        Route::get('/all',[NotificationController::class,'all'])->name('all');
        Route::get('/unseen',[NotificationController::class,'unseen'])->name('unseen');
        Route::get('/seen',[NotificationController::class,'seen'])->name('seen');
    });

    //Invoice
    Route::get('/invoices',[InvoiceController::class,'allInvoice'])->name('invoice');
    Route::get('/invoices/details/{id}',[InvoiceController::class,'invoiceDetails'])->name('invoice.details');
});


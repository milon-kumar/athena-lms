<?php
use App\Http\Controllers\Backend\BusinessSettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChaperExamController;
use App\Http\Controllers\Backend\ChapterExamController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\ComplainController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CourseChapterController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\CourseDetailsController;
use App\Http\Controllers\Backend\CourseFetureController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DiscountController;
use App\Http\Controllers\Backend\EnrolmentController;
use App\Http\Controllers\Backend\ExamController;
use App\Http\Controllers\Backend\ExamDashboardController;
use App\Http\Controllers\Backend\ExamResultController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\LiveVideoController;
use App\Http\Controllers\Backend\OpinionController;
use App\Http\Controllers\Backend\PdfController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\TransferController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\VideoComment;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/slider',SliderController::class);
    Route::resource('/teacher',TeacherController::class);
    Route::get('/our-talk',[DashboardController::class,'ourTalk'])->name('our-talk');
    Route::resource('/opinion',OpinionController::class);

    Route::view('/form','backend.admin.pages.form.form')->name('form');
    Route::post('/form-submit',[DashboardController::class,'formSubmit'])->name('form-submit');

    //Category
    Route::resource('/category',CategoryController::class);

    //COURSE
    Route::resource('/course',CourseController::class);

    Route::resource('/contact',ContactController::class);
    Route::resource('/faq',FaqController::class);


    Route::group(['middleware'=>'course_id'],function (){
        //Preview Course
        Route::get('/preview-course',[CourseController::class,'previewCourse'])->name('course.preview-course');

        //Course Published & Disable
        Route::get('/published',[CourseController::class,'published'])->name('course.published');
        Route::get('/disable',[CourseController::class,'disable'])->name('course.disable');
        Route::resource('course-details',CourseDetailsController::class);

        //Change Course Free
        Route::get('/change-course-free',[CourseDetailsController::class,'changeCourseFree'])->name('change-course-free');
        Route::post('/update-course-free',[CourseDetailsController::class,'updateCourseFree'])->name('update-course-free');
        Route::get('/create-by-course/{id}',[CourseDetailsController::class,'createByCourse'])->name('create-by-course');

        //Chapters
        Route::resource('/chapters',CourseChapterController::class);

        //Video
        Route::resource('/video',VideoController::class);
        Route::get('/video-index/{id}',[VideoController::class,'videoIndex'])->name('video-index');
        Route::get('/video-create/{id}',[VideoController::class,'videoCreate'])->name('video-create');
        Route::get('/video-edit/{id}/{chapter_id?}',[VideoController::class,'videoEdit'])->name('video-edit');
        Route::get('/video-show/{id}/{chapter_id?}',[VideoController::class,'videoShow'])->name('video-show');

        //Live Video
        Route::resource('/live-video',LiveVideoController::class);
        Route::get('/chapter-exam/{id}',[ChapterExamController::class,'chapterExamIndex'])->name('chapter-exam-index');
        Route::get('/chapter-exam/create/{id}',[ChapterExamController::class,'chapterExamCreate'])->name('chapter-exam-create');
        Route::post('/chapter-exam/store',[ChapterExamController::class,'chapterExamStore'])->name('chapter-exam-store');
        Route::get('/chapter-exam/edit/{id}/{chapter_id?}',[ChapterExamController::class,'chapterExamEdit'])->name('chapter-exam-edit');
        Route::put('/chapter-exam/update/{id}',[ChapterExamController::class,'chapterExamUpdate'])->name('chapter-exam-update');
        Route::delete('/chapter-exam/delete/{id}',[ChapterExamController::class,'chapterExamDelete'])->name('chapter-exam-delete');


        //Course Copy
        Route::get('/course-copy',[CourseController::class,'courseCopy'])->name('course-copy');
        //Delete All Course Content
        Route::get('/course-delete',[CourseController::class,'courseDelete'])->name('course-delete');

        //FB Private Discussion Group
        Route::get('/fb-private-discussion-group',[CourseDetailsController::class,'fbPrivateDiscussionGroup'])->name('fb-private-discussion-group');

        //Edit Course Tags
        Route::resource('/pdf',PdfController::class);
        Route::get('/edit-course',[CourseController::class,'editCourse'])->name('course.edit-course');
        Route::get('/all-pdf/{type}',[PdfController::class,'lectureNotes'])->name('pdf.all-pdf');
        Route::get('/pdf-create/{type}',[PdfController::class,'pdfCreate'])->name('pdf.pdf-create');
        Route::post('/pdf-store',[PdfController::class,'pdfStore'])->name('pdf.pdf-store');

        //Post Section Start
        Route::resource('/post',PostController::class);

        //Comments
        Route::post('/post-comment-store',[CommentController::class,'postCommentStore'])->name('post.comment.store');
        Route::post('/post-comment-replay-store',[CommentController::class,'postCommentReplayStore'])->name('post.comment.replay.store');

        //Complain
        Route::resource('/complain',ComplainController::class);
        Route::resource('/student',StudentController::class);
        Route::get('/database-download',[StudentController::class,'databaseDownload'])->name('student.database-download');

        //Video Comment
        Route::resource('/video-comment',VideoComment::class);
        Route::post('/video-comment-replay',[VideoComment::class,'videoCommentStoreReplay'])->name('video-comment.store-replay');

        //Course Discount Card
        Route::resource('/discount',DiscountController::class);

        //Transfer Student
        Route::group(['prefix'=>'transfer','as'=>'transfer.'],function (){
            Route::get('/student',[TransferController::class,'transferStudent'])->name('student');
            Route::get('/remove/{id}',[TransferController::class,'remove'])->name('remove');
            Route::post('/suspend',[TransferController::class,'suspend'])->name('suspend');
            Route::post('/community-post',[TransferController::class,'communityPost'])->name('community-post');
            Route::get('/transfer/{id}',[TransferController::class,'transfer'])->name('transfer');
            Route::post('/transfer-store',[TransferController::class,'transferStore'])->name('transfer-store');
            Route::get('/profile/{id}',[TransferController::class,'profile'])->name('profile');
            Route::get('/email/{id}',[TransferController::class,'email'])->name('email');
            Route::post('/send-email',[TransferController::class,'sendEmail'])->name('send-email');
            Route::get('/admin.transfer.notification/{id}',[TransferController::class,'notification'])->name('notification');
            Route::post('/send-notification',[TransferController::class,'sendNotification'])->name('send-notification');
        });

        //Course Notification
        Route::get('/course-notification',[TransferController::class,'courseNotification'])->name('course-notification');
        Route::post('/course-notification',[TransferController::class,'courseNotificationSend']);

        //Add Edit Course Content
        Route::resource('/course-feture',CourseFetureController::class);

        //Exam Result
        Route::resource('/exam-result',ExamResultController::class);

        //Facebook Group Access Code
        Route::get('/fb-group-access-code',[StudentController::class,'fbGroupAccessCode'])->name('fb-group-access-code');
        Route::delete('/fb-group-access-code/delete/{id}',[StudentController::class,'fbGroupAccessCodeDelete'])->name('fb-group-access-code.delete');

        //Class Attendance
        Route::get('/class-attendance',[StudentController::class,'classAttendance'])->name('class-attendance');
    });

    //Enrol Course
    Route::get('/enrole',[EnrolmentController::class,'enrole'])->name('enrole.approve');
    Route::get('/enrole-approve/{id}',[EnrolmentController::class,'enroleApprove'])->name('enrole-approve');
    Route::get('/enrole-decline/{id}',[EnrolmentController::class,'enroleDecline'])->name('enrole-decline');

    //All User
    Route::resource('/user',UserController::class);

    //Role Management
    Route::resource('/role',RoleController::class);

    //Exam Management
    Route::group(['prefix'=>'exam','as'=>'exam.'],function (){
        Route::get('/dashboard',[ExamDashboardController::class,'dashboard'])->name('dashboard');
        Route::get('/create-exam',[ExamController::class,'createExam'])->name('create-exam');

        Route::get('/setting/{type}',[ExamDashboardController::class,'setting'])->name('setting');
        Route::resource('/exam',ExamController::class);
        Route::get('/question-edit/{id}',[ExamController::class,'questionEdit'])->name('question.edit');
        Route::put('/question-update/{id}',[ExamController::class,'questionUpdate'])->name('question.update');
    });

    //All Settings
    Route::get('/setting-index',[BusinessSettingController::class,'index'])->name('setting.index');
    Route::get('/account',[BusinessSettingController::class,'account'])->name('setting.account');
    Route::post('/change-email',[BusinessSettingController::class,'changeEmail'])->name('setting.change-email');
    Route::post('/change-password',[BusinessSettingController::class,'changePassword'])->name('setting.change-password');
    Route::get('/setting-basic',[BusinessSettingController::class,'basicSetting'])->name('setting.basic');
    Route::get('/profile',[BusinessSettingController::class,'profile'])->name('setting.profile');
    Route::get('/profile-edit/{id}',[BusinessSettingController::class,'profileEdit'])->name('setting.profile.edit');
    Route::post('/profile-update/{id}',[BusinessSettingController::class,'profileUpdate'])->name('setting.profile.update');

    //Footer Setting
    Route::get('/footer-info',[BusinessSettingController::class,'footerInfo'])->name('setting.footer-info');
    Route::get('/our-services',[BusinessSettingController::class,'ourServices'])->name('setting.our-services');
    Route::get('/refund-policy',[BusinessSettingController::class,'refundPolicy'])->name('setting.refund-policy');
    Route::get('/privacy-policy',[BusinessSettingController::class,'privacyPolicy'])->name('setting.privacy-policy');
    Route::get('/rules',[BusinessSettingController::class,'rules'])->name('setting.rules');
    Route::get('/community',[BusinessSettingController::class,'community'])->name('setting.community');
    Route::get('/how-to-buy',[BusinessSettingController::class,'howToBuy'])->name('setting.how-to-buy');
    Route::get('/service-info',[BusinessSettingController::class,'serviceInfo'])->name('setting.service-info');
    Route::get('/disclaimer',[BusinessSettingController::class,'disclaimer'])->name('setting.disclaimer');
    Route::get('/notice-board',[BusinessSettingController::class,'noticeBoard'])->name('setting.notice-board');
    Route::get('/join-as-teacher',[BusinessSettingController::class,'joinAsTeacher'])->name('setting.join-as-teacher');
    Route::get('/carrier',[BusinessSettingController::class,'carrier'])->name('setting.carrier');
    Route::get('/drop-cv',[BusinessSettingController::class,'dropCv'])->name('setting.drop-cv');
    Route::get('/invoice-content',[BusinessSettingController::class,'invoiceContent'])->name('setting.invoice-content');

    //Setting Start
    Route::group(['prefix'=>'setting','as'=>'setting.'],function (){
        Route::post('/update',[BusinessSettingController::class,'update'])->name('update');
        Route::post('/web-controls',[BusinessSettingController::class,'webControls'])->name('web-controls');
        Route::post('/edit-course',[BusinessSettingController::class,'editCourse'])->name('edit-course');
    });
});

//Ajax
Route::post('/set-course-id',[DashboardController::class,'setCourseId'])->name('set-course-id');
Route::post('/set-chapter-id',[CourseChapterController::class,'setChapterId'])->name('set-chapter-id');
Route::post('/editor-image-upload',[DashboardController::class,'editorImageUpload'])->name('editor.image.upload');
Route::get('/exam-link/{id}',[ExamController::class,'publishLink'])->name('exam-publishlink');

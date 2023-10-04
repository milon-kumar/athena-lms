<?php

use App\Http\Controllers\Backend\CourseController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin/main', 'as' => 'admin.main.','middleware'=>['auth','admin']], function () {
    Route::get('/main-all-course',[CourseController::class,'mainAllCourse'])->name('main-all-course');
    Route::get('/show/{slug}',[CourseController::class,'mainCourseShow'])->name('show');
});


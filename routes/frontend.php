<?php

use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\EnroleController;
use App\Http\Controllers\Frontend\HomeContoller;
use Illuminate\Support\Facades\Route;

Route::group(['as'=>'frontend.'],function (){
    Route::get('/v1',function (){
        return redirect()->route('frontend.v2.home');
    })->name('home');
    Route::get('/details/{slug}',[CourseController::class,'details'])->name('details');
    Route::get('/instructor',[HomeContoller::class,'allInstructor'])->name('instructor');
    //Enrol
    Route::get('/enrole/{slug}',[EnroleController::class,'enrole'])->name('enrole');
    Route::post('/enrole-store',[EnroleController::class,'storeEnrole'])->name('enrole.store');
    Route::get('/complete-enrole/{id}',[EnroleController::class,'completeEnrole'])->name('complete-enrole');
});

Route::group(['as'=>'frontend.v2.'],function(){
    Route::get('/',[HomeContoller::class,'home'])->name('home');
    Route::get('/all-course/{all}',[HomeContoller::class,'allCourse'])->name('all-course');
    Route::get('/details/{slug}',[HomeContoller::class,'details'])->name('details');
    Route::get('/video/{id}/{slug}',[HomeContoller::class,'video'])->name('video');


    Route::get('/proceed-payment',[EnroleController::class,'proceedPayment'])->name('proceedPayment');

    Route::post('/apply-copon',[HomeContoller::class,'applyCopon'])->name('apply-copon');

    Route::get('/instructors',[HomeContoller::class,'instructors'])->name('instructors');

    Route::get('/our-services',[HomeContoller::class,'ourServices'])->name('our-services');
    Route::get('/refund-policy',[HomeContoller::class,'refundPolicy'])->name('refund-policy');
    Route::get('/privacy-policy',[HomeContoller::class,'privacyPolicy'])->name('privacy-policy');
    Route::get('/rules',[HomeContoller::class,'rules'])->name('rules');
    Route::get('/community',[HomeContoller::class,'community'])->name('community');

    Route::get('/disclaimer',[HomeContoller::class,'disclaimer'])->name('disclaimer');
    Route::get('/notice-board',[HomeContoller::class,'noticeBoard'])->name('notice-board');
    Route::get('/join-as-teacher',[HomeContoller::class,'joinAsTeacher'])->name('join-as-teacher');
    Route::get('/carrier',[HomeContoller::class,'carrier'])->name('carrier');
    Route::get('/drop-cv',[HomeContoller::class,'dropCv'])->name('drop-cv');

    Route::get('/contact',[HomeContoller::class,'contact'])->name('contact');
    Route::post('/contact-message',[HomeContoller::class,'contactMessage'])->name('contact-message');

    Route::get('/faq',[HomeContoller::class,'faq'])->name('faq');
});

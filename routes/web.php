<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    if (Auth::user()->type == 'super_admin'||Auth::user()->type == 'admin'){
        return redirect()->route('admin.dashboard');
    }elseif (Auth::user()->type == 'student'){
        return redirect()->route('student.dashboard');
    }else{
        toast('Access Denied','error');
        return redirect()->back();
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get("/cc", function (){
    \App\Models\Comment::create([
        'user_id' => Auth::id(),
        'course_id'=>courseId(),
        'commentable_id' => 1,
        'commentable_type' => "App\\Models\\Post",
        'message' => 'thsi si my alkasdjfl alskdfjlskad alskdfjlasd fsaldfkaslfd lasfjdlskadjf'
    ]);
});


Route::get('/check',function (){
    return ;

    //return \App\Models\User::with(['roles','roles.permissions'])->findOrFail(Auth::id());
});



require __DIR__ . '/auth.php';

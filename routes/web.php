<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Deo\ManageProgramController;

use App\Http\Controllers\Trainee\ModuleWiseController;
use App\Http\Controllers\Trainee\EnrolledProgramsController;
use App\Http\Controllers\CourseDirector\ApproveProgramController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/send-otp', [LoginController::class, 'sendOTP'])->name('sendOTP');
Route::post('/verify-otp', [LoginController::class, 'verifyOTP'])->name('verifyOTP');
//Route::post('/all-programs', [DashboardController::class, 'getAllCourse'])->name('allCourse');
Route::get('/course/{courseId}/programs', [DashboardController::class, 'getRelatedPrograms'])->name('get.programs');

Route::group(['prefix'=>'account'],function(){
    //guest middleware
    Route::group(['middleware'=>'guest'],function(){

        Route::post('/authenticate',[LoginController::class,'authenticate'])->name('authenticate');
        Route::post('/account/process-register',[LoginController::class,'processRegister'])->name('processRegister');
    });
    //auth middleware

});

Route::group(['middleware'=>'useradmin'],function(){

    Route::group(['middleware'=>'admin'],function(){
        Route::get('/admin/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
    });
    Route::group(['middleware'=>'deo'],function(){
        Route::get('/deo/dashboard',[DashboardController::class,'dashboard'])->name('deo.dashboard');
        Route::get('/deo/manage-program',[ManageProgramController::class,'index'])->name('deo.manageProgram');
        Route::post('/deo/allCourse',[ManageProgramController::class,'getAllCourse'])->name('deo.allCourse');
        Route::post('/deo/allPrograms',[ManageProgramController::class,'getAllPrograms'])->name('deo.allPrograms');
        Route::post('/deo/allDates',[ManageProgramController::class,'getAllDates'])->name('deo.allDates');
        Route::post('/deo/saveProgram',[ManageProgramController::class,'saveProgram'])->name('deo.saveProgram');

        Route::get('/programs/{id}/edit', [ManageProgramController::class, 'edit'])->name('programs.edit');
        Route::put('/programs/{id}', [ManageProgramController::class, 'update'])->name('programs.update');
        Route::delete('/programs/{id}', [ManageProgramController::class, 'destroy'])->name('programs.destroy');
        Route::post('/programs/{id}/approve', [ManageProgramController::class, 'sendToApprove'])->name('programs.approve');
    });
    Route::group(['middleware'=>'trainee'],function(){
        Route::get('/trainee/dashboard',[DashboardController::class,'dashboard'])->name('trainee.dashboard');
        Route::get('/trainee/dashboard',[ModuleWiseController::class,'index'])->name('trainee.ModuleWise');
        Route::get('/module/{courseId}/programs', [ModuleWiseController::class, 'getRelatedPrograms'])->name('fetch.programs');
        Route::post('/program/details', [ModuleWiseController::class, 'getProgramDetails'])->name('get.program.details');
        Route::post('/subject/details', [ModuleWiseController::class, 'getAllSubjects'])->name('fetch.allSubjects');
        Route::post('/topic/details', [ModuleWiseController::class, 'getAllTopics'])->name('fetch.allTopics');
        Route::post('/request-toEntoll', [ModuleWiseController::class, 'requestToEnroll'])->name('requestToEnroll');
        Route::get('/enrolled-programs', [EnrolledProgramsController::class, 'getEnrolledPrograms'])->name('get.enrolledPrograms');
    });
    Route::group(['middleware'=>'cd'],function(){
        Route::get('/courseDirector/dashboard',[DashboardController::class,'dashboard'])->name('cd.dashboard');
        Route::get('/courseDirector/all-program',[ApproveProgramController::class,'index'])->name('cd.allProgram');
        Route::post('/courseDirector/programs',[ApproveProgramController::class,'getPrograms'])->name('cd.getPrograms');
        Route::post('/courseDirector/aprove-programs',[ApproveProgramController::class,'approveProgram'])->name('cd.approveProgram');

    });
    Route::group(['middleware'=>'monitor'],function(){
        Route::get('/monitorCell/dashboard',[DashboardController::class,'dashboard'])->name('monitor.dashboard');
    });

    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});




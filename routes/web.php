<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ManageApplicantController;
use App\Http\Controllers\SignaturePadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
Route::get('/', function () {
    return view('welcome');
});

Route::get('/template', function () {
    return view('index');
});
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //JOBS
    Route::get('/jobs', [JobController::class, 'user_index'])->name('user.jobs.index');
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
    Route::get('/jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply');
    Route::get('/jobs-applied', [JobApplicationController::class, 'index'])->name('jobs.applied');
    Route::get('/signature/{jobApplicationId}', [SignaturePadController::class, 'index'])->name('user.signature');
    Route::post('/signature/{jobApplicationId}', [SignaturePadController::class, 'upload'])->name('signature.upload');

    //PROFILE
    Route::get('/profile', [ProfileController::class, 'create'])->name('user.profile.create');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('user.profile.store');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('user.profile.update');
    
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    //JOBS
    Route::get('/admin/jobs', [JobController::class, 'index'])->name('admin.jobs.index');
    Route::get('/admin/addjobs', [JobController::class, 'create'])->name('admin.jobs.create');
    Route::post('/admin/addjobs', [JobController::class, 'store'])->name('admin.jobs.store');
    Route::get('/admin/job-applications', [JobApplicationController::class, 'adminIndex'])->name('admin.jobs.applications');

    //Link by Status
    Route::get('/admin/job-applications/offered', [JobApplicationController::class, 'adminIndex'])->name('admin.jobs.offered');

    Route::get('/admin/job/{job}', [JobController::class, 'showAdmin'])->name('admin.jobs.show');
    Route::get('/admin/job/{job}/edit', [JobController::class, 'edit'])->name('admin.jobs.edit');
    Route::post('/admin/job/{job}/edit', [JobController::class, 'update'])->name('admin.jobs.update');
    Route::get('/admin/job/{job}/delete', [JobController::class, 'destroy'])->name('admin.jobs.delete');

    //SHOW DETAILS OF CANDIDATE
    Route::get('admin/profile/{user_id}/job-application/{jobApplicationId}', [ProfileController::class, 'showApplicant'])->name('admin.show.applicant');

    //MANAGE APPLICATIONS
    Route::get('admin/reject-application/{jobApplicationId}', [ManageApplicantController::class, 'reject'])->name('admin.reject.applicant');
    Route::get('admin/manage-interview/{jobApplicationId}', [ManageApplicantController::class, 'manageInterview'])->name('admin.manage.interview');
    Route::post('admin/manage-interview/{jobApplicationId}', [ManageApplicantController::class, 'storeInterview'])->name('admin.store.interview');
    Route::get('admin/generate-offer-letter/{jobApplicationId}', [ManageApplicantController::class, 'generateOfferLetter'])->name('admin.generate.offerletter');
});

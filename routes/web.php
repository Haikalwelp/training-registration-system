<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/traininglist', [App\Http\Controllers\TrainingController::class, 'getTrainingList'])->name('admin.training-list');
    Route::get('/admin/training-form', [App\Http\Controllers\TrainingController::class, 'getTrainingForm'])->name('admin.training-form');
    Route::post('/admin/add-training', [App\Http\Controllers\TrainingController::class, 'postAddTraining'])->name('admin.add-training');
    Route::get('/admin/edit-training-form/{id}', [App\Http\Controllers\TrainingController::class, 'getEditTrainingForm'])->name('admin.edit-training-form');
    Route::put('/admin/edit-training/{id}', [App\Http\Controllers\TrainingController::class, 'putEditTraining'])->name('admin.edit-training');
    Route::delete('/admin/delete-training/{id}', [App\Http\Controllers\TrainingController::class, 'deleteTraining'])->name('admin.delete-training');
    Route::get('/user/training-list', [App\Http\Controllers\TrainingRegistrationController::class, 'getTrainingList'])->name('user.training-list');
    Route::get('/user/registration-form/{id}', [App\Http\Controllers\TrainingRegistrationController::class, 'getRegisterTrainingForm'])->name('user.registration-form');
    Route::post('/user/register-training', [App\Http\Controllers\TrainingRegistrationController::class, 'postRegisterTraining'])->name('user.register-training');
    Route::get('/user/user-dashboard', [\App\Http\Controllers\TrainingRegistrationController::class, 'getRegisteredTraining'])->name('user.user-dashboard');
    Route::get('/admin/manage-registration', [\App\Http\Controllers\TrainingRegistrationController::class, 'getManageRegistration'])->name('admin.manage-registration');
    Route::patch('/admin/edit-registration-status/{id}', [\App\Http\Controllers\TrainingRegistrationController::class, 'patchEditRegistrationStatus'])->name('admin.edit-registration-status');


    
});


require __DIR__.'/auth.php';

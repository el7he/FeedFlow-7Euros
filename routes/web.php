<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\OrganizationController;

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
    Route::resource('surveys', SurveyController::class);
    Route::get('/surveys/create', [SurveyController::class, 'create'])->name('surveys.create');
    Route::post('/surveys/store', [SurveyController::class, 'store'])->name('surveys.store');
    Route::get('/organization', [OrganizationController::class, 'index'])->name('organization.index');
    Route::get('/organization/all', [OrganizationController::class, 'all'])->name('organization.all');
    Route::get('/organization/switch/{organization}', [OrganizationController::class, 'switch'])->name('organization.switch');
    Route::get('/organization/join/{organization}', [OrganizationController::class, 'join'])->name('organization.join');
    Route::get('/organization/create', [OrganizationController::class, 'formView'])->name('organization.create');
    Route::post('/organization/store', [OrganizationController::class, 'store'])->name('organization.store');
    Route::post('/organization/add_user', [OrganizationController::class, 'add_user_in_organization'])->name('organization.add_user');
    Route::get('/organization/delete/{organization}', [OrganizationController::class, 'delete'])->name('organization.delete');
    Route::get('/organization/rename', [OrganizationController::class, 'formRename'])->name('organization.rename');
    Route::post('/organization/rename', [OrganizationController::class, 'rename'])->name('organization.rename');

});

require __DIR__.'/auth.php';

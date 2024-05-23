<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DelegateController;
use App\Http\Controllers\ExhibitorDelegatesController;
use App\Http\Controllers\StallManningController;
use Illuminate\Support\Facades\Route;

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
});

Route::middleware('auth')->group(function () {
    Route::get('/event_update', [EventController::class, 'edit'])->name('event.edit');
    Route::patch('/event_update', [EventController::class, 'update'])->name('event.update');
});

require __DIR__.'/auth.php';
//Route::middleware('guest')->group(function () {
    Route::get('/newExhibitor', [FormController::class, 'form'])->name('exhibitor.create');
    Route::post('/newExhibitorStore', [FormController::class, 'submit'])->name('exhibitor.submit');
// });


Route::get('/newdelegate', [DelegateController::class, 'show'])->name('delegate.create');


//Route::get('/portal', [App\Http\Controllers\ExhibitorController::class, 'view'])->name('portal');

//exhibitorController -->harsh
// Route::get('portal/exhibitor', [App\Http\Controllers\ExhibitorController::class, 'getAllExhibitor'])->name('get_all_exhibitor');
Route::get('portal/exhibitor', [App\Http\Controllers\ExhibitorController::class, 'getOneExhibitor'])->name('get_one_exhibitor');
Route::post('portal/exhibitor', [App\Http\Controllers\ExhibitorController::class, 'postExhibitor'])->name('post_exhibitor');
Route::put('portal/exhibitor', [App\Http\Controllers\ExhibitorController::class, 'updateExhibitor'])->name('update_exhibitor');

//stallManningController -->harsh
Route::get('portal/getStallManning', [StallManningController::class, 'getStallManning'])->name('get_StallManning');
Route::put('portal/editStallManning', [App\Http\Controllers\StallManningController::class, 'updateStallManning'])->name('edit_StallManning');
Route::post('portal/submitStallManningData', [App\Http\Controllers\StallManningController::class, 'postStallManning'])->name('post_StallManning');


//ExhibitorDirectoryController -->harsh
Route::get('portal/getexhibitorDirectory', [App\Http\Controllers\ExhibitorDirectoryController::class, 'getExhibitorDirectory'])->name('get_ExhibitorDirectory');
Route::put('portal/editExhibitorDirectory', [App\Http\Controllers\ExhibitorDirectoryController::class, 'updateExhibitorDirectory'])->name('edit_ExhibitorDirectory');
Route::post('portal/submitExhibitorDirectoryData', [App\Http\Controllers\ExhibitorDirectoryController::class, 'postExhibitorDirectory'])->name('post_ExhibitorDirectory');


//ExhibitorDelegateController -->harsh
Route::get('portal/getExhibitorDelegate', [App\Http\Controllers\ExhibitorDelegatesController::class, 'getExhibitorDelegate'])->name('get_ExhibitorDelegate');
Route::put('portal/editExhibitorDelegate', [App\Http\Controllers\ExhibitorDelegatesController::class, 'updateExhibitorDelegate'])->name('edit_ExhibitorDelegate');
Route::post('portal/submitExhibitorDelegateData', [App\Http\Controllers\ExhibitorDelegatesController::class, 'postExhibitorDelegate'])->name('post_ExhibitorDelegate');

//Portal Login post
Route::get('/portal', function () {
    return view('portal.pages.dashboard');
})->middleware(['auth', 'verified'])->name('portal');

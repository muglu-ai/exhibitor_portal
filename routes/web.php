<?php

use App\Http\Controllers\CashfreePaymentController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

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
//    Route::get('preview', [FormController::class, 'previewExhibitor'])->name('exhibitor.preview');
    Route::get('/previewExhibitor', [FormController::class,'previewExhibitor'])->name('preview.exhibitor');
    //payment page
    Route::get('/payment', [FormController::class, 'paymentPage'])->name('paymentPage');
// });

//payment gateway
//Route::get('/payment', [CashfreePaymentController::class, 'index'])->name('payment');
//rout to payment gateway paymentPage
Route::post('/newpayment', [FormController::class, 'paymentPage'])->name('paymentPage');

Route::post('/paynow', [CashfreePaymentController::class, 'paynow'])->name('paynow');

Route::post('/payment', [CashfreePaymentController::class, 'createOrder'])->name('createOrder');


Route::get('/newdelegate', [DelegateController::class, 'show'])->name('delegate.create');

//payment redirect 1
Route::get('/pay', [CashfreePaymentController::class, 'paymentRedirect'])->name('paymentRedirect');

//paymnent success
Route::get('/payment/success', [FormController::class, 'paymentSuccess'])->name('paymentSuccess');
// Route::get('/portal', [App\Http\Controllers\ExhibitorController::class, 'view'])->name('portal');

//exhibitorController -->harsh
// Route::get('portal/exhibitor', [App\Http\Controllers\ExhibitorController::class, 'getAllExhibitor'])->name('get_all_exhibitor');
Route::middleware('auth')->group(function () {

Route::get('portal/exhibitor', [App\Http\Controllers\ExhibitorController::class, 'getOneExhibitor'])->name('get_one_exhibitor');
Route::post('portal/exhibitor', [App\Http\Controllers\ExhibitorController::class, 'postExhibitor'])->name('post_exhibitor');
Route::patch('portal/exhibitor/{exhibitor_id}', [App\Http\Controllers\ExhibitorController::class, 'update'])->name('exhibitor.update');

//stallManningController -->harsh
Route::get('portal/getStallManning', [StallManningController::class, 'getStallManning'])->name('get_StallManning');
Route::put('portal/editStallManning', [App\Http\Controllers\StallManningController::class, 'updateStallManning'])->name('edit_StallManning');
Route::post('portal/submitStallManningData', [App\Http\Controllers\StallManningController::class, 'postStallManning'])->name('post_StallManning');

Route::get('/portal', [App\Http\Controllers\ExhibitorController::class, 'getExhibitorData'])->name('portal');


//ExhibitorDirectoryController -->harsh
Route::get('portal/getexhibitorDirectory', [App\Http\Controllers\ExhibitorDirectoryController::class, 'getExhibitorDirectory'])->name('get_ExhibitorDirectory');
Route::put('portal/editExhibitorDirectory', [App\Http\Controllers\ExhibitorDirectoryController::class, 'updateExhibitorDirectory'])->name('edit_ExhibitorDirectory');
Route::post('portal/submitExhibitorDirectoryData', [App\Http\Controllers\ExhibitorDirectoryController::class, 'postExhibitorDirectory'])->name('post_ExhibitorDirectory');


//ExhibitorDelegateController -->harsh
Route::get('portal/getExhibitorDelegate', [App\Http\Controllers\ExhibitorDelegatesController::class, 'getExhibitorDelegate'])->name('get_ExhibitorDelegate');
Route::put('edit_ExhibitorDelegate/{email}', [App\Http\Controllers\ExhibitorDelegatesController::class, 'updateExhibitorDelegate'])->name('edit_ExhibitorDelegate');
Route::post('portal/submitExhibitorDelegateData', [App\Http\Controllers\ExhibitorDelegatesController::class, 'postExhibitorDelegate'])->name('post_ExhibitorDelegate');

//DelegateInvitation
Route::post('portal/send-invitation', [App\Http\Controllers\InvitationController::class, 'sendInvitation'])->name('send_invitation');
Route::post('/resend-invitation/{email}', [App\Http\Controllers\InvitationController::class, 'resendInvitation'])->name('resend_invitation');
Route::delete('/cancel-invitation/{email}', [App\Http\Controllers\InvitationController::class, 'cancelInvitation'])->name('cancel_invitation');

});
//Portal Login post
// Route::get('/portal', function () {
//    return view('portal.pages.dashboard');
// })->middleware(['auth', 'verified'])->name('portal');
Route::get('/delegate-form/{token}', [App\Http\Controllers\InvitationController::class, 'showDelegateForm'])->name('delegate_form');
Route::post('/delegate-form/{token}', [App\Http\Controllers\InvitationController::class, 'submitDelegateForm'])->name('submit_delegate_form');

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ParentPaymentController;

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

require __DIR__.'/auth.php';

/*Route::get('admin/dashboard', [HomeController::class, 'index']);
Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('admin/manage-payments', [PaymentController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.manage-payments');
Route::get('admin/students/{student}/bills', [PaymentController::class, 'manageBills'])->name('admin.students.manage-bills');
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/manage-payments', [PaymentController::class, 'index'])->name('admin.manage-payments');
    Route::get('admin/students/{student}/bills', [PaymentController::class, 'manageBills'])->name('admin.students.manage-bills');
    Route::get('admin/students/{student}/bills/create', [PaymentController::class, 'createBill'])->name('admin.students.create-bill');
    Route::post('admin/students/{student}/bills', [PaymentController::class, 'storeBill'])->name('admin.students.store-bill');
    Route::get('admin/students/{student}/bills/edit', [PaymentController::class, 'editBills'])->name('admin.students.edit-bills');
    Route::patch('admin/students/{student}/bills', [PaymentController::class, 'updateBills'])->name('admin.students.update-bills');
    Route::delete('admin/students/{student}/bills/{bill}', [PaymentController::class, 'destroyBill'])->name('admin.students.destroy-bill');
});

Route::middleware(['auth'])->group(function () {
    Route::get('parent/manage-payments', [ParentPaymentController::class, 'index'])->name('parent.manage-payments');
    Route::post('parent/search-students', [ParentPaymentController::class, 'searchStudents'])->name('parent.search-students');
    Route::get('parent/students/{student}/payment', [ParentPaymentController::class, 'paymentPage'])->name('parent.payment-page');
    Route::post('parent/students/{student}/payment', [ParentPaymentController::class, 'processPayment'])->name('parent.process-payment');
});

//Route::get('parent/manage-payments', [ParentPaymentController::class, 'index']);

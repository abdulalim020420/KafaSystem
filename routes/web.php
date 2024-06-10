<?php

use App\Http\Controllers\BulletinController;

Route::resource('bulletins', BulletinController::class);

Route::get('bulletins', [BulletinController::class, 'index'])->name('bulletins.index');
Route::get('bulletins/{id}', [BulletinController::class, 'show'])->name('bulletins.show');
Route::get('teacher/bulletins', [BulletinController::class, 'teacherindex'])->name('bulletins.teacher_bulletin');



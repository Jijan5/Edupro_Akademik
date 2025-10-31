<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
// Route::get('/pendaftaran', function () {
//     return view('pendaftaran');
// });
Route::get('/admin', [UserController::class, 'index']);
// Route::get('/admin', function () {
//     return view('admin/admin');
// });
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::get('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
Route::get('/admin/export/pdf', [AdminController::class, 'exportPdf'])->name('admin.export.pdf');
Route::get('/admin/export/excel', [AdminController::class, 'exportExcel'])->name('admin.export.excel');
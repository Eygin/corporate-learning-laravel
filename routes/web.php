<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\materiController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\ProfileController;
use App\Models\MateriFile;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'index']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/doRegister', [AuthController::class, 'doRegister'])->name('doRegister');
Route::post('/doLogin', [AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/doLogout', [AuthController::class, 'doLogout'])->name('doLogout');
Route::middleware(['auth'])->group(function () {
    Route::get('/setting', [ProfileController::class, 'index'])->name('setting');
    Route::post('/setting/change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
    Route::get('/member', [memberController::class, 'index']);
    Route::get('/member/add', [memberController::class, 'create']);
    Route::post('/member/store', [memberController::class, 'store']);
    Route::get('/member/{id?}/edit', [memberController::class, 'edit']);
    Route::put('/member/{id?}', [memberController::class, 'update']);
    Route::get('/member/{id?}/delete', [memberController::class, 'destroy']);
    Route::get('/kategori', [kategoriController::class, 'index']);
    Route::get('/kategori/add', [kategoriController::class, 'create']);
    Route::post('/kategori/store', [kategoriController::class, 'store']);
    Route::get('/kategori/{uuid?}/edit', [kategoriController::class, 'edit']);
    Route::put('/kategori/{uuid?}', [kategoriController::class, 'update']);
    Route::get('/kategori/{uuid?}/delete', [kategoriController::class, 'destroy']);
    Route::get('/materi', [materiController::class, 'index']);
    Route::get('/materi/add', [materiController::class, 'create']);
    Route::post('/materi/store', [materiController::class, 'store']);
    Route::get('/materi/{uuid?}/edit', [materiController::class, 'edit']);
    Route::get('/materi/{uuid?}/show', [materiController::class, 'show']);
    Route::put('/materi/{uuid?}', [materiController::class, 'update']);
    Route::get('/materi/file/{uuid?}/delete', [materiController::class, 'deleteMateri']);
    Route::get('/materi/show-pdf/{uuid}', function($uuid) {
        $file = MateriFile::where('materi_file_id', $uuid)->first();
        $path = public_path().'/upload/pdf/'.$file->path;
        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$file->path.'"'
        ]);
    })->name('show-pdf');
});
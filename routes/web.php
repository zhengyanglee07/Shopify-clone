<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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

Route::get('/store-login', function () {
    return view('admin.storeLogin');
});

Auth::routes();

Route::get('/register/{roles}', function ($roles) {
    return view('auth.register')->with('roles', $roles);
});

// Check whether user's email already exists
Route::get('/lookup/{roles}', function ($roles) {
    return view('auth.lookup')->with('roles', $roles);
})->middleware('email')->name('lookup');


Route::get('/account-setup/{id}', function ($id) {
    return view('admin.accountSetup');
});

Route::get('/admin/{storeName}', function ($storeName) {
    return view('admin.admin')->with('storeName', $storeName);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('site/{storeName}', function ($storeName) {
    return view('site.site')->with('storeName', $storeName);
});

Route::get('/{any}', [App\Http\Controllers\ErrorPagesController::class, 'index'])
    ->where('any', '.*');

// Route::get('/upload-file', [FileUpload::class, 'createForm']);
// Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
// // Route::get('upload_file', function () {
//     return view('upload');
// });


// Route::post('store_file', [App\Http\Controllers\FileUploadController::class, 'fileStore']);
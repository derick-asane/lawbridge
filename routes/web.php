<?php

use App\Http\Controllers\MycaseController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AuthenticateMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\CourtDateController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FileController;





Route::get('/', function () {
    return view('landing');
});




// Show login form
Route::get('/login', [AuthController::class, 'create'])->name('loginform');

// Handle login form submission
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




//register controller

//show the registration form
Route::get('/register', [RegisterController::class, 'create'])->name('registerform');
Route::post('/register', [RegisterController::class, 'store'])->name('storeuser');


Route::get('/home', function () {
    return view('client.home');
})->name('client.home')->middleware('auth');



//mycase routes here ...
Route::get('/case', [MycaseController::class, 'index'])->name('client.case');
Route::get('/caseform', [MycaseController::class, 'create'])->name('caseForm');
Route::post('/createcase', action: [MycaseController::class, 'store'])->name('storecase');
Route::get('/case/{mycase}/detail', [MycaseController::class, 'show'])->name('show.case');



//court routes here ...
Route::get('/court', [CourtController::class, 'index'])->name('admin.court');
Route::get('/courtform', [CourtController::class, 'create'])->name('courtForm');
Route::post('/createcourt', action: [CourtController::class, 'store'])->name('store.court');
Route::get('/court/{court}/edit', [CourtController::class, 'edit'])->name('courteditForm');


// courtDate routes here ...
Route::get('/courtdate', [CourtDateController::class, 'index'])->name('admin.courtdate');
Route::get('/courtdateform', [CourtDateController::class, 'create'])->name('admin.courtdateForm');
Route::post('/createcourtdate', action: [CourtDateController::class, 'store'])->name('store.courtdate');
Route::get('/courtdate/{id}/edit', [CourtDateController::class, 'edit'])->name('courtdateeditForm');
Route::put('/courtdate/{id}/updatecourtdate', [CourtDateController::class, 'update'])->name('updatecourtdate');


// FILE routes here ...

Route::get('/mycase/{mycase}/pdfFile', [FileController::class, 'getPdfForm'])->name('client.pdfForm');
Route::post('/mycase/{id}/upload-pdf', [FileController::class, 'storePdfForm'])->name('upload.pdf');

Route::get('/mycase/{mycase}/imageFile', [FileController::class, 'getImageForm'])->name('client.imageForm');
Route::post('/mycase/{id}/upload-image', [FileController::class, 'storeImageForm'])->name('upload.image');









//admin

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('admin/getusers', [AdminDashboardController::class, 'getUsers'])->name('admin.getuser');
Route::get('admin/getcases', [AdminDashboardController::class, 'getCases'])->name('admin.getcases');
Route::get('admin/case/{mycase}/detail', [AdminDashboardController::class, 'showCase'])->name('admin.showcase');


Route::get('/mycourtdate', [CourtDateController::class, 'getUserCourtDate'])->name('client.courtdate');





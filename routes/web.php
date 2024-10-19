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
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PaymentController;







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
Route::get('/case', [MycaseController::class, 'index'])->name('client.case')->middleware('auth');
Route::get('/caseform', [MycaseController::class, 'create'])->name('caseForm')->middleware('auth');
Route::post('/createcase', action: [MycaseController::class, 'store'])->name('storecase')->middleware('auth');
Route::get('/case/{mycase}/detail', [MycaseController::class, 'show'])->name('show.case')->middleware('auth');



//court routes here ...
Route::get('/court', [CourtController::class, 'index'])->name('admin.court')->middleware('auth');
Route::get('/courtform', [CourtController::class, 'create'])->name('courtForm')->middleware('auth');
Route::post('/createcourt', action: [CourtController::class, 'store'])->name('store.court')->middleware('auth');
Route::get('/court/{court}/edit', [CourtController::class, 'edit'])->name('courteditForm')->middleware('auth');


// courtDate routes here ...
Route::get('/courtdate', [CourtDateController::class, 'index'])->name('admin.courtdate')->middleware('auth');
Route::get('/courtdateform', [CourtDateController::class, 'create'])->name('admin.courtdateForm')->middleware('auth');
Route::post('/createcourtdate', action: [CourtDateController::class, 'store'])->name('store.courtdate')->middleware('auth');
Route::get('/courtdate/{id}/edit', [CourtDateController::class, 'edit'])->name('courtdateeditForm')->middleware('auth');
Route::put('/courtdate/{id}/updatecourtdate', [CourtDateController::class, 'update'])->name('updatecourtdate')->middleware('auth');


// FILE routes here ...

Route::get('/mycase/{mycase}/pdfFile', [FileController::class, 'getPdfForm'])->name('client.pdfForm')->middleware('auth');
Route::post('/mycase/{id}/upload-pdf', [FileController::class, 'storePdfForm'])->name('upload.pdf')->middleware('auth');

Route::get('/mycase/{mycase}/imageFile', [FileController::class, 'getImageForm'])->name('client.imageForm')->middleware('auth');
Route::post('/mycase/{id}/upload-image', [FileController::class, 'storeImageForm'])->name('upload.image')->middleware('auth');



//client meeting routes
Route::get('/client/consultation', [MeetingController::class, 'index'])->name('client.meeting')->middleware('auth');

Route::get('/client/{meetingId}/joinmeeting', [MeetingController::class, 'joinMeeting'])->name('client.joinmeeting')->middleware('auth');



//payment routes ...
Route::get('/paymentform', [PaymentController::class, 'create'])->name('client.paymentForm')->middleware('auth');
Route::post('/makepayment', action: [PaymentController::class, 'store'])->name('store.payment')->middleware('auth');

Route::get('/geolocation', [PaymentController::class, 'locateShop'])->name('client.geolocation')->middleware('auth');





//admin meeting routes here ...

Route::get('/lawyer/consultation', [MeetingController::class, 'index'])->name('admin.meeting')->middleware('auth');
Route::get('/lawyer/consultationform', [MeetingController::class, 'create'])->name('admin.meetingform')->middleware('auth');

Route::get('/lawyer/{meetingId}/joinmeeting', [MeetingController::class, 'joinMeeting'])->name('admin.joinmeeting')->middleware('auth');


Route::post('/lawyer/createconsultation', action: [MeetingController::class, 'store'])->name('store.meeting')->middleware('auth');






//admin

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard')->middleware('auth');

Route::get('/lawyer/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');


Route::get('/lawyer/getusers', [AdminDashboardController::class, 'getUsers'])->name('admin.getuser')->middleware('auth');
Route::get('/lawyer/getcases', [AdminDashboardController::class, 'getCases'])->name('admin.getcases')->middleware('auth');
Route::get('/lawyer/case/{mycase}/detail', [AdminDashboardController::class, 'showCase'])->name('admin.showcase')->middleware('auth');


Route::get('/mycourtdate', [CourtDateController::class, 'getUserCourtDate'])->name('client.courtdate')->middleware('auth');
Route::put('/admin/{id}/casestatus', [AdminDashboardController::class, 'updateStatus'])->name('update.casestatus')->middleware('auth');







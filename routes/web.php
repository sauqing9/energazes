<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/monitoring', function () {
    return view('monitoring');
});

Route::get('/forgot-password-page', function () {
    return view('forgot-password-page');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [AuthController::class, 'login'])->name('login.submit'); // Rute untuk memproses login

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register'); // Rute untuk menampilkan form registrasi
Route::post('/register', [AuthController::class, 'register'])->name('register.submit'); // Rute untuk memproses registrasi
Route::get('/register-success', [AuthController::class, 'registerSuccess'])->name('register.success'); 

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');// Rute untuk logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');// Rute untuk logout

//userpage
Route::get('/userpage', [AuthController::class, 'userPage'])->name('userpage')->middleware('auth');

//adminpage
Route::get('/adminpage', [AuthController::class, 'adminPage'])->name('adminpage');

//question
Route::post('/submit-question', [QuestionController::class, 'submitQuestion'])->name('submit-question');

//monitoring
Route::get('/api/get-monitoring-data', [MonitoringController::class, 'getMonitoringData']); //monitoring di admin
Route::get('/api/monitoring-data', [MonitoringController::class, 'getLatestData']);

Route::get('/test', function () {
    session()->flash('success', 'Test Success Message');
    return view('test');  // Or any other view
});



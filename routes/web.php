<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Auth;

Route::get('/', fn() => view('landing'));

// Survey Routes
Route::get('/survey/step1', [SurveyController::class, 'step1']);
Route::post('/survey/step1', [SurveyController::class, 'storeStep1']);
Route::get('/survey/step2', [SurveyController::class, 'step2']);
Route::post('/survey/step2', [SurveyController::class, 'storeStep2']);
Route::get('/survey/result/{id}', [SurveyController::class, 'result'])->name('survey.result');

// Admin Routes - Protected by auth middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/response/{id}', [AdminController::class, 'show']);
    Route::get('/admin/export/csv', [AdminController::class, 'exportCSV']);
    Route::get('/admin/pdf/{id}', [AdminController::class, 'exportPDF']);
    Route::delete('/admin/response/{id}', [AdminController::class, 'destroy']);
});

// Auth Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::check()) {
        return redirect('/admin');
    }
    
    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return redirect()->intended('/admin');
    }
    
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

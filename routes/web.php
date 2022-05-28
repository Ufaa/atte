<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\IntervalController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 勤怠管理画面表示
Route::get('/', [AttendanceController::class, 'index'])->name('index');

// 勤務開始打刻
Route::post('/atte_start', [AttendanceController::class, 'atte_start'])->name('atte_start');
// 勤務終了打刻
Route::post('/atte_end', [AttendanceController::class, 'atte_end'])->name('atte_end');
// 休憩開始打刻
Route::post('/interval_start', [IntervalController::class, 'interval_start'])->name('interval_start');
// 休憩終了打刻
Route::post('/interval_end', [IntervalController::class, 'interval_end'])->name('interval_end');
// 日付別勤怠情報取得


//youtube api練習
Route::get('/youtube', [YoutubeController::class, 'index']);
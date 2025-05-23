<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;



Route::get('/', [DashboardController::class, 'index']);
Route::get('/about', [DashboardController::class, 'about']);
Route::get('/completeProject', [DashboardController::class, 'completeProject']);
Route::get('/career', [DashboardController::class, 'career']);
Route::get('/gallery', [DashboardController::class, 'gallery']);
Route::get('/video', [DashboardController::class, 'video']);
Route::get('/blog', [DashboardController::class, 'blog']);
Route::get('/transmission', [DashboardController::class, 'transmission']);
Route::get('/vision', [DashboardController::class, 'vision']);
Route::get('/blogDetails/{id}', [DashboardController::class, 'blogDetails']);
Route::get('/team', [DashboardController::class, 'team']);
Route::get('/construction', [DashboardController::class, 'construction']);
Route::get('/undergroundCable', [DashboardController::class, 'undergroundCable']);
Route::get('/runningProject', [DashboardController::class, 'runningProject']);
Route::get('/press', [DashboardController::class, 'press']);
Route::get('/contact', [DashboardController::class, 'contact']);
Route::post('/saveQuery', [DashboardController::class, 'saveQuery']);









Route::get('/category/{id?}', [DashboardController::class, 'category']);
Route::get('/ourClient', [DashboardController::class, 'ourClient']);
Route::get('/product', [DashboardController::class, 'product']);
Route::post('/saveProduct', [DashboardController::class, 'saveProduct']);
Route::post('/saveContact', [DashboardController::class, 'saveContact']);
Route::get('/products/{id?}', [DashboardController::class, 'product']);
Route::get('/calculater', [DashboardController::class, 'calculater']);
Route::post('/saveCalculater', [DashboardController::class, 'saveCalculater']);
Route::post('/saveProducts', [DashboardController::class, 'saveProducts']);
Route::get('/personalLoan', [DashboardController::class, 'personalLoan']);
Route::get('/mobileVerification', [DashboardController::class, 'mobileVerification']);
Route::post('/saveMobileVerification', [DashboardController::class, 'saveMobileVerification']);
Route::get('/otp', [DashboardController::class, 'otp']);
Route::post('/verifyOtp', [DashboardController::class, 'verifyOtp']);
Route::get('/employee', [DashboardController::class, 'employee']);
Route::post('/saveEmployee', [DashboardController::class, 'saveEmployee']);
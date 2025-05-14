<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/allProduct', [ProductController::class, 'allProduct']);
    Route::post('/saveProduct', [ProductController::class, 'saveProduct']);
    Route::post('/updateProduct', [ProductController::class, 'updateProduct']);
    Route::get('/getProductDetailsById', [ProductController::class, 'getProductDetailsById']);
    Route::post('/getProductByProductId', [ProductController::class, 'getProductByCategoryId']);
    Route::post('/deleteProduct', [ProductController::class, 'deleteProduct']);

    Route::post('/saveCategory', [CategoryController::class, 'saveCategory']);
    Route::post('/updateCategory', [CategoryController::class, 'updateCategory']);
    Route::get('/getAllCategory', [CategoryController::class, 'getAllCategory']);
    Route::get('/getCategoryDetailsById', [CategoryController::class, 'getCategoryDetailsById']);
    Route::post('/deleteCategory', [CategoryController::class, 'deleteCategory']);

    Route::get('/getAllOrder', [OrderController::class, 'getAllOrder']);
    Route::post('/saveOrder', [OrderController::class, 'saveOrder']);

    Route::post('/saveQuery', [QueryController::class, 'saveQuery']);
    Route::get('/getAllQuery', [QueryController::class, 'getAllQuery']);

    Route::post('/saveGallery', [GalleryController::class, 'saveGallery']);
    Route::post('/updateGallery', [GalleryController::class, 'updateGallery']);
    Route::post('/deleteGallery', [GalleryController::class, 'deleteGallery']);
    Route::get('/getAllGallery', [GalleryController::class, 'getAllGallery']);

    Route::post('/savePost', [PostController::class, 'savePost']);
    Route::get('/getAllPost', [PostController::class, 'getAllPost']);
    Route::post('/updatePost', [PostController::class, 'updatePost']);


    Route::post('/saveVideo', [VideoController::class, 'saveVideo']);
    Route::post('/updateVideo', [VideoController::class, 'updateVideo']);
    Route::get('/getAllVideo', [VideoController::class, 'getAllVideo']);
    Route::post('/deleteVideo', [VideoController::class, 'deleteVideo']);
});
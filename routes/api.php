<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    Admin,
    SubscriberController,
    ContactusController,
    TestimonialsController,
    GetquatesController,
    PagesController,
    SocialLinksController,
    BannerController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 
Route::apiResource('admins', Admin::class);
Route::post('admin-login', [Admin::class, 'adminLogin']);
Route::apiResource('subscriber', SubscriberController::class);
Route::apiResource('testimonials', TestimonialsController::class);
Route::apiResource('contact-us', ContactusController::class);
Route::apiResource('get-quotes', GetquatesController::class);
Route::apiResource('pages', PagesController::class);
Route::apiResource('banners', BannerController::class);
Route::apiResource('social-links', SocialLinksController::class);


<?php

use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\VisitorController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//routes for unregistered users
Route::get('{username}', [VisitorController::class, 'showUser'])->name('visitor.show-user');
Route::get('user/profile/{id}', [VisitorController::class, 'getVisitorProfile'])->name('visitor.get-visitor-profile');
Route::post('visit/email/send-message', [VisitorController::class, 'sendVisitorMessage'])->name('visitor.send-message');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('user/dashboard', [UserProfileController::class, 'getDashboard'])->name('dashboard');
    Route::get('/profile/edit/{username}', [UserProfileController::class, 'getUsername'])->name('username');
    Route::get('user/get-notifications', [UserProfileController::class, 'getNotifications'])->name('users.getNotifications');
    Route::get('user/mark-all-as-read', [UserProfileController::class, 'markAllAsRead'])->name('users.markAllAsRead');
    Route::post('user/mark-as-read', [UserProfileController::class, 'markNotification'])->name('users.markNotification');
    Route::get('user/get-user', [UserProfileController::class, 'getUser'])->name('users.getUsername');
    Route::get('user/get-profile', [UserProfileController::class, 'getProfile'])->name('users.getProfile');
    Route::put('user/update/update-profile', [UserProfileController::class, 'updateProfile'])->name('users.update-profile');
    
    Route::post('user/add-social-links', [UserProfileController::class, 'addSocialLinks'])->name('users.add-social-links');
    Route::post('user/profile-pic/upload', [UserProfileController::class, 'upload'])->name('userprofile.upload');
    Route::post('user/bg-pic/upload', [UserProfileController::class, 'uploadBg'])->name('userprofile.uploadBg');
    Route::get('user/social-links', [UserProfileController::class, 'getSocialLinks'])->name('users.getSocialLinks');
    Route::delete('delete/social-links/{id}', [UserProfileController::class, 'destroy'])->name('users.destroy');
});





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
Route::get('visit/{username}', [VisitorController::class, 'showUser'])->name('visitor.show-user');
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
    Route::get('dashboard', function () {
        $notifications = auth()->user()->unreadNotifications;
        return Inertia::render('Dashboard',['notifications'=> compact('notifications')]);
    })->name('dashboard');
    Route::get('/profile/edit/{username}', function () {
        
        return Inertia::render('Profile');
    })->name('username');
    Route::resource('userprofiles', UserProfileController::class);
    Route::get('user/getuser', [UserProfileController::class, 'getUser'])->name('users.getUsername');
    Route::get('user/getProfile', [UserProfileController::class, 'getProfile'])->name('users.getProfile');
    Route::put('user/update/update-profile', [UserProfileController::class, 'updateProfile'])->name('users.update-profile');
    Route::put('user/update-first-name/{id}', [UserProfileController::class, 'updateFname'])->name('users.update-first-name');
    Route::put('user/update-last-name/{id}', [UserProfileController::class, 'updateLname'])->name('users.update-last-name');
    Route::put('user/update-full_name_color/{id}', [UserProfileController::class, 'updateFullNameColor'])->name('users.update-full_name_color');
    Route::put('user/update-full_name_font/{id}', [UserProfileController::class, 'updateFullNameFont'])->name('users.update-full_name_font');
    Route::put('user/update-full_name_font_size/{id}', [UserProfileController::class, 'updateFullNameSize'])->name('users.update-full_name_font_size');
    Route::put('user/update-location/{id}', [UserProfileController::class, 'updateLocation'])->name('users.update-location');
    Route::put('user/update-location_color/{id}', [UserProfileController::class, 'updateLocationColor'])->name('users.update-location_color');
    Route::put('user/update-location_font/{id}', [UserProfileController::class, 'updateLocationFont'])->name('users.update-location_font');
    Route::put('user/update-location_font_size/{id}', [UserProfileController::class, 'updateLocationSize'])->name('users.update-location_font_size');
    Route::post('user/add-social-links', [UserProfileController::class, 'addSocialLinks'])->name('users.add-social-links');
    Route::post('user/profile-pic/upload', [UserProfileController::class, 'upload'])->name('userprofile.upload');
    Route::post('user/bg-pic/upload', [UserProfileController::class, 'uploadBg'])->name('userprofile.uploadBg');
    Route::get('user/social-links', [UserProfileController::class, 'getSocialLinks'])->name('users.getSocialLinks');
});





<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PackController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\BookingController as ClientBookingController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\GalleryController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\RulesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function() {
        Route::get('login', 'login')->name('admin.login');
        Route::post('login', 'login')->name('post.admin.login');
        Route::get('forgot-password', 'forgotPassword')->name('admin.forgot-password');
        Route::post('forgot-password', 'forgotPassword')->name('post.admin.forgot-password');
        Route::get('logout','logout')->name('admin.logout');
    });

    Route::middleware('auth')->group(function() {
        Route::controller(DashboardController::class)->group(function() {
            Route::get('dashboard', 'index')->name('admin.dashboard');
        });

        Route::controller(AuthController::class)->group(function () {
            Route::get('profile', 'profile')->name('admin.profile');
            Route::post('profile', 'profile')->name('post.admin.profile');
        });
    
        Route::controller(GameController::class)->group(function() {
            Route::get('games', 'index')->name('admin.games');
            Route::get('games/add', 'add')->name('admin.games.add');
            Route::post('games/add', 'add')->name('post.admin.games.add');
            Route::get('games/update/{id}', 'update')->name('admin.games.update');
            Route::post('games/update/{id}', 'update')->name('post.admin.games.update');
            Route::get('games/delete/{id}', 'delete')->name('admin.games.delete');
        });
    
        Route::controller(PackController::class)->group(function() {    
            Route::get('packs', 'index')->name("admin.packs");
            Route::get('packs/add', 'add')->name("admin.packs.add");
            Route::post('packs/add', 'add')->name("post.admin.packs.add");
            Route::get('packs/update/{id}', 'update')->name("admin.packs.update");
            Route::post('packs/update/{id}', 'update')->name("post.admin.packs.update");
            Route::get('packs/delete/{id}', 'delete')->name("admin.packs.delete");
        });
    
        Route::controller(ReviewController::class)->group(function() {
            Route::get('reviews', 'index')->name('admin.reviews');
            Route::get('reviews/add', 'add')->name('admin.reviews.add');
            Route::post('reviews/add', 'add')->name('post.admin.reviews.add');
            Route::get('reviews/update/{id}', 'update')->name('admin.reviews.update');
            Route::post('reviews/update/{id}', 'update')->name('post.admin.reviews.update');
            Route::get('reviews/delete/{id}', 'delete')->name('admin.reviews.delete');
        });
    
        Route::controller(BookingController::class)->group(function() {
            Route::get('bookings', 'index')->name('admin.bookings');
            Route::get('bookings/add', 'add')->name('admin.bookings.add');
            Route::post('bookings/add', 'add')->name('post.admin.bookings.add');
            Route::get('bookings/update/{id}', 'update')->name('admin.bookings.update');
            Route::post('bookings/update/{id}', 'update')->name('post.admin.bookings.update');
            Route::get('bookings/delete/{id}', 'delete')->name('admin.bookings.delete');;
        });
    
        Route::controller(UserController::class)->group(function() {
            Route::get('users', 'index')->name("admin.users");
            Route::get('users/add', 'add')->name('admin.users.add');
            Route::post('users/add', 'add')->name('post.admin.users.add');
            Route::get('users/update/{id}', 'update')->name('admin.users.update');
            Route::post('users/update/{id}', 'update')->name('post.admin.users.update');
            Route::get('users/delete/{id}', 'delete')->name('admin.users.delete');
        });
    
        Route::controller(MediaController::class)->group(function() {
            Route::get('medias', 'index')->name('admin.medias');
            Route::get('medias/add', 'add')->name('admin.medias.add');
            Route::post('medias/add', 'add')->name('post.admin.medias.add');
            Route::get('medias/update/{id}', 'update')->name('admin.medias.update');
            Route::post('medias/update/{id}', 'update')->name('post.admin.medias.update');
            Route::get('medias/delete/{id}', 'delete')->name('admin.medias.delete');
        });
    
        Route::controller(MessageController::class)->group(function() {
            Route::get('messages', 'index')->name('admin.messages');
            Route::get('messages/update/{id}', 'update')->name('admin.messages.update');
            Route::post('messages/update/{id}', 'update')->name('post.admin.messages.update');
            Route::get('messages/delete/{id}', 'delete')->name('admin.messages.delete');
        });
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rules', [RulesController::class, 'index'])->name('rules');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/booking', [ClientBookingController::class, 'index'])->name('booking');
Route::post('/book', [ClientBookingController::class, 'book'])->name('book');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/send-message', [ContactController::class, 'sendMessage'])->name('send-message');
Route::get('/checkout-success/{bookingId}', [ClientBookingController::class, 'paymentSuccessful'])->name("checkout-success");
Route::get('/checkout-cancel/{bookingId}',  [ClientBookingController::class, 'paymentCancelled'])->name('checkout-cancel');
Route::get('/download-invoice/{bookingId}', [ClientBookingController::class, 'downloadInvoice'])->name('download-invoice');
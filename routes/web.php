<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\admin\bookingcontroller;
use App\Http\Controllers\User\Pagecontroller;
use App\Http\Controllers\User\roomController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\authenticateController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Route::get('/', function () {
//     return view('user.index');
// });

// Route::get('sample', function () {
//         return view('admin.sample');
//     });



// route::get('/dashboard', function (){
//     return view('admin.index');
// })->name('admin.index');




//registrations
// Route::view('/register',function(){
//     return view('register');
// })
// ->name('register');


Route::get('/register', [authenticateController::class, 'register'])->name('register');
Route::post('/registersave', [authenticateController::class, 'registersave'])->name('registersave');

//login
Route::get('/login', [authenticateController::class, 'login'])->name('login');
Route::post('/loginsave', [authenticateController::class, 'loginsave'])->name('loginsave');

//logout
Route::get('/logout', [authenticateController::class, 'logout'])->name('user-logout');

// Auth::routes(['verify' => true]);
// Auth::routes(['verify' => true]);

//admin
Route::resource('manage-room', AdminRoomController::class);
Route::resource('manage-customer', UserController::class);
Route::resource('booked-room', bookingcontroller::class);
Route::get('/admin/bookings/filter', [BookingController::class, 'filterBookings'])->name('admin.bookings.filter');
Route::get('/room-canceled{id}', [AdminroomController::class, 'roomcanceled'])->name('booked-room.canceled');
Route::get('/room-confirm/{id}', [AdminroomController::class, 'roomconfirm'])->name('booked-room.confirm');

Route::controller(AdminPageController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

//admin -profile
Route::get('/admin-profile', [authenticateController::class, 'adminprofile'])->name('adminprofile');
Route::put('/updateadminprofile{id}', [authenticateController::class, 'updateadminprofile'])->name('updateadminprofile');
Route::get('/editadminprofile', [authenticateController::class, 'editadminprofile'])->name('editadminprofile');





//user
Route::resource('room', roomController::class);
Route::get('/room-filter', [roomController::class, 'roomfilter'])->name('room-filter');
Route::get('/room-bookroom/{id}', [roomController::class, 'bookroom'])->name('book-room');
Route::POST('/room-booked/{id}', [roomController::class, 'bookedroom'])->name('store-bookroom');
Route::get('/mybookedroom', [roomController::class, 'mybookedroom'])->name('mybookedroom');
Route::get('/user/room-canceled{id}', [roomController::class, 'bookedroomcanceled'])->name('bookedroomcanceled');

Route::get('/home', [roomController::class, 'home'])->name('home');
Route::get('/', [roomController::class, 'home'])->name('homee');

Route::controller(Pagecontroller::class)->group(function () {
    Route::get('/restaurant', 'restaurant')->name('restaurant');
    Route::get('/about', 'about')->name('about');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/contact', 'contact')->name('contact');
});



//user profile
Route::get('/profile', [authenticateController::class, 'profile'])->name('profile');
Route::put('/updateprofile{id}', [authenticateController::class, 'updateprofile'])->name('updateprofile');
Route::get('/editprofile', [authenticateController::class, 'editprofile'])->name('editprofile');



Route::get('/sample', [AdminPageController::class, 'sample'])->name('sample');






// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

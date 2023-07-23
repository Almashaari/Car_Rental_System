<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MycarController;
use App\Http\Controllers\RentedController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();
// Route::get('/forget', [userController::class, 'showForget']);
Route::get('/signup', [userController::class, 'showSign']);
Route::get('forget', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');


    Route::get('/profile', [userController::class, 'showEditProfile']);
    Route::get('/rented/profile/{id}', [userController::class, 'showRenterProfile']);
    Route::post('/changeProfile', [userController::class, 'changeProfile']);
    Route::post('/uploadUserImage', [userController::class, 'uploadUserImage']);

    //    Route::get('/profile/edit', [userController::class, 'showEditProfile']);
    Route::get('/cars', [CarController::class, 'showCars']);
    Route::get('/cars/booking/{id}', [CarController::class, 'showBookingCars']);

    Route::post('/booking', [CarController::class, 'booking']);

    Route::get('/rented', [RentedController::class, 'showRented']);
    Route::get('/rented/search', [RentedController::class, 'showSearchRented']);
    Route::get('/mycars', [MycarController::class, 'showMyCars']);
    Route::post('/mycars', [MycarController::class, 'showMyCars']);

    Route::get('/mycars/add', [MycarController::class, 'showAddCars']);
    Route::get('/mycars/edit/{id}', [MycarController::class, 'showEditMyCars']);
    Route::get('/mycars/delete/{id}', [MycarController::class, 'deleteMyCars']);
    Route::post('/addMyCar', [MycarController::class, 'addMyCar'])->name('addMyCar');
    Route::post('/editMyCar', [MycarController::class, 'editMyCar'])->name('editMyCar');
    Route::post('/carImage', [MycarController::class, 'carImage']);

    Route::get('/car/show', [CarController::class, 'showCar']);

    Route::get('/bookings', [BookingController::class, 'showbookings']);
    Route::get('/bookings/search', [BookingController::class, 'showSearchbookings']);
    Route::get('/bookings/edit/{id}', [BookingController::class, 'viewEditBooking']);
    Route::get('/bookings/delete/{id}', [BookingController::class, 'DeleteBooking']);
    Route::post('/editBooking', [BookingController::class, 'editBooking']);
    Route::get('/address', [AddressController::class, 'showAddress']);
    Route::post('/editAddress', [AddressController::class, 'editAddress']);
    Route::get('/support', [SupportController::class, 'showSupport']);
    Route::get('/support/user', [SupportController::class, 'ushowSupport']);
});
// Route::post('/register/basic/create', [RegisterController::class, 'create'])->name('register');
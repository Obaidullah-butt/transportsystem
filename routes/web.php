<?php

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

use App\Http\Controllers\UserrController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
Route::get('/', function () {

    return view('home');

});


// for user register 

Route::get('/register', [UserrController::class, 'index']);
Route::post('/reg', [UserrController::class, 'store'])->name('user.register');

//for login 
Route::get('/login', [UserrController::class, 'login']);
Route::post('/loginn', [UserrController::class, 'loginn'])->name('user.login');

//for admin provider and customer login 

Route::get('/alogin', [UserrController::class, 'adminlogin'])->name('admin.login');
Route::get('/plogin', [UserrController::class, 'providerlogin'])->name('provider.login');
Route::get('/clogin', [UserrController::class, 'customerlogin'])->name('customer.login');

// for logout
Route::get('/logout', [UserrController::class, 'logout'])->name('user.logout');

// for register vehicle
Route::get('/show_reg', [VehicleController::class, 'show_reg_vehicle'])->name('show.registerform');
Route::post('/reg_vehicle', [VehicleController::class, 'Register_Vehicle'])->name('vehicle_register');

//admin dashbord pending vehicles
Route::get('/pending', [VehicleController::class, 'pendingvehicle'])->name('admin.pendingVehicles');
Route::post('/admin/vehicle/{id}/approve', [VehicleController::class, 'approveVehicle'])->name('vehicle.approve');
Route::post('/admin/vehicle/{id}/reject', [VehicleController::class, 'rejectVehicle'])->name('vehicle.reject');
//admin dashbord available vehicles
Route::get('/available', [VehicleController::class, 'showAvailable'])->name('admin.availableVehicles');
Route::get('/adminviewtrip', [BookingController::class, 'viewtrip'])->name('admin.seetrip');



//customer dashbord->trip bok
Route::get('/Cus_see_available', [VehicleController::class, 'showCusAvailable'])->name('customer.seeavailable');
Route::get('/trip_form', [BookingController::class, 'tripForm'])->name('trip.form');
Route::post('/trip_submit', [BookingController::class, 'tripSubmit'])->name('trip.submit');
//see booked trip
Route::get('/see_bookedTrip', [VehicleController::class, 'SeeBookedTrip'])->name('see.bookedtrip');



//provider for see trip
Route::get('/see_trip', [BookingController::class, 'Providertrip'])->name('see.trip');

// Route::post('/abcapprove', [BookingController::class, 'approve'])->name('abc.dot');
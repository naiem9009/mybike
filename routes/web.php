<?php

use App\Http\Controllers\bikecontroller;
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

// Route::get('/bike', function () {
//     return view('bike');
// });

Route::get('/bike',[bikecontroller::class,'bikeform'] );
Route::get('/all-bike',[bikecontroller::class,'getAllBike'] );
Route::post('/bike', [BikeController::class, 'store'])->name('bike');
Route::post('/update-bike/{id}', [BikeController::class, 'entryUpdateBike'])->name('entryUpdateBike');
Route::get('/bike/{id}', [BikeController::class, 'updateBike'])->name('updateBike');
Route::get('/bike/delete/{id}', [BikeController::class, 'deleteBike'])->name('deleteBike');



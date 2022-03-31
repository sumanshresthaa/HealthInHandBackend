<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmergencyNumber;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CreateAppointmentController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);



//Route::get('/post', 'App\Http\Controllers\PostController@getPost');
Route::get('/detailsOfArthritis', 'App\Http\Controllers\ArthritisController@getDetailsOfArthritis');

Route::get('/detailsOfCovid', 'App\Http\Controllers\CovidController@getDetailsOfCovid');

Route::get('/detailsOfDoctor', 'App\Http\Controllers\DoctorProfileController@getDetailsOfDoctor');

//Below is a middleware where we can put routes which will stop any routes without api token or in simple words you have to logged in to access this route
Route::middleware(['auth:sanctum'])->group(function (){

    Route::get("emergencynumber",[EmergencyNumber::class,'numberList']);

Route::post('logout', [AuthController::class, 'logout']);

});


Route::post('createAppointment', [CreateAppointmentController::class, 'store']);
Route::get('getAppointments', [CreateAppointmentController::class, 'index']);
//For now the update only works in param
//Change the below into post to do it in body of the postman or flutter
Route::put('{id}/updateAppointment', [CreateAppointmentController::class, 'update']);
Route::delete('{id}/deleteAppointment', [CreateAppointmentController::class, 'delete']);
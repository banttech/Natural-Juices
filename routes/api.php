<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\EmployeeController;

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

Route::prefix('v1')->group(function () {

    Route::post('/login', [AuthController::class, 'store']);

    Route::middleware('auth:api')->group(function () {

    	Route::match(['get', 'post'], '/companies', [CompanyController::class, 'index'])->name('companies');   
    	Route::match(['get', 'post'], '/employees', [EmployeeController::class, 'index'])->name('employees');   
	});

});
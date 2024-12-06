<?php

use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\EmployeeSelectController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\OrganicUnitController;
use App\Http\Controllers\Api\OverviewController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', LoginController::class);
Route::middleware('auth:sanctum')->post('/logout', LogoutController::class);
Route::post('/register', RegisterController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return UserResource::make($request->user());
    });

    Route::get('/overview', OverviewController::class);

    Route::apiResource('branches', BranchController::class);
    Route::apiResource('organic_units', OrganicUnitController::class);
    Route::get('/employees/select', EmployeeSelectController::class);
    Route::apiResource('employees', EmployeeController::class);
});

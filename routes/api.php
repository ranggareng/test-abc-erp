<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'employees'], function(){
    Route::get('/', [\App\Http\Controllers\API\EmployeeController::class, 'index'])->name('employee.list');
    Route::post('/', [\App\Http\Controllers\API\EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/summary', [\App\Http\Controllers\API\EmployeeController::class, 'summary'])->name('employee.summary');
});

Route::group(['prefix' => 'master'], function(){
    Route::get('/companies', [\App\Http\Controllers\API\MasterCompanyController::class, 'index'])->name('master.company.list');
    Route::get('/departments', [\App\Http\Controllers\API\MasterDepartmentController::class, 'index'])->name('master.department.list');
});
<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);

// AREAS
Route::apiResource('areas', AreaController::class)->middleware('auth:sanctum');

// PEOPLE
Route::apiResource('people', PeopleController::class)->middleware('auth:sanctum');

// ATTENDANCES 
Route::apiResource('attendances', AttendanceController::class)->middleware('auth:sanctum');

// REPORTES
Route::get('/reports/areas', [ReportController::class, 'byArea'])->middleware('auth:sanctum');
Route::get('/reports/people', [ReportController::class, 'byPerson'])->middleware('auth:sanctum');

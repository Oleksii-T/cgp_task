<?php

use App\Http\Controllers\CompanyApiController;
use App\Http\Controllers\ClientApiController;
use App\Http\Controllers\AuthApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Company;

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

Route::post('/register',    [AuthApiController::class, 'register']);
Route::post('/login',       [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',      [AuthApiController::class, 'logout']);

    Route::get ('/companies',                   [CompanyApiController::class, 'getCompanies']); //list of companies
    Route::get ('/companies/{company}/clients', [CompanyApiController::class, 'getClients']); // list of clients of exact company
    Route::get ('/clients/{client}/companies',  [ClientApiController::class, 'getClientCompanies']); //list of companies of client
});
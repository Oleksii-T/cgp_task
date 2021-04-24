<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ClientController;

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

//Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
//Route::resource('clients', ClientController::class);
Route::get      ('/clients',              [ClientController::class, 'index'])   ->name('client.index');
Route::get      ('/clients/create',       [ClientController::class, 'create'])  ->name('client.create');
Route::post     ('/clients',              [ClientController::class, 'store'])   ->name('client.store');
Route::get      ('/clients/{client}',     [ClientController::class, 'edit'])    ->name('client.edit');
Route::patch    ('/clients/{client}',     [ClientController::class, 'update'])  ->name('client.update');
Route::delete   ('/clients/{client}',     [ClientController::class, 'destroy']) ->name('client.destroy');


//Route::resource('companies', CompanyController::class);
Route::get      ('/companies',              [CompanyController::class, 'index'])   ->name('company.index');
Route::get      ('/companies/create',       [CompanyController::class, 'create'])  ->name('company.create');
Route::post     ('/companies',              [CompanyController::class, 'store'])   ->name('company.store');
Route::get      ('/companies/{company}',    [CompanyController::class, 'edit'])    ->name('company.edit');
Route::patch    ('/companies/{company}',    [CompanyController::class, 'update'])  ->name('company.update');
Route::delete   ('/companies/{company}',    [CompanyController::class, 'destroy']) ->name('company.destroy');
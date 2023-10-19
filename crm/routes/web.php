<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginsController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [LoginsController::class, 'index'])->name('welcome');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::get('/companies', [CompanyController::class, 'show'])->name('company/showCompanies');
Route::get('/employees', [EmployeeController::class, 'show'])->name('employee/showEmployees');

Route::middleware(['auth'])->group(function () {
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('company/create');
});

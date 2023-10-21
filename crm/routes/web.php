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
Route::get('/companies', [CompanyController::class, 'index'])->name('company/showCompanies');

Route::get('/employees', [EmployeeController::class, 'show'])->name('employee/showEmployees');

Route::middleware(['auth'])->group(function () {
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('company/create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('company/store');

    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee/create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employee/store');

    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('company/edit');
    Route::delete('/companies/{company}/delete', [CompanyController::class, 'destroy'])->name('company/destroy');
    Route::patch('/companies/{company}/update', [CompanyController::class, 'update'])->name('company/update');
    Route::get('/companies/{company}/show', [CompanyController::class, 'show'])->name('company/showCompany');

    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee/edit');
    Route::delete('/employees/{employee}/delete', [EmployeeController::class, 'destroy'])->name('employee/destroy');
    Route::patch('/employees/{employee}/update', [EmployeeController::class, 'update'])->name('employee/update');
});

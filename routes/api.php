<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LoginController;
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

// Route::get('/greeting', function () {
//     return 'Hello World';
// });

Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');

Route::middleware('auth:sanctum')->group(function() {

    Route::get('/companies/{company}', [CompanyController::class, 'show']);
    Route::post('/companies/store', [CompanyController::class, 'store']);
    Route::patch('/companies/{company}', [CompanyController::class, 'update']);
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);

    Route::post('/projects/store', [ProjectController::class, 'store']);
    Route::get('/projects/{project}', [ProjectController::class, 'show']);
    Route::patch('/projects/{project}', [ProjectController::class, 'update']);
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy']);

});

Route::post('/login', [LoginController::class, 'login'])->name('login');
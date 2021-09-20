<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Employe;
use GrahamCampbell\ResultType\Success;

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

Route::get('/', function () {
    return redirect('/redirects');
});


Auth::routes();


Route::get('/employes', [App\Http\Controllers\AdminController::class, 'employes'])->middleware(['auth','AdminCheck']);
Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->middleware('auth');
Route::get('/demandes', [App\Http\Controllers\AdminController::class, 'demandes'])->middleware(['auth','AdminCheck']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/redirects', [App\Http\Controllers\HomeController::class, 'redirects'])->middleware('auth');
Route::get('/editemp/{Id}', [App\Http\Controllers\AdminController::class, 'editemp'])->middleware(['auth','AMCheck']);
Route::get('/profile/{Id}', [App\Http\Controllers\AdminController::class, 'profile'])->middleware(['auth','profileCheck']);
Route::get('/validate/{Id}', [App\Http\Controllers\AdminController::class, 'validm'])->middleware(['auth','AdminCheck']);
Route::get('/cancelvalidate/{Id}', [App\Http\Controllers\AdminController::class, 'cancelvalidm'])->middleware(['auth','AdminCheck']);
Route::get('/refuse/{Id}', [App\Http\Controllers\AdminController::class, 'refusedm'])->middleware(['auth','AMCheck']);
Route::get('/cancelrefuse/{Id}', [App\Http\Controllers\AdminController::class, 'cancelrefusedm'])->middleware(['auth','AMCheck']);
Route::post('/updatemp/{Id}', [App\Http\Controllers\AdminController::class, 'updatemp'])->middleware(['auth']);
Route::get('/deletemp/{Id}', [App\Http\Controllers\AdminController::class, 'deletemp'])->middleware(['auth','AMCheck']);
Route::get('/addemp', [App\Http\Controllers\AdminController::class, 'addemp'])->middleware(['auth','AMCheck']);;
Route::post('/insert', [App\Http\Controllers\AdminController::class, 'insert'])->middleware(['auth','AMCheck']);
Route::get('/empmanager', [App\Http\Controllers\ManagerController::class, 'empmanager'])->middleware(['auth','ManagerCheck']);
Route::get('/approuve/{Id}', [App\Http\Controllers\ManagerController::class, 'approuve'])->middleware(['auth','ManagerCheck']);
Route::get('/cancelapprove/{Id}', [App\Http\Controllers\ManagerController::class, 'cancelapprove'])->middleware(['auth','ManagerCheck']);
Route::get('/deletedmd/{Id}', [App\Http\Controllers\StandardController::class, 'deletedmd'])->middleware(['auth','StandardCheck']);
Route::get('/postuledmd', [App\Http\Controllers\StandardController::class, 'postuledmd'])->middleware(['auth','StandardCheck']);
Route::post('/insertdmd', [App\Http\Controllers\StandardController::class, 'insertdmd'])->middleware(['auth','StandardCheck']);
Route::get('/calendar', [App\Http\Controllers\ManagerController::class, 'calendar'])->middleware(['auth','ManagerCheck']);
Route::get('/admcalendar', [App\Http\Controllers\AdminController::class, 'admcalendar'])->middleware(['auth','AdminCheck']);


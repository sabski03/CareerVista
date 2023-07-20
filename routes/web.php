<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



//COMMON RESOURCE ROUTES!!!!!!!!!!!!!!
//index - show all listings
//show - show all listings
//create - show form to create listing
//store - store new listing
//edit - show form to edit listing
//update - update listing
//destroy - delete listing



//all listings
Route::get('/', [ListingController::class, 'index'])->name('home');

//create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth')->name('create');

//store form
Route::post('listings', [ListingController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//update edit form
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//delete listing
Route::delete('/listing/{listing}', [ListingController::class, 'delete'])->middleware('auth');

//manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//single listing
Route::get('/listings/{id}', [ListingController::class, 'show']);

//show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

//Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/login', [UserController::class, 'authenticate']);





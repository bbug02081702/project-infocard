<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoCardController;
use App\Http\Controllers\LoginController;
use App\Models\InfoCard;

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
    return view('welcome');
});

Route::get('/', function(){
    $datainfocard = InfoCard::count();
    return view('welcome',compact('datainfocard'));
})->middleware('auth');

//show all data list
Route::get('/infocard',[InfoCardController::class, 'index'])->name('infocard');

//show details
Route::get('/view-infocard',[InfoCardController::class, 'show'])->name('view-infocard');

//add,insert
Route::get('/add-infocard',[InfoCardController::class, 'create'])->name('add-infocard');
Route::post('/insert-infocard',[InfoCardController::class, 'store'])->name('insert-infocard');

//edit,update
Route::get('/edit-infocard/{id}',[InfoCardController::class, 'edit'])->name('edit-infocard');
Route::post('/update-infocard/{id}', [InfoCardController::class, 'update'])->name('update-infocard');

//delete
Route::get('/delete-infocard/{id}',[InfoCardController::class, 'destroy'])->name('delete-infocard');

//export pdf
Route::get('/exportpdf',[InfoCardController::class, 'exportpdf'])->name('exportpdf');

//export excel
Route::get('/exportexcel',[InfoCardController::class, 'exportexcel'])->name('exportexcel');
//import excel 
Route::post('/importexcel', [InfoCardController::class, 'importexcel'])->name('importexcel');

//login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

//register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('regiseteruser');

//logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');





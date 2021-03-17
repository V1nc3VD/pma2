<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgressieController;
use App\Http\Controllers\CursusController;

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
    return view('home');
});



Route::get('/',[ProgressieController::class,'index']);
Route::get('cursus',[CursusController::class,'index']);
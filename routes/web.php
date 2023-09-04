<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\frontend\PagesController;
use App\Http\Controllers\frontend\StudentController;

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


Route::get('/',[PagesController::class, "index"])->name('homePage');
Route::get('/about',[PagesController::class, "about"])->name('aboutPage');

Route::group(['prefix' => '/student'], function(){
    Route::get('/manage',[StudentController::class, "index"])->name('student.manage');
    Route::get('/create',[StudentController::class, "create"])->name('student.create');
    Route::post('/store',[StudentController::class, "store"])->name('student.store');
    Route::get('/edit/{id}',[StudentController::class, "edit"])->name('student.edit');
    Route::post('/update/{id}',[StudentController::class, "update"])->name('student.update');
    Route::post('/delete/{id}',[StudentController::class, "destroy"])->name('student.destroy');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TeacheroomController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'editions'])->name('edition');
Route::get('/edition/{id}', [MainController::class, 'showEdition'])->name('show_edition');

Route::get('/collective', [MainController::class, 'collective'])->name('collective');
// Route::get('/collective/{id}', [MainController::class, 'showColleg'])->name('colleg');


Route::get('/materials', [MainController::class, 'materials'])->name('home');
Route::get('/showCategory/{id}', [MainController::class, 'showCategory'])->name('showCategory');
Route::get('/showMaterial/{id}', [MainController::class, 'showMaterial'])->name('showMaterial');
Route::get('/showMateryalType/{id}', [MainController::class, 'showMateryalType'])->name('MateryalType');

Route::middleware(['auth'])->prefix('/teacheroom')->group(function () {

    Route::get('/', [TeacheroomController::class, 'index'])->name('teacheroom');;
    Route::get('/teacherdata', [TeacheroomController::class, 'teacherdata'])->name('teacherdata');
    Route::get('/materials', [TeacheroomController::class, 'materials'])->name('teachermaterials');
    Route::get('/publish/{id}', [TeacheroomController::class, 'publish'])->name('publish');
    Route::get('/unpublish/{id}', [TeacheroomController::class, 'unpublish'])->name('unpublish');
    Route::get('/delete/{id}', [TeacheroomController::class, 'delete'])->name('delete');
    Route::get('/update/{id}', [TeacheroomController::class, 'showpageupdate'])->name('pageupdate');

    Route::post('/saveteacherdata', [TeacheroomController::class, 'saveteacherdata'])->name('saveteacherdata');
    Route::post('/updatematerial', [TeacheroomController::class, 'updatematerial'])->name('updatematerial');
    Route::post('/creatematerial', [TeacheroomController::class, 'creatematerial'])->name('creatematerial');
    Route::post('/saveteacherdata', [TeacheroomController::class, 'saveteacherdata'])->name('saveteacherdata');
});



Route::get('/logout',[AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');



require __DIR__.'/auth.php';

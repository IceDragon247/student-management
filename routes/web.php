<?php

use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController:: class, 'index']);
Route::get('/students/add', [StudentController:: class, 'add']);
Route::get('/students/{id}', [StudentController:: class, 'show']);
Route::post('/students', [StudentController:: class, 'store']);
Route::get('/students/{id}/edit', [StudentController:: class, 'edit']);
Route::delete('/students/{id}', [StudentController:: class, 'delete']);
Route::put('/students/{id}', [StudentController:: class, 'update']);

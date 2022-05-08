<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', [LoginController:: class, 'login'])->name('login');
Route::post('/login', [LoginController:: class, 'authenticate']);
Route::post('/logout', [LoginController:: class, 'logout']);

Route::middleware('auth')->group(function(){
    Route::get('/students', [StudentController:: class, 'index']);
    Route::get('/students/add', [StudentController:: class, 'add']);
    Route::get('/students/{id}', [StudentController:: class, 'show']);
    Route::post('/students', [StudentController:: class, 'store']);
    Route::get('/students/{id}/edit', [StudentController:: class, 'edit']);
    Route::delete('/students/{id}', [StudentController:: class, 'delete']);
    Route::put('/students/{id}', [StudentController:: class, 'update']);

    Route::get('/subjects', [SubjectController:: class, 'index']);
    Route::get('/subjects/add', [SubjectController:: class, 'add']);
    Route::get('/subjects/{id}', [SubjectController:: class, 'show']);
    Route::post('/subjects', [SubjectController:: class, 'store']);
    Route::get('/subjects/{id}/edit', [SubjectController:: class, 'edit']);
    Route::delete('/subjects/{id}', [SubjectController:: class, 'delete']);
    Route::put('/subjects/{id}', [SubjectController:: class, 'update']);

    Route::get('/grades', [GradeController:: class, 'index']);
    Route::get('/grades/add', [GradeController:: class, 'add']);
    Route::get('/grades/{student_id}/{subject_id}', [GradeController:: class, 'show']);
    Route::post('/grades', [GradeController:: class, 'store']);
    Route::get('/grades/{student_id}/{subject_id}/edit', [GradeController:: class, 'edit']);
    Route::delete('/grades/{student_id}/{subject_id}', [GradeController:: class, 'delete']);
    Route::put('/grades/{student_id}/{subject_id}', [GradeController:: class, 'update']);

    Route::get('/batches', [BatchController:: class, 'index']);
    Route::get('/batches/add', [BatchController:: class, 'add']);
    Route::get('/batches/{id}', [BatchController:: class, 'show']);
    Route::post('/batches', [BatchController:: class, 'store']);
    Route::get('/batches/{id}/edit', [BatchController:: class, 'edit']);
    Route::delete('/batches/{id}', [BatchController:: class, 'delete']);
    Route::put('/batches/{id}', [BatchController:: class, 'update']);

    Route::get('/faculties', [FacultyController:: class, 'index']);
    Route::get('/faculties/add', [FacultyController:: class, 'add']);
    Route::get('/faculties/{id}', [FacultyController:: class, 'show']);
    Route::post('/faculties', [FacultyController:: class, 'store']);
    Route::get('/faculties/{id}/edit', [FacultyController:: class, 'edit']);
    Route::delete('/faculties/{id}', [FacultyController:: class, 'delete']);
    Route::put('/faculties/{id}', [FacultyController:: class, 'update']);
});



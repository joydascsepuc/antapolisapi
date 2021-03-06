<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('student','App\Http\Controllers\StudentController');
Route::resource('course','App\Http\Controllers\CourseController');
Route::resource('action','App\Http\Controllers\CourseActionController');

Route::delete('dropcourse/{student_id}/{course_id}','App\Http\Controllers\CourseActionController@dropcourse');
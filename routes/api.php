<?php

use App\Http\Controllers\StudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("v1")->group(function () {
    $studentId = "students/{id}";
    Route::get("students", [StudentController::class, "getAllStudents"]);
    Route::post("students/add", [StudentController::class, "saveStudent"]);
    Route::get($studentId."/get", [StudentController::class,"getStudentById"]);
    Route::put($studentId."/edit", [StudentController::class, "updateStudentById"]);
    Route::delete($studentId."/delete", [StudentController::class, "deleteStudentById"]);
    Route::get('/students/search', [StudentController::class, 'search']);
});


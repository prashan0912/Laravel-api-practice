<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\search;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//directly return data from route via function
Route::get('/hello', function () {
    return ["name" => "Prashant Sahu", "age" => 24];
});

//directly return data from route via controller method (using classs)
Route::get("/users", [StudentController::class, "list"]);

Route::post("/add", [StudentController::class, "addUser"]);

Route::put("/update", [StudentController::class, "updateUser"]);

Route::delete("/delete", [StudentController::class, "deleteUser1"]);

Route::delete("/delete/{id}", [StudentController::class, "deleteUser2"]);

Route::get("/search/{id}", [StudentController::class,"searchUser"]);

Route::get("/searchByName/{name}", [StudentController::class,"searchUserByName"]);
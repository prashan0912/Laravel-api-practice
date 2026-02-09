<?php

use Illuminate\Support\Facades\Route;


Route::get("/data", function () {
    return ["name" => "prashant", "age" => 24];
});

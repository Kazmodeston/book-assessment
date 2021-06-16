<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// App\Http\Controllers\ExternalApi\IceAndFireApisController::class;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//ROUTE to Consume External Api
Route::get('/external-books/{nameOfABook}', [App\Http\Controllers\ExternalApi\IceAndFireApisController::class, "index"]);
});

//-------Route for BOOK API for CRUD
Route::prefix("v1")->group(function(){
    Route::apiResource("/books", App\Http\Controllers\BooksController::class);
});


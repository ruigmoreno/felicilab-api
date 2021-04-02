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


// posts
// CRUD is

// 1. get all (GET) /api/posts
// 2. creat a post (POST) /api/posts/
// 3. get a single (GET) /api/posts/{id}
// 4. update a single (PUT/PATCH) /api/posts/{id}
// 5. delete (DELETE) /api/posts/{id}

Route::get('/hello', function () {
    return ['message' => 'hello world!'];
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

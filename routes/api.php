<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\AlunosTurmasController;
use App\Http\Controllers\TurmasController;

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


// CRUD is
// 1. get all (GET) /api/posts
// 2. creat a post (POST) /api/posts/
// 3. get a single (GET) /api/posts/{id}
// 4. update a single (PUT/PATCH) /api/posts/{id}
// 5. delete (DELETE) /api/posts/{id}

Route::resource('alunos', AlunosController::class);
Route::resource('turmas', TurmasController::class);
Route::resource('alunos_turmas', AlunosTurmasController::class);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

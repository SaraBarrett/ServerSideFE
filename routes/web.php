<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UtilController::class, 'home'])->name('utils.welcome');

Route::get('/hello', function () {
    $myName= 'Sara';
    $myPass = 1234455;


    $myName = 'Margarida';

    return "<h1>Olá Mundo $myName</h1>";
})->name('utils.hello');


Route::get('/turma/{name}', function ($name) {
    //ir à base de dados e buscar toda a info da turma
    return "<h1>Turma: $name</h1>";
});


Route::get('/adicionarusers', [UserController::class, 'addUser'])->name('users.add');


//função raw que insere um user na Base de dados (teste do dbquery builder sem frontend)
Route::get('/insertintodb', [UserController::class, 'insertUserIntoDB']);

Route::get('/updateintodb', [UserController::class, 'updateUserIntoDB']);

Route::get('/deleteuser', [UserController::class, 'deleteUserFromDB']);
Route::get('/getusers', [UserController::class, 'selectUsersFromDB']);

Route::get('/allusers', [UserController::class, 'allUsers'])->name('users.all');


//rotas de tasks
Route::get('/alltasks', [TaskController::class, 'allTasks'])->name('tasks.all');

Route::fallback(function(){
    return view('utils.fallbackV');
});


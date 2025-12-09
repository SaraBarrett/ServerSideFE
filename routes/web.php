<?php

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

Route::get('/allusers', [UserController::class, 'allUsers'])->name('users.all');

Route::fallback(function(){
    return view('utils.fallbackV');
});


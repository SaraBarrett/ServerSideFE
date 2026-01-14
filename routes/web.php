<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UtilController::class, 'home'])->name('utils.welcome');

Route::get('/welcome',  function(){
    return view('welcome');
});

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


//rotas de users
//rota para visualizar o formulário de inserir user
Route::get('/adicionarusers', [UserController::class, 'addUser'])->name('users.add');

//rota que pega nos dados do formulário e os envia para o servidor
Route::post('/store-user', [UserController::class, 'storeUser'])->name('users.store');

//função raw que insere um user na Base de dados (teste do dbquery builder sem frontend)
Route::get('/insertintodb', [UserController::class, 'insertUserIntoDB']);
Route::get('/updateintodb', [UserController::class, 'updateUserIntoDB']);
Route::get('/deleteuser', [UserController::class, 'deleteUserFromDB']);
Route::get('/getusers', [UserController::class, 'selectUsersFromDB']);
Route::get('/allusers', [UserController::class, 'allUsers'])->name('users.all');

//rota que abre a view com toda a info do user
Route::get('/viewuser/{id}', [UserController::class, 'viewUser'])->name('users.view');

//rota que apaga o user
Route::get('/deleteuser/{id}', [UserController::class, 'deleteUser'])->name('users.delete');

//rotas de tasks
Route::get('/alltasks', [TaskController::class, 'allTasks'])->name('tasks.all');

//Pega nos dados do formulário e enviar dados para o servidor
Route::post('/storetask',[TaskController::class, 'storeTask'] )->name("tasks.store");//storetask é o nome dado para chamar a rota que vai chamar o controlador TaskController e a função storeTask (método post porque está a enviar dados para o servidor)

//AdicionarVisualizar o formulário inserir tasks (users)
Route::get('/addtasks',[TaskController::class, 'addTasks'] )->name("tasks.add");//addtasks é o nome dado para chamar a rota que vai chamar o controlador TaskController e a função addTasks


//Pega nos dados do formulário e enviar dados para o servidor
Route::post('/storetask',[TaskController::class, 'storeTask'] )->name("tasks.store");//storetask é o nome dado para chamar a rota que vai chamar o controlador TaskController e a função storeTask (método post porque está a enviar dados para o servidor)

Route::put('/updateUser', [UserController::class, 'updateUser'])->name('users.update');

Route::fallback(function(){
    return view('utils.fallbackV');
});


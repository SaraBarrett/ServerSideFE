<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function allTasks(){
        $tasks = DB::table('tasks')
        ->join('users', 'users.id', 'tasks.user_id')
        ->select('tasks.*', 'users.name as usname')
        ->get();



        return view('tasks.all_tasks', compact('tasks'));

    }

    public function addTasks(){
        $users = DB::table('users')->get();

        return view('tasks.add_task', compact('users'));
    }

    public function storeTask(Request $request){
        //validar os dados recebidos do formulario
        $request->validate([
            'name' => 'required|string|max:50',//validação do campo name
            'description' => 'required|string|max:50',//validação do campo email
            'utilizador' => 'required'//validação do campo password

        ]);

        Task::insert([//inserir na tabela tasks usando o modelo Task.php
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->utilizador //associar a task ao utilizador
        ]);

        return redirect()->route('tasks.all') ->with('message', 'Task adicionada com sucesso à base de dados!');//redireciona para a rota tasks.all (função allTasks) com a mensagem de sucesso
    }
}

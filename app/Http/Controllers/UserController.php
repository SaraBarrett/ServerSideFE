<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addUser(){

        $pageAdmin = 'António';
        return view('users.add_user', compact('pageAdmin'));
    }

    //função que recebe os dados do formulário, valida e insere na base de dados
    public function storeUser(Request $request){
        //dd($request->all());

        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' =>'required|min:8|string'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pasword)
        ]);

        return redirect()->route('users.all')->with('message', 'User inserido com sucesso');

    }

    public function allUsers(){
        $cesaeInfo =
        ['name' =>'cesae',
        'email' => 'cesae@gmail.com',
        'address' =>' rua do cesae'];

        //simular consulta à base de dados
        $students = [
            ['name' =>'Rafael', 'email' =>'Rafael@gmail.com'],
            ['name' =>'Mafalda', 'email' =>'Mafalda@gmail.com'],
            ['name' =>'Luís', 'email' =>'Luís@gmail.com'],
            ['name' =>'Leandro', 'email' =>'Leandro@gmail.com'],
        ];

        //dd($cesaeInfo['name']);
        $users = User::get();


        return view('users.all_users',compact('cesaeInfo', 'students', 'users'));
    }

    public function insertUserIntoDB(){
        //validar se dados estão em conformidade com a estrutura da base de dados


        //se passar em todas as validações, insere então na base de dados
        DB::table('users')
        ->updateOrInsert(
            [
            'email' => 'Rafaela8888@gmail.com'
            ],
            [
            'name'=>'Rafaela',
            'password' =>'RAfaela1234',
            'updated_at' =>now(),
            'nif' => '2444444444'
        ]);

        return response()->json('user inserido com sucesso');
    }
    public function updateUserIntoDB(){


        //validar se dados estão em conformidade com a estrutura da base de dados

        //se passar em todas as validações, actualiza então na base de dados
        DB::table('users')
        ->where('id', 3)
        ->update([
            'name'=>'Rafaela Mudou de Nome porque não gostava do antigo',
            'updated_at' => now(),
        ]);

        return response()->json('user atualizado com sucesso');
    }
    public function deleteUserFromDB(){

        //query para apagar
        DB::table('users')
        ->where('id', 5)
        ->delete();

        return response()->json('user apagado com sucesso');
    }

    public function selectUsersFromDB(){
        $users = DB::table('users')
        ->whereNull('updated_at')
        ->get();


        dd($users);
    }

    //função que vai carregar a ficha do user
    public function viewUser($id){
        //query que vai buscar o user que estou a clicar
        $user = DB::table('users')
                ->where('id', $id)
                ->first();


        // $user = User::where('id', $id)
        //         ->first();

        return view('users.view_user', compact('user'));

    }

    public function deleteUser($id){

        Db::table('tasks')
        ->where('user_id', $id)
        ->delete();

        Db::table('users')
        ->where('id', $id)
        ->delete();

        return back();
    }

    public function updateUser(Request $request){
        //dd($request->all());

         $request->validate([
            'name' => 'required|string|max:50',
        ]);

        DB::table('users')
        ->where('id', $request->id)
        ->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'nif' =>$request->nif,
        ]);

        return redirect()->route('users.all')->with('message', 'User actualizado com sucesso');

    }
}


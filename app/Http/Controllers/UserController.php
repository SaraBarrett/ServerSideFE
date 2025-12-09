<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(){

        $pageAdmin = 'António';
        return view('users.add_user', compact('pageAdmin'));
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



        return view('users.all_users',compact('cesaeInfo', 'students'));
    }

}

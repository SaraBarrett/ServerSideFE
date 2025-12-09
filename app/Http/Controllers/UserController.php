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
        $cesaeEmail = 'info@cesae.pt';

        return view('users.all_users',compact('cesaeEmail'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class TasksappController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find( auth()->id() );
        return view('tasksapp.index', ['user' => $user]);
    }

   
}

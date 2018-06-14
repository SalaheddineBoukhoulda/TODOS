<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index(){
        $todosModel = Todo::all();
        return view('Todos')->with('todos',$todosModel);
    }
}

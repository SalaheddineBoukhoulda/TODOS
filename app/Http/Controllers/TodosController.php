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


    public function store(Request $request){
        $todosModel = new Todo;
        $todosModel->todo = $request->todo;
        $todosModel->save();
        return redirect()->back();
    }


    public function delete($id){
        $todosModel = Todo::find($id);
        $todosModel->delete();
        return redirect()->back();        
    }
}

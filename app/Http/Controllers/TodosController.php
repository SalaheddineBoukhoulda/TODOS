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


    public function update($id){
        $todosModel = Todo::find($id);
        return view('Update')->with('todo',$todosModel);
    }


    public function save(Request $request,$id){
        $todosModel = Todo::find($id);
        $todosModel->todo = $request->todo;
        $todosModel->update();
        return redirect('/todos');                
    }
}

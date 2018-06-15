<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;

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
        Session::flash('success','Your Todo was created');
        return redirect()->back();
    }


    public function delete($id){
        $todosModel = Todo::find($id);
        $todosModel->delete();
        Session::flash('success','Your Todo was deleted');
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
        Session::flash('success','Your Todo was updated');
        return redirect('/todos');     
    }

    public function complete($id){
        $todosModel = Todo::find($id);
        $todosModel->completed = 1;
        $todosModel->update();
        Session::flash('success','Your Todo set as completed');
        return redirect()->back();
    }
}

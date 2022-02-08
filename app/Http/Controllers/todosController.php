<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class todosController extends Controller
{
    /**
     * index para mostrar todos los elementos
     * store para guardad un registro
     * update para actualizar un registro
     * destroy para eliminar un registro   
     * edit para mostrar formulario de edicion
     */

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3'
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success','Tarea creada correctamente');


    }

    public function index(){
        $todo = Todo::all();
        return view('todo.index',['todos' => $todo]);
    }

    public function show($id){
        $todo = Todo::find($id);
        return view('todo.show',['todo' => $todo]);
    }

    public function update(Request $request,$id){
        $todo = Todo::find($id);

        $todo->title = $request->title;

       $todo->save();

       return redirect()->route('todos')->with('success','Tarea actualizada');

    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success','La tarea se ha eliminado');
    }
}

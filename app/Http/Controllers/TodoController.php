<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        $todos = auth()->user()->todos->sortBy('confirmed');
        // return $todos;
        // $todos = Todo::orderBy('confirmed')->get(); // orderBy sur eloquent orm
        return view('todos.index', compact('todos'));
    }

    public function create() {
        return view('todos.create');
    }

    public function edit(Todo $todo) {  //Route model binding
        // $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo) {
        $todo->update(['title'=> $request->title]);
        return redirect(route('todo.index'))->with('message', 'Modifié !');
        // dd($request->all());
        // return view('todos.update');
    }

    public function confirmed(Todo $todo) {
        
        $todo->update(['confirmed'=>true]);
        return redirect()->back()->with('message', 'Tâche complété.');
    }

    public function inconfirmed(Todo $todo) {
        
        $todo->update(['confirmed'=>false]);
        return redirect()->back()->with('message', 'Tâche incomplète.');
    }

    public function destroy(Todo $todo) {
        $todo->delete();
        return redirect()->back()->with('message', 'Tâche supprimé.');
    }

    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function store(TodoCreateRequest $request) {
        

        $todo = auth()->user()->todos()->create($request->all());
        
    
        return redirect(route('todo.index'))->with('message', 'Todo créer avec succès');
    }
}

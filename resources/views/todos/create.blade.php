@extends('todos.layout')

@section('content')
<h1 class="text-2xl underline font-bold">Ajouter une tâche</h1>
        <x-alert />
        <form method="post" action="{{route('todo.store')}}" class="py-5">
            @csrf
            <div><input type="text" name="title" class="py-2 px-2 border rounded"/></div>
            
            <div><input type="submit" value="Créer" class="p-2 border rounded bg-blue-300 text-white cursor-pointer"/></div>
        </form>
    <a href="{{route('todo.index')}}" class="mx-5 py-1 px-1 bg-yellow-200 cursor-pointer border rounded ">Retour</a>
@endsection
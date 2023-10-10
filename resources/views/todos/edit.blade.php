@extends('todos.layout')

@section('content')
<h1 class="text-2xl font-bold border-b pb-4">Modifier sa tâche</h1>
<x-alert />
<form method="post" action="{{route('todo.update',$todo->id)}}" class="py-5">
    @csrf
    @method('patch')
    <input class="px-2 py-2 border rounded" type="text" name="title" value="{{$todo->title}}"/>
    <input class="p-2 bg-orange-400 cursor-pointer border rounded text-white" type="submit" value="Modifier"/>
</form>

<a href="{{route('todo.index')}}" class="mx-5 py-1 px-1 bg-yellow-200 cursor-pointer border rounded ">Retour</a>
@endsection
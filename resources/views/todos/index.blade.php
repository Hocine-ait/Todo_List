@extends('todos.layout')

@section('content')
<div class=" flex justify-between border-b pb-4 px-3 ">
    <h1 class="text-2xl font-bold underline">Liste To-do</h1>
    <a href="{{route('todo.create')}}" class="mx-5 py-2 text-blue-400 cursor-pointer  ">
        <span class="fas fa-plus-circle" />
    </a>
</div>
<ul class="my-5">
    <x-alert />
    @if($todos->count()>0)
    @foreach ($todos as $todo )
    <li class="flex justify-between py-3 px-4 ">
        <div>
            @include('todos.complete-button')
        </div>
        @if($todo->confirmed)
            <p class="line-through">{{$todo->title;}}</p>
            @else
            <p >{{$todo->title;}}</p>
        @endif    
        <div >

            <a href="{{route('todo.edit',$todo->id)}}" class="cursor-pointer text-white">
            <span class="fas fa-edit text-orange-500" /></a>

            <span class="fas fa-trash text-red-500 cursor-pointer pl-1" 
                onclick="event.preventDefault();
                if(confirm('Êtes-vous sûr de supprimer cette tâche?')){
                document.getElementById('form-delete-{{$todo->id}}')
                .submit()}" />
            <form style="display:none" 
                    id="{{'form-delete-'.$todo->id}}"
                        method="post" 
                        action="{{route('todo.destroy',$todo->id)}}">
                    @csrf
                    @method('delete')
                </form>
            
        </div>
    </li>
    @endforeach
    @else
        <p class="font-bold text-gray-600">Aucune tâche, veuillez en créer.</p>
    @endif
</ul>

@endsection
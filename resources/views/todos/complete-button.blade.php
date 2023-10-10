@if($todo->confirmed)
                <span class="fas fa-check px-2 text-green-500 cursor-pointer"
                    onclick="event.preventDefault();
                    document.getElementById('form-inconfirmed-{{$todo->id}}')
                    .submit()" />
                
                 <form style="display:none" 
                    id="{{'form-inconfirmed-'.$todo->id}}"
                     method="post" 
                     action="{{route('todo.inconfirmed',$todo->id)}}">
                    @csrf
                    @method('delete')
                </form>

                @else
                <span onclick="event.preventDefault();
                    document.getElementById('form-confirmed-{{$todo->id}}').submit()" 
                    class="fas fa-check px-2 text-gray-400 cursor-pointer" />
                <form style="display:none" id="{{'form-confirmed-'.$todo->id}}" method="post" action="{{route('todo.confirmed',$todo->id)}}">
                    @csrf
                    @method('put')
                </form>
                @endif
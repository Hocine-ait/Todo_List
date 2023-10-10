<div>
    @if(session()->has('message')) 
    {{-- {{session()->forget('message')}}    A faire une fois et à supprimer pour retirer le message alert success lors du raffraichissement--}} 
        <div class="py-4 px-2 bg-green-200 my-4">{{session()->get('message')}}</div>  {{-- success Message --}}
    @elseif(session()->has('error'))
        <div class="py-4 px-2 bg-red-200 my-4">{{session()->get('error')}}</div>
    @endif

    @if ($errors->any())
    <div class="py-4 px-2 bg-red-200 my-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
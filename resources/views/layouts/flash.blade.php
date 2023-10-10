@if(session()->has('message')) 
{{-- {{session()->forget('message')}}    A faire une fois et à supprimer pour retirer le message alert success lors du raffraichissement--}} 
    <div class="alert alert-success">{{session()->get('message')}}</div>  {{-- success Message --}}
@elseif(session()->has('error'))
    <div class="alert alert-danger">{{session()->get('error')}}</div>
@endif
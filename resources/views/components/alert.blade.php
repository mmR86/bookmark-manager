@props(['type', 'message'])

@if(session()->has($type))
<div class="absolute w-40 m-5 p-5 text-sm text-green-500 font-bold rounded {{$type == 'success' ? 'bg-yellow-200' : 'bg-red-500'}} scale-in-tl">
    {{$message}}
</div>
@endif
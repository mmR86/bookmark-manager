@props(['type', 'message'])

@if(session()->has($type))
<div class="absolute w-40 m-5 p-5 text-sm font-bold rounded {{$type == 'success' ? 'bg-yellow-200 text-green-500' : 'bg-red-500 text-yellow-200'}} scale-in-tl">
    {{$message}}
</div>
@endif
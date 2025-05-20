@props(['url' => '/', 'active' => false, 'mobile' => null])

<a href="{{$url}}" class="text-yellow-200 font-bold text-xl hover:underline py-2 {{$active ? 'text-yellow-400' : ''}}">
    {{$slot}}
</a>
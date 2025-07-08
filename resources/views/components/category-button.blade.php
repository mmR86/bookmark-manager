@props(['category' => null])

<button @click="selectedCategory = '{{$category['category']}}'" class="flex items-center gap-2 bg-white font-semibold border border-blue-500 py-2 px-4 rounded-full pos-50 cat-btn mt-1">
    {{$category['category']}}
    <img class="w-6 h-6 rounded-full" src={{$category['logo']}} />
</button>
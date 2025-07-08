@props(['bookmark'])
{{-- Try to do everything with grid --}}
<div x-show="selectedCategory === 'all' || selectedCategory === '{{$bookmark->category}}'" class="rounded-lg shadow-md bg-gray-200 p-10 m-2" >
    <h2 class="text-xl font-semibold">{{$bookmark->title}}</h2>
    <div class="flex justify-between" >
        <div class="flex-col mb-2">
        <p class="text-m mt-3"><b>Author:</b> {{$bookmark->author}}</p>
        <div class="flex gap-5">
            <p class="text-m mt-3"><b>Category:</b> </p>
            <img src={{$bookmark->logo}} alt={{$bookmark->category}} class="w-12 h-12 rounded-full" />
        </div>     
        </div>
        <div class="flex gap-5 items-center mr-2">
            <a href="{{$bookmark->url}}" target="blank"><button class="w-20 bg-yellow-200 hover:bg-yellow-400 text-white px-4 py-2 rounded focus:outline-none cursor"><p class="text-green-500 font-bold">Visit</p></button></a>
            <form method="POST" action="{{route('bookmarks.destroy', $bookmark->id)}}" onsubmit="return confirm('Are you sure you wnat to delete this bookmark?')">
                @csrf
                @method('DELETE')
                <button class="w-20 bg-red-600 hover:bg-red-800 text-white px-4 py-2 rounded focus:outline-none cursor" type="submit"><p class="text-yellow-200 font-bold">Delete</p></button>
            </form> 
        </div>
    </div>
    <div class="flex gap-5">
        <p class="text-sm text-gray-500">{{$bookmark->description}}</p>
        <img src={{$bookmark->image}} alt={{$bookmark->description}} class="w-50 rounded-md" />
    </div>  
</div>
<x-layout>
    <x-header-banner h1='My Dashboard'/>
    <h2 class="mt-5 mb-5 font-bold text-3xl text-gray-600 text-center">Welcome {{Auth::user()->name}}, order your bookmarks as you wish.</h2>
    <div class="flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow md w-xl flex flex-col items-center">
            <h3 class="text-2xl font-bold text-gray-600 mb-4">Profile Info</h3>
            <img src="{{asset('imgs/default-avatar.png')}}" alt="default avatar" class="w-46 h-46 rounded-full">
        </div>    
    </div>
</x-layout>
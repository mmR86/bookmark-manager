<x-layout>
    <x-header-banner h1='My Dashboard'/>
    <h2 class="mt-5 mb-5 font-bold text-3xl text-gray-600 text-center">Welcome {{Auth::user()->name}}, order your bookmarks as you wish.</h2>
    <div class="flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow md w-md flex flex-col items-center">
            <h3 class="text-2xl font-bold text-gray-600 mb-4">Update Profile Info</h3>
            <img src="{{asset('imgs/default-avatar.png')}}" alt="default avatar" class="w-46 h-46 rounded-full">
            <x-text id="name" name="name" placeholder="Full Name" />
            <button class="w-full bg-yellow-200 hover:bg-yellow-400 text-white px-4 py-2 rounded focus:outline-none" type="submit"><p class="text-green-500 font-bold">Update</p></button>
        </div>    
    </div>
</x-layout>
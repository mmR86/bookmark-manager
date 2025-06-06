<x-layout>
    
    <x-header-banner h1='Register'/>
    <div class="flex justify-center items-center">
        <div class="bg-white rounded-lg shadow md w-md md:max-w-xlmx-auto mt-8 p-6 mb-8">
            <form method="POST" action="{{route('register.store')}}">
                @csrf
                <x-text id="name" name="name" placeholder="Full Name" />
                <x-text id="email" name="email" placeholder="Email Adress" type="email" />
                <x-text id="password" name="password" type="password" placeholder="Password" />
                <x-text id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" />
                <button class="w-full bg-yellow-200 hover:bg-yellow-400 text-white px-4 py-2 rounded focus:outline-none" type="submit"><p class="text-green-500 font-bold">Register</p></button>
            </form>
        </div>
    </div>
</x-layout>
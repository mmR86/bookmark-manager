<x-layout>
    
    <x-header-banner h1='Login'/>
    <div class="flex justify-center items-center">
        <div class="bg-white rounded-lg shadow md w-md md:max-w-xlmx-auto mt-12 p-8 py-12">
            <form method="POST" action="{{route('login.authenticate')}}">
                @csrf
                <x-text id="email" name="email" placeholder="Email Adress" type="email" />
                <x-text id="password" name="password" type="password" placeholder="Password" />
                <button class="w-full bg-yellow-200 hover:bg-yellow-400 text-white px-4 py-2 rounded focus:outline-none" type="submit"><p class="text-green-500 font-bold">Login</p></button>
            </form>
        </div>
    </div>
</x-layout>
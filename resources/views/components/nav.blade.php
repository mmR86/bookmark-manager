<div class="bg-green-500 p-4 flex justify-between">
   <div  class="flex gap-4">
      @auth
      <x-logout-button />
      <x-nav-link url='/dashboard' :active="request()->is('dashboard')">Dashboard</x-nav-link>
      @else
      <x-nav-link url='/login' :active="request()->is('login')">Login</x-nav-link>
      <x-nav-link url='/register' :active="request()->is('register')">Register</x-nav-link>
      @endauth  
   </div>
   <x-nav-link url='/' :active="request()->is('/')">Home</x-nav-link>
</div>
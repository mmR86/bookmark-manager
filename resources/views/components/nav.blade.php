<div class="bg-green-500 p-4 flex justify-between">
   <div  class="flex gap-4">
      <x-nav-link url='/login' :active="request()->is('login')">Login</x-nav-link>
      <x-nav-link url='/register' :active="request()->is('register')">Register</x-nav-link>
      <x-logout-button />
      <x-nav-link url='/dashboard' :active="request()->is('dashboard')">Dashboard</x-nav-link>
   </div>
   <a href='/' class="{{request()->is('/') ? 'text-yellow-400' : 'text-yellow-200'}} font-bold text-xl hover:underline py-2">Home</a>
</div>
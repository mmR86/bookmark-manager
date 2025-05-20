<form method="POST" action="{{route('logout')}}">
    @csrf
    <button type="submit" class="text-yellow-200 font-bold text-xl hover:underline py-2">Logout</button>
</form>
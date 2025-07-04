<x-layout>
    
    <x-header-banner h1="Your Bookmarks"/>
    <div>
        
        @forelse($bookmarks as $bookmark)
            <h2>{{$bookmark->title}}</h2>
        @empty
            <p>You do not have any bookmarks yet, son!</p>
        @endforelse
        
    </div>
</x-layout>
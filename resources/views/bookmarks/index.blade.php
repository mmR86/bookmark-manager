<x-layout>
    <x-header-banner h1="Your Bookmarks"/>
    <div x-data="{selectedCategory: 'all'} ">
        <div class="flex justify-evenly">
            @foreach($categories as $category)
                <x-category-button :category='$category' />
            @endforeach
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 m-3 mt-10">
            @forelse($bookmarks as $bookmark)
                <x-card :bookmark='$bookmark' />
            @empty
                <p>You do not have any bookmarks yet, son!</p>
            @endforelse 
        </div>
    </div>   
</x-layout>
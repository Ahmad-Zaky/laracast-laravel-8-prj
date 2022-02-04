<x-layout.app>
    
    @include('posts.partials._header')
    
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts.index :posts="$posts" />
            
            {{-- Pagination --}}
            {{$posts->links()}}
            
        @else
            <p class="text-center text-2xl">No posts yet. Please check back again.</p>
        @endif
    </main>

</x-layout.app>
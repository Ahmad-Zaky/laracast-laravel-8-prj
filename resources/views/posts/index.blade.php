<x-layout.app>
    
    @include('posts.partials._header')
    
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts.index :posts="$posts" />
            
            <x-layout.reuse.panel class="bg-gray-50">
                {{-- Pagination --}}
                {{$posts->links()}}
            </x-layout.reuse.panel>
            
        @else
            <p class="text-center text-2xl">No posts yet. Please check back again.</p>
        @endif
    </main>

</x-layout.app>
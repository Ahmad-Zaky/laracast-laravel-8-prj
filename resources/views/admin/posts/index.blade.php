<x-layout.app>
    
    <x-layout.setting :heading="'Manage Posts'">
        <main>
            @if ($posts->count())
                
                {{-- Posts --}}
                <x-admin.posts.index :posts="$posts" />
                
                {{-- Pagination --}}
                @if ($posts->currentPage() != $posts->lastPage())
                    <x-layout.reuse.panel class="bg-gray-50">
                        {{ $posts->links() }}
                    </x-layout.reuse.panel>
                @endif
                
            @else
                <p class="text-center text-2xl">No posts yet. Please check back again.</p>
            @endif
        </main>
    </x-layout.setting>

</x-layout.app>
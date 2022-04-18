@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
        
    <h1 class="text-lg font-bold mb-4 mb-8 pb-2 border-b">
        {{ $heading }}
    </h1> 

    <div class="flex">
        <x-layout.reuse.panel class="mr-4">
            <aside class="w-48">
                
                <h4 class="font-semibold mb-4">Links</h4>
                
                <hr>

                <ul class="mt-4">
                    <li>
                        <a 
                            href="{{ route('admin.dashboard') }}"
                            class="@if (request()->routeIs('admin.dashboard')) text-blue-500 @endif"
                        >
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a 
                            href="{{ route('admin.posts.index') }}"
                            class="@if (request()->routeIs('admin.posts.index')) text-blue-500 @endif"
                        >
                            All Posts
                        </a>
                    </li>
                    <li>
                        <a 
                            href="{{ route('admin.posts.create') }}"
                            class="@if (request()->routeIs('admin.posts.create')) text-blue-500 @endif"
                        >
                            New Post
                        </a>
                    </li>
                </ul>
            </aside>
        </x-layout.reuse.panel>
    
        <main class="flex-1">
            <x-layout.reuse.panel>
                {{ $slot }}
            </x-layout.reuse.panel>
        </main>
    </div>
</section>
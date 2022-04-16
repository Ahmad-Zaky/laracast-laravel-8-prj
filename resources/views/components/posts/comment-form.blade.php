@props(['post'])

<x-layout.reuse.panel>
    <form method="POST" action="{{ route('posts.comments.store', $post->slug) }}">
        @csrf
    
        <header class="flex items-center">
            
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" width="60" height="60" alt="avatar" class="rounded-xl">
            
            <h2 class="ml-4">Want to participate ?</h2>
    
        </header>
        
        <div class="mt-6">
            <textarea 
                name="body"
                class="p-1 w-full text-sm focus:outline-none focus:ring"
                rows="5"
                placeholder="Quick, thinkg of something to say ..."
                required
            ></textarea>
            
            <x-layout.reuse.inline-error :field="'body'" />

        </div>
    
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-layout.reuse.button.primary>post</x-layout.reuse.button.primary> 
        </div>
    </form>
</x-panel>
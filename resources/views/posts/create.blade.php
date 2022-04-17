<x-layout.app>
    <section class="py-8 max-w-md mx-auto">
        
        <h3 class="text-lg font-bold mb-4">
            Publish New Post
        </h3>

        <x-layout.reuse.panel>
            <form method="POST" action="{{ route("posts.store") }}" enctype="multipart/form-data">
                
                @csrf

                <div class="mb-6">
                    <label 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="title" 
                    >
                        Title
                    </label>

                    <input 
                        class="border border-gray-400 p-2 w-full rounded" 
                        type="text" 
                        name="title"
                        id="title"
                        value="{{ old('title') }}" 
                        required
                    >

                    <x-layout.reuse.inline-error :field="'title'" />
                    <x-layout.reuse.inline-error :field="'slug'" />

                </div>

                <div class="mb-6">
                    <label 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="excerpt" 
                    >
                        Excerpt
                    </label>

                    <input 
                        class="border border-gray-400 p-2 w-full rounded" 
                        type="text" 
                        name="excerpt"
                        id="excerpt"
                        value="{{ old('excerpt') }}" 
                        required
                    >

                    <x-layout.reuse.inline-error :field="'name'" />

                </div>

                <div class="mb-6">
                    <label 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="thumbnail" 
                    >
                        Thumbnail
                    </label>

                    <input 
                        class="border border-gray-400 p-2 w-full rounded" 
                        type="file" 
                        name="thumbnail"
                        id="thumbnail"
                        value="{{ old('thumbnail') }}" 
                        required
                    >

                    <x-layout.reuse.inline-error :field="'thumbnail'" />

                </div>

                <div class="mb-6">
                    <label 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="body" 
                    >
                        Body
                    </label>

                    <input 
                        class="border border-gray-400 p-2 w-full rounded" 
                        type="text" 
                        name="body"
                        id="body"
                        value="{{ old('body') }}" 
                        required
                    >

                    <x-layout.reuse.inline-error :field="'body'" />

                </div>


                <div class="mb-6">
                    <label 
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="category_id" 
                    >
                        Category
                    </label>

                    <select name="category_id" id="category_id" required>

                        <option value="0">Select a Category</option>
                        
                        @isset($categories)                        
                            @foreach ($categories as $category)

                                <option 
                                    value="{{$category->id}}"
                                    @if ($category->id == old('category')) selected @endif
                                >
                                    {{ ucwords($category->name) }}
                                </option>

                            @endforeach
                        @endisset
                    
                    </select>

                    <x-layout.reuse.inline-error :field="'category'" />

                </div>
                
                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Publish
                    </button>
                </div>

            </form>
        </x-layout.reuse.panel>
    </section>
</x-layout.app>
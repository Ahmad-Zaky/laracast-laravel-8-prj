<x-layout.app>
    <x-layout.setting :heading="'Edit Post: '. Str::ucfirst($post->title)">
        <form method="POST" action="{{ route("admin.posts.update", $post->id) }}" enctype="multipart/form-data">
            
            @csrf
            @method('PUT')

            {{-- TODO: we should handle the title/slug  error validation --}}
            <x-layout.form.input :name="'title'" :value="old('title', $post->title)" :type="'text'" :required="1"/>

            <x-layout.form.textarea :name="'excerpt'" :required="1">
                {{ old('excerpt', trim($post->excerpt)) }}
            </x-layout.form.textarea>
            
            <div class="flex mt-6">
                <div class="flex-1">
                    <x-layout.form.input :name="'thumbnail'" :value="old('thumbnail', $post->thumbnail)" :type="'file'" :required="0"/>
                </div>

                {{-- Post Thumbnail  --}}
                @if ($post->thumbnail)
                    <img src="{{ asset('storage/'. $post->thumbnail)}}" alt="" class="rounded-xl" width="100">
                @else
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl ml-6" width="100">
                @endif
            </div>
            
            <x-layout.form.textarea :name="'body'" :required="1">
                {{ old('body', trim($post->body)) }}
            </x-layout.form.textarea>

            <x-layout.form.select :name="'category_id'" :label="'category'"  :values="$categories" :selected="old('category_id', $post->category_id)" :required="1"/>
            
            <div class="mb-6">
                <x-layout.reuse.button.primary>
                    Save
                </x-layout.reuse.button.primary> 
            </div>

        </form>
    </x-layout.setting>
</x-layout.app>
<x-layout.app>
    <x-layout.setting :heading="'Publish New Post'">
        <form method="POST" action="{{ route("admin.posts.store") }}" enctype="multipart/form-data">
            
            @csrf

            {{-- TODO: we should handle the title/slug  error validation --}}
            <x-layout.form.input :name="'title'" :value="old('title')" :type="'text'" :required="1"/>

            <x-layout.form.textarea :name="'excerpt'" :value="old('excerpt')" :required="1"/>

            <x-layout.form.input :name="'thumbnail'" :value="old('thumbnail')" :type="'file'" :required="1"/>
            
            <x-layout.form.textarea :name="'body'" :value="old('body')" :required="1"/>
           
            <x-layout.form.select :name="'category_id'"  :values="$categories" :selected="old('category_id')" :required="1"/>
            
            <div class="mb-6">
                <x-layout.reuse.button.primary>
                    Publish
                </x-layout.reuse.button.primary> 
            </div>

        </form>
    </x-layout.setting>
</x-layout.app>
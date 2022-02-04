<x-layout.dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-36 flex lg:inline-flex">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories'}}

            <x-layout.icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"></x-layout.icon>
        
        </button>
    </x-slot>

    <x-layout.dropdown-item 
        href="{{ route('posts.index') }}"
        :active="request()->routeIs('posts.index')"
    >
        All
    </x-layout.dropdown-item>
    
    @foreach ($categories as $category)

        <x-layout.dropdown-item 
            href="{{ route('posts.index', ['category' => $category->slug]) }}"
            :active="request()->fullUrlIs(route('categories.posts', $category->slug))"
        >
            {{ ucwords($category->name) }}
        </x-layout.dropdown-item>

    @endforeach
</x-layout.dropdown>
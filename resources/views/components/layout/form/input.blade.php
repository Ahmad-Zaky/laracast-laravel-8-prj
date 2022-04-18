@props(['name', 'required'])

<x-layout.form.field>    

    <x-layout.form.label :label="$name" />

    <input 
        class="border border-gray-200 p-2 w-full rounded" 
        name="{{ $name }}"
        id="{{ $name }}"
        @if ($required == 1) required @endif
        {{ $attributes(['value' => old($name)]) }}
    >

    <x-layout.reuse.inline-error :field="$name" />

</x-layout.form.field>
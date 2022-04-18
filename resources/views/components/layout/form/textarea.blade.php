@props(['name', 'label', 'value', 'type', 'required'])

<x-layout.form.field>    

    <x-layout.form.label :label="$label ?? $name" />

    <textarea
        class="border border-gray-200 p-2 w-full rounded" 
        name="{{ $name }}"
        id="{{ $name }}"
        cols="30"
        rows="10"
        @if ($required == 1) required @endif
    >
        {{ $slot ?? old($name) }}
    </textarea>

    <x-layout.reuse.inline-error :field="$name" />

</x-layout.form.field>
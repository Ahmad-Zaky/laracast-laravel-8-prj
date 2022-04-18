@props(['name', 'label', 'values', 'selected', 'required'])

<x-layout.form.field>    

    <x-layout.form.label :label="$label ?? $name" />

    <select 
        name="{{ $name }}" 
        id="{{ $name }}"
        @if ($required == 1) required @endif
    >

        <option value="0">Select an Option</option>
        
        @isset($values)                        
            @foreach ($values as $value)
    
                <option 
                    value="{{$value->id}}"
                    @if ($value->id == $selected) selected @endif
                >
                    {{ ucwords($value->name) }}
                </option>
    
            @endforeach
        @endisset
    
    </select>

    <x-layout.reuse.inline-error :field="$name" />

</x-layout.form.field>




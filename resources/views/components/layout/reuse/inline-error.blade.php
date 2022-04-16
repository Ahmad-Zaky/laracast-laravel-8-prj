@props(['field'])

@error($field)
    <div class="invalid-feedback">
        <p class="text-red-500 text-xs mt-1">
            {{ $message }}
        </p>
    </div>
@enderror
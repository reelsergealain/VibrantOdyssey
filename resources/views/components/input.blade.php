<div>
    
    <div class="mb-3 form-check">
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
        <input autocomplete="off" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name) }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror "
            id="{{ $name }}" aria-describedby="{{ $name }}Help">
        <div class="invalid-feedback">
            @error($name)
                {{ $message }}
            @enderror
        </div>
        <div id="{{ $name }}Help" class="form-text">{{ $help }}</div>
    </div>
</div>

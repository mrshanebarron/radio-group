<div style="{{ $this->layout === 'horizontal' ? 'display: flex; flex-wrap: wrap; gap: 16px;' : 'display: flex; flex-direction: column; gap: 12px;' }}">
    @foreach($this->options as $optionValue => $label)
        <label style="display: flex; align-items: center; gap: 12px; {{ $this->disabled ? 'opacity: 0.5; cursor: not-allowed;' : 'cursor: pointer;' }}">
            <input
                type="radio"
                wire:click="selectOption('{{ $optionValue }}')"
                @if($this->name) name="{{ $this->name }}" @endif
                value="{{ $optionValue }}"
                @checked($this->value === $optionValue)
                @if($this->disabled) disabled @endif
                style="width: 16px; height: 16px; accent-color: #2563eb;"
            >
            <span style="font-size: 14px; font-weight: 500; color: #111827;">{{ $label }}</span>
        </label>
    @endforeach
</div>

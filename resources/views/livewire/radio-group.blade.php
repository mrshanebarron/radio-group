<div class="{{ $layout === 'horizontal' ? 'flex flex-wrap gap-4' : 'space-y-3' }}">
    @foreach($options as $optionValue => $label)
        <label class="flex items-center gap-3 {{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}">
            <input
                type="radio"
                wire:click="selectOption('{{ $optionValue }}')"
                @if($name) name="{{ $name }}" @endif
                value="{{ $optionValue }}"
                @checked($value === $optionValue)
                @if($disabled) disabled @endif
                class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 focus:ring-2"
            >
            <span class="text-sm font-medium text-gray-900">{{ $label }}</span>
        </label>
    @endforeach
</div>

<div x-data="{ selected: @entangle('value').live }">
    @if($label)
        <label class="block text-sm font-medium text-gray-900 mb-2">{{ $label }}</label>
    @endif

    <div class="{{ $orientation === 'horizontal' ? 'flex flex-wrap gap-4' : 'space-y-2' }}">
        @foreach($options as $optValue => $optLabel)
            @if($style === 'cards')
                <div
                    @click="selected = '{{ $optValue }}'"
                    :class="selected === '{{ $optValue }}' ? 'border-{{ $color }}-600 ring-2 ring-{{ $color }}-600' : 'border-gray-300'"
                    class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none"
                >
                    <div class="flex w-full items-center justify-between">
                        <div class="flex items-center">
                            <div class="text-sm">
                                <p class="font-medium text-gray-900">{{ $optLabel }}</p>
                            </div>
                        </div>
                        <div
                            x-show="selected === '{{ $optValue }}'"
                            class="shrink-0 text-{{ $color }}-600"
                        >
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <input type="radio" name="{{ $name }}" value="{{ $optValue }}" x-model="selected" class="sr-only">
                </div>
            @elseif($style === 'buttons')
                <button
                    type="button"
                    @click="selected = '{{ $optValue }}'"
                    :class="selected === '{{ $optValue }}' ? 'bg-{{ $color }}-600 text-white' : 'bg-white text-gray-900 hover:bg-gray-50'"
                    class="px-4 py-2 text-sm font-medium border rounded-md focus:outline-none focus:ring-2 focus:ring-{{ $color }}-600"
                >
                    {{ $optLabel }}
                </button>
            @else
                <div class="flex items-center">
                    <input
                        type="radio"
                        name="{{ $name }}"
                        value="{{ $optValue }}"
                        x-model="selected"
                        class="h-4 w-4 border-gray-300 text-{{ $color }}-600 focus:ring-{{ $color }}-600"
                    >
                    <label class="ml-3 text-sm font-medium text-gray-900">{{ $optLabel }}</label>
                </div>
            @endif
        @endforeach
    </div>
</div>

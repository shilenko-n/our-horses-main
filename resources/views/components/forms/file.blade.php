@props([
    'color'         => 'pale',
    'label'         => '',
    'hint'          => '',
    'error'         => '',
    'horizontal'    => false,
    'mini'          => false,
    'model'         => '',
])

<label
    {{ $attributes->merge(['id' => null]) }}
    @class([
        'input input_' . $color,
        'input_horizontal' => $horizontal,
        'input_error' => $error,
	    $attributes->get('class'),
    ])

    @if ($attributes->has(':error'))
        :class="{ 'input_error': {{ $attributes->get(':error') }} }"
    @endif
>

    {{-- label --}}
    @if ($label)
        <div class="input__label">
            <span>{{ $label }}</span>
            <span class="input__label-required-char">*</span>
        </div>
    @endif

    {{-- field --}}
    @if($mini)
        <span class="input-file">
			<input type="file" id="chatFileInput" {{ $attributes->filter(fn($value, $key) => !in_array($key, ['id', 'class', ':error'])) }} />
			<label for="chatFileInput" class="input-file__button"><x-icon icon="file-image-solid"></x-icon></label>
		</span>
    @else
        <input wire:model.live="{{$model}}" type="file" {{ $attributes->filter(fn($value, $key) => !in_array($key, ['id', 'class', ':error'])) }} @class(['input__field']) />
    @endif

    {{-- hint --}}
    @if ($hint)
        <div class="input__hint">{{ $hint }}</div>
    @endif

    {{-- error blade --}}
    @if ($error)
        <div class="input__error">{{ $error }}</div>
    @endif

    {{-- error vue --}}
    @if ($attributes->has(':error'))
        <div class="input__error" v-html="{{ $attributes->get(':error') }}"></div>
    @endif
</label>

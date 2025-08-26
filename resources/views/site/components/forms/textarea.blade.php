<label
	{{ $attributes->merge(['id' => null])->class([
		'input input_' . $color,
		'input_error' => $error,
	]) }}
	@if ($attributes->has(':error'))
		:class="{ 'input_error': {{ $attributes->get(':error') }} }"
	@endif
>
	{{-- field --}}
	<textarea
		{{ $attributes->filter(fn ($value, $key) => !in_array($key, ['id', 'class', ':error'])) }}
		class="input__field"
	>{{ $slot }}</textarea>

	{{-- label --}}
	@if ($label)
		<div class="input__label">
			<span>{{ $label }}</span>
			<span class="input__label-required-char"> *</span>
		</div>
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

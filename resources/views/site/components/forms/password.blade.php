<label
	{{ $attributes->merge(['id' => null]) }} @class([
		'input input_' . $color,
		'input_error' => $error,
		'input_' . $size => $size,
		'js-password-input',
		$attributes->get('class'),
	]) @if ($attributes->has(':error')) :class="{ 'input_error': {{ $attributes->get(':error') }} }" @endif>
	{{-- field --}}
	<input type="password" {{ $attributes->filter(fn($value, $key) => !in_array($key, ['id', 'class', ':error'])) }} @class(['input__field', 'input__field_icon-right']) />

	{{-- icon --}}
	<x-icon class="input__icon" icon="eye-slash-solid" />

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

<label {{ $attributes->merge(['id' => null])->class(['select', 'select_error' => $error, 'select_' . $size => $size]) }}>

	<select {{ $attributes->filter(fn($value, $key) => !in_array($key, ['id', 'class', ':error']))->class(['select__select', 'select__select_dropdown' => $isDropdown]) }}>
		{{ $slot }}
	</select>

	@if ($label)
		<div class="select__label">
			<span>{{ $label }}</span>
			<span class="select__label_required"> *</span>
		</div>
	@endif

	@if ($hint)
		<div class="select__hint">{{ $hint }}</div>
	@endif

	@if ($error)
		<div class="select__error">{{ $error }}</div>
	@endif
</label>

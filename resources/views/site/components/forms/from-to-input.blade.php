<div class="from-to-input">
	<label class="from-to-input__label">{{ $label }}</label>
	<div class="from-to-input__fields">
		<div class="from-to-input__field">
			<x-forms.input :min="$min" :max="$max" :type="$type" label="От" :name="$name . '[from]'" />
		</div>
		<div class="from-to-input__field">
			<x-forms.input :min="$min" :max="$max" :type="$type" label="До" :name="$name . '[to]'" />
		</div>
	</div>
</div>

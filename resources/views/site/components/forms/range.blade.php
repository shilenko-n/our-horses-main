<v-range v-slot="slotProps" :range="@json($range)" :default-range="@json($default)" :step="@json($step)">
	<label
		{{ $attributes->merge(['id' => null]) }}
		@class([ 'range', $attributes->get('class') ])
		:class="{ 'range_multiple': slotProps.isRange}"
	>
		{{-- label --}}
		@if ($label)
			<div class="range__label">{{ $label }}</div>
		@endif

		{{-- fields --}}
		<input
			{{ $attributes->filter(fn ($value, $key) => !in_array($key, ['id', 'class', 'min', 'max'])) }}
			class="range__field range__field_first"
			type="range"
			name="{{ $isRange ? $name . '[from]' : $name }}"
			:value="slotProps.firstInput"
			@input="slotProps.changeFirstInput"
			:min="slotProps.range[0]"
			:max="slotProps.range[1]"
			:step="slotProps.step"
			:multiple="slotProps.isRange"
			:style="slotProps.isRange ? {
				'--from': slotProps.firstInput,
				'--to': slotProps.secondInput,
				'--min': slotProps.range[0],
				'--max': slotProps.range[1],
			} : {}"
		/>

		<input
			{{ $attributes->filter(fn ($value, $key) => !in_array($key, ['id', 'class', 'min', 'max'])) }}
			v-if="slotProps.isRange"
			class="range__field range__field_second"
			type="range"
			name="{{ $name . '[to]' }}"
			:value="slotProps.secondInput"
			@input="slotProps.changeSecondInput"
			:min="slotProps.range[0]"
			:max="slotProps.range[1]"
			:step="slotProps.step"
			multiple
		/>

		<div class="range__counts">
			<p class="range__count range__count_from">
				<span class="range-value">@{{ slotProps.isRange ? slotProps.firstInput : slotProps.range[0] }}</span>
				<span> {{ $units }}</span>
			</p>
			<p v-if="!slotProps.isRange" class="range__count range__count_current">
				<span class="range-value">@{{ slotProps.firstInput }}</span>
				<span> {{ $units }}</span>
			</p>
			<p class="range__count range__count_to">
				<span class="range-value">@{{ slotProps.isRange ? slotProps.secondInput : slotProps.range[1] }}</span>
				<span> {{ $units }}</span>
			</p>
		</div>
	</label>
</v-range>

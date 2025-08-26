<v-recall v-slot="{ submit, pending, errors, inModal }" ym-goal="{!! $ymGoal !!}">
	<form {{ $attributes }} @submit.prevent="submit" v-cloak>
		{{-- type --}}
		<input type="hidden" name="type" value="{!! $type !!}">

		{{-- block id --}}
		@if ($blockId)
			<input name="block_id" type="hidden" value="{{ $blockId }}" />
		@endif

		{{-- anti bot --}}
		<input type="email" name="email" class="input input_ab" placeholder="mail@example.com">

		{{-- modal data --}}
		<input
			v-for="(value, key) in inModal ? modalData : {}"
			:key="key"
			:name="key"
			:value="value"
			type="hidden"
		>

		{{ $slot }}
	</form>
</v-recall>

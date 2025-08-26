<v-horse-placement checked="{{ $checked ?? false ? 'true' : 'false' }}">
	<template v-slot:default="slotProps">
		<x-forms.select size="big" ::disabled="slotProps.disabled" label="Страна" required>
			<option value="">Не выбрана</option>
		</x-forms.select>
		<div class="horse-form__input_4">
			<x-forms.select size="big" ::disabled="slotProps.disabled" label="Населённый пункт" required>
				<option value="">Не выбрана</option>
			</x-forms.select>
			<x-forms.flag @click="slotProps.changeDisabled" :checked="$checked ?? false" label="Совпадает с населённым пунктом владельца" />
		</div>
	</template>
</v-horse-placement>

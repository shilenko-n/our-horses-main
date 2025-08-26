<v-prev-horse checked="{{ $checked ?? false ? 'true' : 'false' }}">
	<template v-slot:default="slotProps">
		<x-forms.flag :disabled="$disabled ?? false" label="Прежняя лошадь" ::checked="slotProps.show" @click="slotProps.changeShowing" />
		<x-forms.select size="big" :disabled="$disabled ?? false" v-if="slotProps.show" @change="slotProps.changeType" label="Причина" hint="Проданная лошадь станет недоступна для редактирования и добавления записей в дневник" required>
			<option value="sale" ::selected="slotProps.type == 'sale'">Лошадь продана</option>
			<option value="dead" ::selected="slotProps.type == 'dead'">Лошадь пала</option>
		</x-forms.select>
		<x-forms.input size="big" :disabled="$disabled ?? false" v-if="slotProps.show && slotProps.type == 'sale'" type="date" required label="Дата продажи" />
		<x-forms.input size="big" :disabled="$disabled ?? false" v-if="slotProps.show && slotProps.type == 'dead'" type="date" required label="Дата смерти" />
	</template>
</v-prev-horse>

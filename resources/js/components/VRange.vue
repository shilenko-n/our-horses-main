<template>
	<slot
		:first-input="firstInput"
		:change-first-input="changeFirstInput"
		:second-input="secondInput"
		:change-second-input="changeSecondInput"
		:range="props.range"
		:default-range="props.defaultRange"
		:step="step"
		:is-range="isRange">
	</slot>
</template>

<script setup>
import { computed, ref } from 'vue'

const props = defineProps({
	range: {
		type: Array,
		default: () => [0, 1000],
	},
	defaultRange: {
		type: Array,
		default: () => [0],
	},
	step: {
		type: Number,
		default: 1,
	},
})

const isRange = computed(() => {
	return props.defaultRange[1] !== undefined
})

const firstInput = ref(props.defaultRange[0])
function changeFirstInput(event) {
	const newValue = Number(event.target.value)

	if (isRange.value) {
		// Значение не может быть больше второго инпута
		if ((newValue + props.step) >= secondInput.value) {
			firstInput.value = secondInput.value - props.step
			event.target.value = secondInput.value - props.step // Иначе "тогл" будет уезжать за границу
			return false
		}
	}
	firstInput.value = newValue
}

const secondInput = ref(props.defaultRange[1] || null)
function changeSecondInput(event) {
	const newValue = Number(event.target.value)

	// Значение не может быть меньше первого инпута
	if ((newValue - props.step) <= firstInput.value) {
		secondInput.value = firstInput.value + props.step
		event.target.value = firstInput.value + props.step // Иначе "тогл" будет уезжать за границу
		return false
	}

	secondInput.value = newValue
}
</script>

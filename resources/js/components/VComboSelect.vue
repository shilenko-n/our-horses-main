<template>
	<slot
		:set-element="setElement"
		:multiple="multiple"
		:filtered-options="filteredOptions"
		:selected-options="selectedOptions"
		:on-search-input="onSearchInput"
		:toggle-option-selected="toggleOptionSelected"
		:open-dropdown="openDropdown"
		:dropdown-openned="dropdownOpenned"></slot>
</template>

<script setup>
import { computed, onMounted, ref } from 'vue'

const props = defineProps({
	multiple: {
		default: false,
	},
	disabled: {
		default: false,
	},
})

const $el = ref(null)
const dropdownOpenned = ref(false)
const options = ref([])
const search = ref('')
const selectedOptions = computed(() => {
	const _selectedOptions = {}

	options.value.forEach((option, index) => {
		if (option.selected && !option.disabled) _selectedOptions[index] = option
	})

	return _selectedOptions
})
const filteredOptions = computed(() => {
	return search.value.trim().length
		? options.value.filter(option => {
			return option.text.toLowerCase().includes(search.value.toLowerCase())
		})
		: options.value
})

onMounted(() => {
	if ($el.value) getOptions()
})

function setElement(_element) {
	$el.value = _element
}

function getOptions() {
	const selectElement = $el.value.querySelector('select')
	const optionElements = selectElement.querySelectorAll('option')
	let alreadySelected = false

	optionElements.forEach((option, index) => {
		const selected = alreadySelected ? false : option.selected
		options.value.push({
			id: index,
			value: option.getAttribute('value'),
			text: option.text,
			disabled: option.disabled,
			selected,
		})

		if (!props.multiple && selected) {
			alreadySelected = true
		}

		option.remove()
	})

	const countOptions = options.value.length
	selectElement.setAttribute('size', countOptions < 5 ? countOptions : 5)
}

function toggleOptionSelected(index, event = null) {
	if (props.disabled) return 0

	const option = options.value[index]
	const newValue = !option.selected

	if (event) {
		event.preventDefault()
		const scrollTop = event.target.parentNode.scrollTop
		setTimeout(() => event.target.parentNode.scrollTo(0, scrollTop), 2)
	}

	if (!props.multiple) {
		closeDropdown()
	}

	if (!props.multiple && newValue) {
		options.value.forEach(option => {
			option.selected = false
		})
	}

	option.selected = newValue
}

function openDropdown(event) {
	if (props.disabled) return 0

	console.log(event.target)
	dropdownOpenned.value = true
	document.body.addEventListener('click', closeDropdownOnClickOutside)
}

function closeDropdown() {
	dropdownOpenned.value = false
	document.body.removeEventListener('click', closeDropdownOnClickOutside)
}

function closeDropdownOnClickOutside(event) {
	event.preventDefault()
	if (!$el.value.contains(event.target)) {
		closeDropdown()
	}
}

function onSearchInput(event) {
	search.value = event.target.value
}

</script>

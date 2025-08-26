<template>
	<transition name="tab" appear>
		<div v-show="isActive">
			<slot></slot>
		</div>
	</transition>
</template>

<script setup>
import { computed, inject, onMounted, ref } from 'vue'

const props = defineProps({
	name: {
		type: String,
		required: true,
	},
})

const index = ref(null)
const tabs = inject('tabs', null)
const selectedTab = inject('selectedTab', null)
const isActive = computed(() => {
	return selectedTab && selectedTab() === index.value
})

onMounted(() => {
	if (tabs) {
		index.value = tabs.push({
			name: props.name,
		}) - 1
	}
})
</script>

<template>
	<slot
		:tabs="tabs"
		:selected-tab="selectedTab"
		:select-tab="selectTab">
	</slot>
</template>

<script setup>
import { provide, ref } from 'vue'

const tabs = ref([])
const selectedTab = ref(0)

provide('tabs', tabs.value)
provide('selectedTab', () => selectedTab.value)

function selectTab(index) {
	selectedTab.value = index
}
</script>

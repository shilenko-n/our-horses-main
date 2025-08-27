import { computed, watch, ref } from 'vue'
import { defineStore } from 'pinia'

export const useModalsStore = defineStore('modals', () => {
	const modals = ref({})
	const modalsData = ref({})

	const openedModals = computed(() => {
		return Object.values(modals.value).reduce((a, b) => a + b, 0)
	})

	const htmlTag = document.documentElement
	watch(openedModals, (count) => {
		htmlTag.classList.toggle('no-scroll', count > 0)
	})

	function openModal(name, data = {}) {
		modals.value[name] = true
		modalsData.value[name] = data
	}

	function closeModals() {
		modals.value = {}
	}

	return { modals, modalsData, openedModals, openModal, closeModals }
})

// static js
import initHeaderJs from '@app/static-js/header'
import initGalleriesJs from '@app/static-js/galleries'
import initSlidersJs from '@app/static-js/sliders'
import initChatJs from '@app/static-js/chat.js'

// import initValidateTelJs from '@app/static-js/validate-tel'

import scrollTop from '@app/static-js/scroll-top'
import dropdown from '@app/static-js/dropdown'
import prevHorses from '@app/static-js/prev-horses'
import passwordInput from '@app/static-js/passwrod-input'
import initCommentForm from '@app/static-js/comment'
import initOwners from '@app/static-js/owners'
import initScrollTopComments from '@app/static-js/scroll-top-comments'
import initMobileMenuMultiItems from '@app/static-js/multi-items'
import initImagePreview from '@app/static-js/image-preview'
import initButtonTabs from '@app/static-js/button-tabs'
import initEditor from '@app/static-js/editor'

import initYaMetrikaGoalsJs from '@app/services/y.metrika/y.metrika-goals'

// vue components
import VModal from '@app/components/VModal.vue'
import VRecall from '@app/components/VRecall.vue'
import VTabs from '@app/components/tabs/VTabs.vue'
import VTabsTab from '@app/components/tabs/VTabsTab.vue'
import VRange from '@app/components/VRange.vue'
import VVideo from '@app/components/VVideo.vue'
import VPrevHorse from '@app/components/VPrevHorse.vue'
import VHorsePlacement from '@app/components/VHorsePlacement.vue'

// stores
import { useModalsStore } from '@app/stores/modals'

// vue init
import { createApp } from 'vue'
import { createPinia } from 'pinia'

const pinia = createPinia()
const app = createApp(setup())
app.use(pinia).mount('#app')

function setup() {
	return {
		name: 'Site',
		components: {
			VModal,
			VRecall,
			VTabs,
			VTabsTab,
			VRange,
			VVideo,
			VPrevHorse,
			VHorsePlacement,
		},
		mounted() {
			// load static js
			initHeaderJs()
			initGalleriesJs()
			initSlidersJs()
			// initValidateTelJs()
			initYaMetrikaGoalsJs()
			scrollTop()
			dropdown()
			prevHorses()
			passwordInput()
			initCommentForm()
			initOwners()
			initScrollTopComments()
			initMobileMenuMultiItems()
			initImagePreview()
			initButtonTabs()
			initEditor()
			initChatJs()
		},
		setup() {
			const { openModal, closeModals } = useModalsStore()

			return { openModal, closeModals }
		},
	}
}

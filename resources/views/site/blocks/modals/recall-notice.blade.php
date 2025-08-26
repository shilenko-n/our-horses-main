<x-modal name="recall-notice">
    <div
		class="recall-notice__content"
		v-html="modalData?.noticeContent"
	></div>

    <div class="recall-notice__controls">
        <x-button type="button" icon="check-solid" @click="close()">
			Спасибо, буду ждать
        </x-button>
    </div>
</x-modal>

<template>
  <teleport to="#app" :disabled="!enabled">
    <transition v-if="enabled" name="modal" appear @after-leave="afterTransitonLeave()">
      <div v-show="!enabled || (enabled && openned)" class="modal" :class="[
        !!name && 'modal_' + name,
        !enabled && 'modal_disabled',
        sidebarContent && 'modal_sidebar-menu'
      ]" v-bind="$attrs" :style="[{ 'z-index': zIndex }]">
        <div class="modal-mask">
          <div class="modal-wrapper" @click.self="!disableWrapperClose && close()">
            <div class="modal-container">
              <slot :close="close" :modal-data="modalData"></slot>

              <button type="button" class="modal-close" @click="close()"></button>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </teleport>

  <slot v-if="!enabled || saveContent" :modal-data="modalData"></slot>
</template>

<script setup>
  import { computed, onMounted, onUnmounted, provide, ref, watch } from 'vue'
  import { useModalsStore } from '@app/stores/modals'

  defineOptions({
    inheritAttrs: false,
  })

  const modalsStore = useModalsStore()

  const props = defineProps({
    name: String,
    disableWrapperClose: Boolean,
    maxScreenWidth: Number,
    saveContent: Boolean,
    sidebarContent: Boolean,
  })

  const emits = defineEmits(['close'])

  provide('modalName', props.name)

  const openned = computed({
    get: () => modalsStore.modals[props.name] || false,
    set: (value) => { modalsStore.modals[props.name] = value },
  })
  const modalData = computed(() => modalsStore.modalsData[props.name] || null)

  const zIndex = ref(10000)
  watch(() => openned.value, (isOpenned) => {
    zIndex.value = isOpenned ? modalsStore.openedModals + 10000 : 10000
  })

  const enabled = ref(true)
  const resizeObserver = ref(null)
  onMounted(() => {
    initCloseOnAnchor()

    if (props.maxScreenWidth > 0) {
      resizeObserver.value = new ResizeObserver((entries) => {
        enabled.value = entries[0].target.offsetWidth < props.maxScreenWidth
      })

      resizeObserver.value.observe(document.documentElement)
    }
  })

  onUnmounted(() => {
    resizeObserver.value?.unobserve(document.documentElement)
  })

  function close() {
    openned.value = false
    emits('close')
  }

  function afterTransitonLeave() {
    delete modalsStore.modalsData[props.name]
  }

  // Закрытие модалок при клике на якоря
  function initCloseOnAnchor() {
    const anchorsLinks = document.querySelectorAll(`.modal_${props.name} a[href*="#"]`)
    anchorsLinks.forEach(anchor => {
      const href = anchor.getAttribute('href')
      const id = href.substring(href.indexOf('#') + 1)

      if (id) anchor.addEventListener('click', () => modalsStore.closeModals())
    })
  }
</script>

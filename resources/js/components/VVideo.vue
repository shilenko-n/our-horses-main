<template>
    <teleport to="#app">
        <transition v-if="openned" name="modal" appear>
            <div v-show="openned" class="modal modal_video" v-bind="$attrs" :style="[{ 'z-index': zIndex }]">
                <div class="modal-mask">
                    <div class="modal-wrapper" @click.self="!disableWrapperClose && close()">
                        <div class="modal-container modal-container_video">
                            <slot name="content" :close="close"></slot>

                            <button type="button" class="modal-close" @click="close()"></button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </teleport>

    <slot name="button" :open="open"></slot>
</template>

<script setup>
    import { getCurrentInstance, ref, watch } from 'vue'

    defineOptions({
        inheritAttrs: false,
    })

    defineProps({
        disableWrapperClose: Boolean,
    })

    const openned = ref(false)
    const $root = getCurrentInstance().proxy.$root
    const zIndex = ref(10000)
    watch(() => openned.value, (isOpenned) => {
        document.documentElement.classList.toggle('no-scroll', isOpenned)
        zIndex.value = isOpenned ? $root.openedModals + 10000 : 10000
    })

    function open() {
        openned.value = true
    }

    function close() {
        openned.value = false
    }
</script>

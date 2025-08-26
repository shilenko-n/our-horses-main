<template>
  <slot :disabled="disabled" :changeDisabled="changeDisabled"></slot>
</template>

<script setup>
  import { ref } from 'vue'

  const props = defineProps({
    checked: {
      type: [Boolean, String],
      default: () => false,
    },
  })

  // eslint-disable-next-line eqeqeq
  const disabled = ref(props.checked == 'true' || props.checked == '1')

  function changeDisabled(event) {
    disabled.value = event.target.checked
  }
</script>

<style lang="scss" scoped></style>

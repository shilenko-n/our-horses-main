<template>
  <slot :show="show" :type="type" :dateLabel="dateLabel" :changeShowing="changeShowing" :changeType="changeType"></slot>
</template>

<script setup>
  import { ref, computed } from 'vue'

  const props = defineProps({
    checked: {
      type: [Boolean, String],
      default: () => false,
    },
  })

  // eslint-disable-next-line eqeqeq
  const show = ref(props.checked == 'true' || props.checked == '1')

  const type = ref('sale')

  function changeShowing(event) {
    show.value = event.target.checked
  }

  function changeType(event) {
    type.value = event.target.value
  }

  const dateLabel = computed(() => {
    if (type.value === 'dead') {
      return 'Дата смерти'
    }
    return 'Дата продажи'
  })
</script>

<style lang="scss" scoped></style>

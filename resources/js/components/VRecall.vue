<template>
  <div>
    <slot :submit="submit" :errors="errors" :pending="pending" :in-modal="inModal">
    </slot>
  </div>
</template>

<script setup>
  import recallApi from '@app/apis/recall'
  import { getCurrentInstance, inject, ref } from 'vue'
  import yMetrika from '@app/helpers/y.metrika'

  const $root = getCurrentInstance().proxy.$root

  const props = defineProps({
    ymGoal: String,
  })

  const pending = ref(false)
  const errors = ref({})
  const inModal = inject('modalName', false)

  function submit(event) {
    const formData = new FormData(event.target)

    errors.value = {}
    pending.value = true

    recallApi
      .submitRecall(formData)
      .then((response) => {
        pending.value = false
        event.target.reset()

        // show notice
        const notice = response.notice || null
        if (notice) {
          $root.closeModals()
          $root.openModal('recall-notice', {
            noticeContent: notice,
          })
        }

        if (props.ymGoal) yMetrika.reachGoal(props.ymGoal)
      })
      .catch((response) => {
        pending.value = false

        if (response.errors) {
          Object.entries(response.errors).forEach(([key, value]) => {
            errors.value[key] = Array.isArray(value) ? value[0] : value
          })
        }
      })
  }
</script>

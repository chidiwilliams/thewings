<template>
  <div class="card alert-card" :class="classType">
    <div class="">{{ message }}</div>
  </div>
</template>

<script>
export default {
  data () {
    return {

    }
  },
  props: ['classType', 'message']
}
</script>

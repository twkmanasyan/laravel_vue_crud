<template>
  <div class="hello">
    <b-container>
      <nav-bar />
    </b-container>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  computed:{
    categories() {
      return this.$store.getters['Categories/categories']
    }
  },
  data () {
    return {
      msg: 'Welcome to Your Vue.js App',

    }
  },
  mounted() {
    this.$store.dispatch('Categories/getAllCategories');
  }
}
</script>

<style scoped>

</style>

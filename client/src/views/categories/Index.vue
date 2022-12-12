<template>
  <div>
    <nav-bar />
    <b-container>
      <b-card title="CATEGORY LIST" class="mb-2 mt-2">
        <router-link class="btn btn-primary" :to="{name:'CategoryCreate'}">Create New Category</router-link>
        <b-table striped hover :items="categories" :fields="fields">
          <template v-slot:cell(action)="data">
            <router-link :to="{name:'One', params:{id:data.item.id}}">More</router-link>
          </template>
        </b-table>
      </b-card>
    </b-container>
  </div>
</template>

<script>
export default {
  name: 'Categories',
  data() {
    return {
      fields:['name', 'created_at', 'action']
    }
  },
  mounted() {
    this.$store.dispatch("Categories/getAllCategories");
  },
  computed:{
    categories() {
      return this.$store.getters['Categories/categories'];
    }
  }
}
</script>

<style>

</style>

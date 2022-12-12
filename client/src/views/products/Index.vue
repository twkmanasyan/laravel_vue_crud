<template>
  <div>
    <nav-bar />
    <b-container>
      <b-card title="PRODUCT LIST" class="mb-2 mt-2">
        <router-link class="btn btn-primary" :to="{name:'ProductCreate'}">Create New Product</router-link>
        <b-table striped hover :items="products" :fields="fields">
          <template v-slot:cell(action)="data">
            <router-link :to="{name:'ProductOne', params:{id:data.item.productId}}">More</router-link>
          </template>
        </b-table>
      </b-card>
    </b-container>
  </div>
</template>

<script>
export default {
  name: 'ProductIndex',
  data() {
    return {
      fields:['productName', 'categoryName', 'action']
    }
  },
  mounted() {
    this.$store.dispatch("Products/getAllProducts");
  },
  computed:{
    products() {
      return this.$store.getters['Products/products'];
    }
  }
}
</script>

<style>

</style>

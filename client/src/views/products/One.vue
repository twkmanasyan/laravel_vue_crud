<template>
  <div>
    <b-container class="pt-2">
      <router-link class="btn btn-secondary mb-2" :to="{name:'ProductIndex'}">Back</router-link>
      <b-card title="More Information">
        <b-card-text>
          <p>Product Name` {{product.productName}}</p>
          <p>Product Category` {{product.categoryName}}</p>
          <p>Product Price` {{product.price}} AMD</p>
          <p>Product Qty` {{product.qt}}</p>
        </b-card-text>
        <router-link :to="{name:'ProductEdit', params:{id:product.id}}" class="btn btn-success">Edit</router-link>
        <b-button variant="danger" @click.prevent="deleteProduct(product.id)">Delete</b-button>
      </b-card>
    </b-container>
  </div>
</template>

<script>
export default {
  name: "ProductOne",
  mounted() {
    const id = this.$route.params.id;
    console.log(id)
    this.$store.dispatch("Products/getOneProduct", id);
  },
  computed:{
    product() {
      return this.$store.getters['Products/product'];
    }
  },
  methods:{
    deleteProduct(id) {
      this.axios.get(`http://127.0.0.1:8000/api/products/${id}/delete`).then( response => {
        if(response.status == 200) {
          alert(response.data.message);
          this.$router.push("/products")
        }
      })
    }
  }
}
</script>

<style scoped>

</style>

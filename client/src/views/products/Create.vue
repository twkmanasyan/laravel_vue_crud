<template>
  <b-container class="pt-2">
    <b-card title="CREATE NEW PRODUCT" class="mt-2 mb-2">
      <router-link class="btn btn-secondary" :to="{name:'ProductIndex'}">Back</router-link>

      <b-form @submit="sendForm" @reset="" >
        <b-form-group
          label="Enter Product Name"
          label-for="name"
          class="mt-2"
        >
          <b-form-input
            id="name"
            v-model="form.name"
            type="text"
            placeholder="Product Example"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group class="mt-2" label="Enter Product Price" label-for="price">
          <b-form-input
            id="price"
            type="text"
            v-model="form.price"
            placeholder="1000"
          ></b-form-input>
        </b-form-group>

        <b-form-group class="mt-2" label="Enter Product Description" label-for="description">
          <b-form-textarea
            id="price"
            v-model="form.description"
            placeholder="Product Description"
            rows="3"
            max-rows="6"
          ></b-form-textarea>
        </b-form-group>

        <b-form-group class="mt-2" label="Select Product Category" label-for="category_id">


          <select id="category_id" class="form-select" v-model="form.category_id" >
            <option selected disabled>Select Category</option>
            <option
              v-for="category in categories"
              :key="category.id"
              :value="category.id"
            >{{ category.name }}</option>
          </select>
        </b-form-group>


        <b-form-group class="mt-2" label="Enter Product Qty" label-for="qt">
          <b-form-input
            id="qt"
            type="number"
            v-model="form.qt"
            placeholder="1"
            min="1"
          ></b-form-input>
        </b-form-group>


        <b-button type="submit" variant="primary" class="mt-2">Save</b-button>
      </b-form>
    </b-card>
  </b-container>
</template>

<script>
export default {
  name: 'CategoriesCreate',
  data() {
    return {
      form:{
        name:'',
        price:'',
        description:'',
        qt:1,
        category_id:null,

      },
    }
  },
  computed: {
    categories() {
      return this.$store.getters['Categories/categories'];
    }
  },
  mounted() {
    document.title = "Create Product";
    this.$store.dispatch("Categories/getAllCategories");
  },
  methods:{
    sendForm(e) {
      e.preventDefault();
      this.axios.post("http://127.0.0.1:8000/api/products/store", this.form).then(response => {
        // console.log(response);
        if(response.status == 200) {
          alert(response.data.message);
          location.reload();
        }
      }).catch(err => {
        console.log(err.message);
      });
    }
  }
}
</script>

<style>

</style>

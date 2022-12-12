<template>
  <div>
    <b-container class="pt-2">
      <b-card title="More Information">
        <b-card-text>
          <p>Category Name` {{category.name}}</p>
          <p>Category Notes` {{category.notes}}</p>
          <p>Category Created At` {{category.created_at}}</p>
        </b-card-text>
        <router-link :to="{name:'Edit', params:{id:category.id}}" class="btn btn-success">Edit</router-link>
        <b-button variant="danger" @click.prevent="deleteCategory(category.id)">Delete</b-button>
      </b-card>
    </b-container>
  </div>
</template>

<script>
export default {
  name: "One",
  data() {
    return {
      title:''
    }
  },
  mounted() {
    document.title = 'Category';

    const id = this.$route.params.id;
    this.$store.dispatch("Categories/getOneCategory", id);

  },
  computed:{
    category() {
      return this.$store.getters['Categories/category'];
    }
  },
  methods:{
    deleteCategory(id) {
      this.axios.get(`http://127.0.0.1:8000/api/categories/${id}/delete`).then( response => {
        if(response.status == 200) {
          alert(response.data.message);
          this.$router.push("/categories")
        }
      })
    }
  }
}
</script>

<style scoped>

</style>

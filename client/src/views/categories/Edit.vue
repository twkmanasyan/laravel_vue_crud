<template>
  <b-container class="pt-2">
    <b-card title="EDIT CATEGORY" class="mt-2 mb-2">
      <b-form @submit.prevent="updateCategory" @reset="" >
        <b-form-group
          label="Enter Category Name"
          label-for="name"
          class="mt-2"
        >
          <b-form-input
            id="name"
            v-model="form.name"
            type="text"
            placeholder="Category Example"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group class="mt-2" label="Enter Category Notes" label-for="notes">
          <b-form-textarea
            id="notes"
            v-model="form.notes"
            placeholder="Enter text"
            rows="3"
            max-rows="6"
          ></b-form-textarea>
        </b-form-group>

        <b-button type="submit" variant="primary" class="mt-2">Save Changes</b-button>
      </b-form>
    </b-card>
  </b-container>
</template>

<script>
export default {
  name: "Edit",
  data() {
    return {
      form:{
        name:'',
        notes:'',
        id:null
      }
    }
  },
  mounted() {
    document.title = "Create Edit";

    this.$store.dispatch("Categories/getOneCategory", this.$route.params.id);
    this.form.name = this.category.name;
    this.form.notes = this.category.notes;
    this.form.id = this.category.id;
  },
  computed:{
    category() {
      return this.$store.getters['Categories/category'];
    }
  },
  methods:{
    updateCategory() {
      this.axios.post("http://127.0.0.1:8000/api/categories/update", this.form).then(response => {
        console.log(response)
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

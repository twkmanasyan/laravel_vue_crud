<template>
  <b-container class="pt-2">
    <b-card title="CREATE NEW CATEGORY" class="mt-2 mb-2">
      <router-link class="btn btn-secondary" :to="{name:'CategoryIndex'}">Back</router-link>

      <b-form @submit="sendForm" @reset="" >
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
        notes:''
      }
    }
  },
  mounted() {
    document.title = "Create Category";
  },
  methods:{
    sendForm(e) {
      e.preventDefault();
      this.axios.post("http://127.0.0.1:8000/api/categories/store", this.form).then(response => {
        alert(response.data.message);
        location.reload();
      });
    }
  }
}
</script>

<style>

</style>

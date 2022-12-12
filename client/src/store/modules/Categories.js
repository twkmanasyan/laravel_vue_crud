import axios from "axios";
export default {
  namespaced:true,
  state:{
    categories:[],
    category:[]
  },
  mutations:{
    storeCategories(state, data) {
      state.categories = data;
    },
    storeCategory(state, data) {
      state.category = data;
    }
  },
  getters:{
    categories: state => state.categories,
    category: state => state.category
  },
  actions:{
    getAllCategories(context) {
      axios.get("http://127.0.0.1:8000/api/categories").then( response => {
        context.commit('storeCategories', response.data.data);
      })
    },
    getOneCategory(context, id) {
      axios.get(`http://127.0.0.1:8000/api/categories/${id}`).then( response => {
        console.log(response)
        context.commit('storeCategory', response.data.data);
      })
    }
  }

}

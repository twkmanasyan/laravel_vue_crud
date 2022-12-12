import axios from "axios";
export default {
  namespaced:true,
  state:{
    products:[],
    product:[]
  },
  mutations:{
    setProducts(state, data) {
      state.products = data;
    },
    setProduct(state, data) {
      state.product = data;
    }
  },
  getters:{
    products: state => state.products,
    product: state => state.product
  },
  actions:{
    getAllProducts(context) {
      axios.get("http://127.0.0.1:8000/api/products").then( response => {
        console.log(response.data.data)
        context.commit('setProducts', response.data.data);
      });
    },
    getOneProduct(context, id) {
      axios.get(`http://127.0.0.1:8000/api/products/${id}`).then( response => {
        console.log(response.data.data)
        context.commit('setProduct', response.data.data[0]);
      });
    }
  }
}

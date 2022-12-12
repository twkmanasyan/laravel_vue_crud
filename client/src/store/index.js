import Vue from "vue";
import Vuex from "vuex";
import Categories from "./modules/Categories";
import Products from "./modules/Products";


Vue.use(Vuex);

const store = new Vuex.Store({
  state:{},
  mutations:{},
  getters:{},
  actions:{},
  modules:{
    Categories,
    Products
  }
});

export default store;

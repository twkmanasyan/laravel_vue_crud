import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import CategoryIndex from "./../views/categories/Index";
import CategoryCreate from "./../views/categories/Create";
import CategoryOne from "../views/categories/One";
import CategoryEdit from "../views/categories/Edit";

import ProductIndex from "./../views/products/Index";
import ProductCreate from "./../views/products/Create";
import ProductOne from "../views/products/One";
import ProductEdit from "../views/products/Edit";
Vue.use(Router)

export default new Router({
  mode:'history',
  routes: [
    { path: '/', name: 'HelloWorld', component: HelloWorld },
    { path:'/categories', name:'CategoryIndex', component:CategoryIndex},
    { path:'/categories/:id', name:'One', component:CategoryOne},
    { path:'/categories/:id/edit', name:'Edit', component:CategoryEdit},
    { path:'/category/new', name:'CategoryCreate', component:CategoryCreate},

    { path:'/products', name:'ProductIndex', component:ProductIndex},
    { path:'/products/:id', name:'ProductOne', component:ProductOne},
    { path:'/products/:id/edit', name:'ProductEdit', component:ProductEdit},
    { path:'/product/new', name:'ProductCreate', component:ProductCreate},
  ]
})

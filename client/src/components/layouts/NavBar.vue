<template>
  <div>
    <b-navbar toggleable="lg" type="dark" >
      <b-navbar-brand href="#">NavBar</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
<!--          <b-nav-item href="/categories" >Categories</b-nav-item>-->
          <router-link to="/categories">Categories</router-link>
          <router-link to="/products">Products</router-link>
        </b-navbar-nav>


      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  name: 'NavBar'
}
</script>

<style>

</style>

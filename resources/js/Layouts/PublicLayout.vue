<template>
  <div>
    <!-- <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot name="header"></slot>
      </div>
    </header>
    <div class="container shadow-lg mx-auto bg-white mt-24 md:mt-18">
      <main>
        <flash-messages />
        <slot></slot>
      </main>
    </div> -->

    <navbar-component></navbar-component>
    <main></main>
    <!-- <footer-component></footer-component> -->
  </div>
</template>

<script>
import NavbarComponent from "@/Layouts/components/Navbar.vue";
import FooterComponent from "@/Layouts/components/Footer.vue";
export default {
  components: {
    NavbarComponent,
    FooterComponent,
  },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
  },
};
</script>

<style>
</style>
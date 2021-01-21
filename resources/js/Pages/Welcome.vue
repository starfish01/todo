<template>
  <public-layout :canLogin="canLogin" :canRegister="canRegister">
    <!-- <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template> -->

    <div class="py-12">
      adsdas
      <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> -->

      <!-- </div>
      </div> -->
    </div>
  </public-layout>
</template>

<style scoped>
</style>

<script>
import PublicLayout from "@/Layouts/PublicLayout";
import Welcome from "@/Jetstream/Welcome";

export default {
  components: {
    PublicLayout,
  },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
};
</script>

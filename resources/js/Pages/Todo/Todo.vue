<template>
  <div>
    <!-- <overview /> -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <list-item />
      </div>
    </div>
    <!-- <add-item /> -->
  </div>
</template>

<script>
import Overview from "@/Pages/Todo/Overview";
import ListItem from "@/Pages/Todo/ListItem";
import AddItem from "@/Pages/Todo/AddItem";

export default {
  components: {
    Overview,
    ListItem,
    AddItem,
  },
};
</script>

<style>
</style>
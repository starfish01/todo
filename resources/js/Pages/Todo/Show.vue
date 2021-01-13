<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Todo List
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <list-item
            v-for="(item, index) in data"
            :key="index"
            :todoItem="item"
          />
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ListItem from "@/Pages/Todo/ListItem";

export default {
  props: ["data"],

  components: {
    AppLayout,
    ListItem,
  },
};
</script>

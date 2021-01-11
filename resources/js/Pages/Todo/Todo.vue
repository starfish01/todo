<template>
  <div>
    <overview />
    <list-item />
    <list-item />
    <add-item />
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
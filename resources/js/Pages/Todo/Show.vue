<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Todo List
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2 m-5">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <list-item
            v-for="(item, index) in data"
            :key="index"
            :todoItem="item"
          />
        </div>
        <add-item class="mt-5" v-if="addItemField" v-on:addItem="itemToAdd" />
        <div v-if="sending" class="mt-5">
          <i class="fas fa-spinner loading"></i>
        </div>
      </div>
    </div>
    <div class="add-button" @click="onAddItemClick()" v-if="!addItemField">
      <i class="fas fa-plus fa-2x"></i>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ListItem from "@/Pages/Todo/ListItem";
import AddItem from "@/Pages/Todo/AddItem";

export default {
  props: ["data"],
  data() {
    return {
      addItemField: false,
      sending: false,
    };
  },
  methods: {
    itemToAdd(todoItemBeingAdded) {
      this.addItemField = false;

      this.$inertia.post(
        this.route("todos.store"),
        { title: todoItemBeingAdded, description: todoItemBeingAdded },
        {
          onStart: () => (this.sending = true),
          onFinish: () => {
            this.sending = false;
          },
        }
      );
    },
    onAddItemClick() {
      this.addItemField = true;
    },
  },
  components: {
    AppLayout,
    ListItem,
    AddItem,
  },
};

AddItem;
</script>
<style scoped lang="scss">
.add-button {
  background: red;
  position: absolute;
  padding: 20px;
  justify-content: center;
  right: 6%;
  bottom: 6%;
  border-radius: 60px;
  height: 100px;
  width: 100px;
  display: flex;
  cursor: pointer;
  .fas.fa-plus.fa-2x {
    margin: auto;
  }
  &:hover {
    background: yellow;
    .fas.fa-plus.fa-2x {
      animation: spin 4s linear;
    }
  }
}
</style>

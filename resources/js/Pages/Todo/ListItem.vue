<template>
  <div class="p-4 todo-item grid grid-cols-3 flex flex-wrap">
    <div
      @click="onItemClicked()"
      :class="todoItem.status === 'done' ? 'checkedItem' : ''"
    >
      {{ todoItem.title }}
    </div>
    <div v-if="!deleteItem" @click="onDeleteItem()">
      <i class="fas fa-trash"></i>
    </div>
    <div v-if="deleteItem">
      <i class="fas fa-spinner loading"></i>
    </div>
    <div v-if="sending"><i class="fas fa-spinner loading"></i></div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      checked: false,
      sending: false,
      deleteItem: false,
    };
  },
  props: ["todoItem"],
  methods: {
    onDeleteItem() {
      this.$inertia.delete(this.route("todos.destroy", this.todoItem.id), {
        onStart: () => {
          this.deleteItem = true;
        },
        onSuccess: () => {
          this.deleteItem = false;
        },
      });
    },
    onItemClicked() {
      this.todoItem.status =
        this.todoItem.status === "done" ? "not done" : "done";

      this.$inertia.put(
        this.route("todos.update", this.todoItem.id),
        this.todoItem,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
  },
  mounted() {},
};
</script>

<style lang="scss" scoped>
.todo-item {
  div {
    cursor: pointer;
  }
}

.checkedItem {
  text-decoration: line-through;
}
.todo-item:hover {
  background: lightblue;
}
</style>
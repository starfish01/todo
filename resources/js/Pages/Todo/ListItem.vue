<template>
  <div class="p-4 todo-item grid grid-cols-3">
    <div
      @click="onItemClicked()"
      :class="todoItem.status === 'done' ? 'checkedItem' : ''"
    >
      {{ todoItem.title }}
    </div>
    <div @click="onDeleteItem()">
      <i class="fas fa-trash"></i>
    </div>
    <!-- {{ todoItem }} -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      checked: false,
      sending: false,
    };
  },
  props: ["todoItem"],
  methods: {
    onDeleteItem() {
      this.$inertia.delete(
        this.route("todos.destroy", this.todoItem.id),
        this.todoItem,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
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
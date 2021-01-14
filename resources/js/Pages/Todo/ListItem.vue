<template>
  <div class="p-4 todo-item" @click="onItemClicked()">
    <div :class="todoItem.status === 'done' ? 'checkedItem' : ''">
      {{ todoItem.title }}
    </div>
    {{ todoItem }}
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

<style >
.todo-item {
  cursor: pointer;
}

.checkedItem {
  text-decoration: line-through;
}
.todo-item:hover {
  background: lightblue;
}
</style>
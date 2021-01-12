<template>
  <div class="p-4 todo-item" @click="onItemClicked()">
    <div :class="checked ? 'checkedItem' : ''">Check List Item</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      checked: false,
    };
  },
  methods: {
    onItemClicked() {
      this.checked = !this.checked;
      this.$inertia.get("api/data").then((response) => {
        alert(response);
      });
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
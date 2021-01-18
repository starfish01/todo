<template>
  <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
    <label class="block">
      <span class="text-gray-700">Add Todo</span>
      <input
        v-model="todoItem"
        class="form-input mt-1 block w-full"
        placeholder="Clean Room"
      />
    </label>

    <button
      :disabled="todoItem.length === 0"
      type="button"
      class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none"
      tabindex="-1"
      @click="onSave()"
    >
      Add Item
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      todoItem: "",
    };
  },
  methods: {
    onSave() {
      this.$emit("addItem", this.todoItem);
    },
  },
};
</script>

<style>
</style>
<script setup>

</script>

<template>
  <input
    type="number"
    class="rounded-md border-zinc-300 shadow-sm focus:border-red-500 focus:ring-red-500 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-300 dark:focus:border-red-600 dark:focus:ring-red-600"
  />
</template>

<style>
  input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  input[type="number"] {
    -moz-appearance: textfield;
  }
</style>

<template>
  <Modal :show="show" @close="$emit('close')">
    <div class="p-6 text-center">
      <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full" 
           :class="type === 'success' ? 'bg-green-100' : 'bg-red-100'">
        <svg v-if="type === 'success'" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <svg v-else class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
      <div class="mt-4">
        <h3 class="text-lg font-medium text-zinc-800 dark:text-zinc-100" :class="type === 'success' ? 'text-green-800' : 'text-red-800'">
          {{ title }}
        </h3>
        <div class="mt-2 text-sm text-zinc-500">
          {{ message }}
        </div>
      </div>
      <div class="mt-5 flex justify-center">
        <button @click="$emit('close')" class="btn-primary px-4 text-zinc-800 dark:text-zinc-100 hover:text-zinc-900 dark:hover:text-zinc-200">
          OK
        </button>
      </div>
    </div>
  </Modal>
</template>

<script setup>
import Modal from '@/Components/Modal.vue';

defineProps({
  show: Boolean,
  type: {
    type: String,
    default: 'success',
    validator: (value) => ['success', 'error'].includes(value)
  },
  title: String,
  message: String
});

defineEmits(['close']);
</script>
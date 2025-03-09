<template>
  <Modal :show="show" @close="$emit('close')">
    <div class="p-6">
      <h2 class="text-lg font-medium mb-4 text-zinc-900 dark:text-zinc-100">
        {{ title }}
      </h2>
      <div class="space-y-3">
        <div 
          v-for="slotItem in slots" 
          :key="slotItem.number"
          @click="$emit('select', slotItem.number)"
          :class="{'opacity-50': dimEmpty && !slotItem.savedDate}"
          class="p-4 border rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-zinc-800"
        >
          <div class="text-zinc-900 dark:text-zinc-100">
            Slot {{ slotItem.number }}
          </div>
          <div v-if="slotItem.savedDate" class="text-sm text-gray-500 dark:text-zinc-400">
            Last Saved: {{ new Date(slotItem.savedDate).toLocaleString() }}
          </div>
          <div v-else class="text-sm text-gray-600 dark:text-zinc-500">
            Empty
          </div>
        </div>
      </div>
    </div>
  </Modal>
</template>

<script setup>
import Modal from '@/Components/Modal.vue';

const props = defineProps({
  show: Boolean,
  title: String,
  slots: Array,
  dimEmpty: Boolean,
});

const emit = defineEmits(['close', 'select']);
</script>
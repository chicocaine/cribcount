<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const isVisible = ref(false);

const checkScroll = () => {
    isVisible.value = window.scrollY > 200; // Show button after scrolling 200px
};

const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

onMounted(() => {
    window.addEventListener('scroll', checkScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', checkScroll);
});
</script>

<template>
    <button
        v-if="isVisible"
        @click="scrollToTop"
        class="fixed bottom-6 right-6 bg-orange-600 text-white p-3 rounded-full shadow-lg hover:bg-orange-700 transition"
    >
        ↑
    </button>
</template>

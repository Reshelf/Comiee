<script setup>
import { ref } from "vue";

const open = ref(false);
</script>
<template>
    <div class="relative" @mouseleave="open = false">
        <button
            class="inline-flex items-center border rounded-[3px] px-2 py-1.5 font-semibold cursor-pointer"
            @mouseover="open = true"
        >
            <svg
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                class="w-[20px] h-[20px] stroke-t-color dark:stroke-eee mr-2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25"
                />
            </svg>

            <slot name="trigger"></slot>
        </button>
        <transition appear>
            <div v-show="open" class="dropdown" @mouseover="open = true">
                <slot></slot>
            </div>
        </transition>
    </div>
</template>
<style lang="scss" scoped>
.dropdown {
    @apply absolute w-[320px] shadow-lg right-0 top-10 z-[999] rounded p-2 bg-white dark:bg-dark-1;
}
</style>

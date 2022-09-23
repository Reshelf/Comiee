<script setup>
import { ref } from "vue";

const open = ref(false);
</script>
<template>
    <div class="relative" @mouseleave="open = false">
        <button
            @mouseover="open = true"
            class="inline-flex items-center btn-border rounded-[3px] px-2 py-1.5 font-semibold cursor-pointer"
        >
            <svg
                class="w-[20px] h-[20px] stroke-primary"
                viewBox="0 0 24 24"
                fill="none"
            >
                <path
                    d="M9.00999 20.5L3.98999 15.49"
                    stroke-width="1.5"
                    stroke-miterlimit="10"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M9.01001 3.5V20.5"
                    stroke-width="1.5"
                    stroke-miterlimit="10"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M14.99 3.5L20.01 8.51"
                    stroke-width="1.5"
                    stroke-miterlimit="10"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M14.99 20.5V3.5"
                    stroke-width="1.5"
                    stroke-miterlimit="10"
                    stroke-linecap="round"
                    stroke-linejoin="round"
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

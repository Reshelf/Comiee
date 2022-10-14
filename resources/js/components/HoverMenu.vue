<script setup>
import { ref } from "vue";

const open = ref(false);
</script>
<template>
    <div class="absolute right-0 top-0" @mouseleave="open = false">
        <div class="" @mouseover="open = true">
            <slot name="avatar"></slot>
        </div>
        <transition>
            <div v-show="open" class="dropdown">
                <slot></slot>
            </div>
        </transition>
    </div>
</template>
<style lang="scss" scoped>
.dropdown {
    @apply absolute p-4 shadow-lg right-0 top-0 rounded bg-white dark:bg-dark-1;
}
</style>

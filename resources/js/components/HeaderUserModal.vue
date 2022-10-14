<script setup>
import { ref } from "vue";

const open = ref(false);
</script>
<template>
  <div class="relative tracking-widest" @mouseleave="open = false">
    <button
      class="flex items-center justify-between w-full pl-3 pr-4 font-medium md:p-0 md:w-auto shadow"
      @mouseover="open = true"
    >
      <slot name="avatar"></slot>
    </button>
    <transition>
      <div v-show="open" class="dropdown">
        <slot></slot>
      </div>
    </transition>
  </div>
</template>
<style lang="scss" scoped>
.dropdown {
  @apply absolute shadow-lg right-0 top-10 z-[999] rounded p-2 bg-white dark:bg-dark-1;
  width: 250px;
}
</style>

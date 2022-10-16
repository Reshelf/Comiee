<script setup>
import { ref } from "vue";

const show = ref(true);

//  eslint-disable-next-line
const props = defineProps({
  error: Boolean,
  success: Boolean,
  message: {
    type: String,
    default: "",
  },
});
</script>
<template>
  <div class="toast-wrapper">
    <transition name="toast">
      <div
        :class="[
          (show && success) || (show && error)
            ? 'block toast-enter-active'
            : 'toast-leave-to toast-leave-active',
        ]"
      >
        <div class="toast rounded">
          <div
            class="check"
            :class="{
              'check-success': show && success,
              'check-danger': show && error,
            }"
          >
            <template v-if="success">
              <svg
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 13l4 4L19 7"
                />
              </svg>
            </template>
            <template v-else>
              <svg
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </template>
          </div>
          <div class="mx-4 font-semibold">
            {{ message }}
          </div>
          <div class="cursor-pointer" @click="show = false">
            <svg class="h-5 w-5" viewBox="0 0 24 24" stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>
<style lang="scss" scoped>
.toast {
  @apply ml-auto flex bg-white items-center w-full justify-between p-6 shadow-lg;
  &-wrapper {
    @apply fixed z-50 bottom-[20px] left-[20px];
  }
}

/* enter transitions */
.toast-enter-active {
  animation: wobble 0.3s ease;
}
/* leave transitions */
.toast-leave-to {
  @apply opacity-0;
  transform: translateX(-60px) !important;
}
.toast-leave-active {
  transition: all 0.2s ease !important;
}

@keyframes wobble {
  0% {
    transform: translateX(50px);
    opacity: 0;
  }
  50% {
    transform: translateX(0px);
    opacity: 1;
  }
  60% {
    transform: translateX(8px);
    opacity: 1;
  }
  70% {
    transform: translateX(-8px);
    opacity: 1;
  }
  80% {
    transform: translateX(4px);
    opacity: 1;
  }
  90% {
    transform: translateX(-4px);
    opacity: 1;
  }
  100% {
    transform: translateX(0px);
    opacity: 1;
  }
}

.check {
  @apply rounded-full w-[20px] h-[20px] flex items-center justify-center;
  &-success {
    @apply bg-[#02875a];
  }
  &-danger {
    @apply bg-[#de290e];
  }
  svg {
    @apply text-white;
  }
}
</style>

<script setup>
import { ref } from "vue";

const show = ref(true);

const props = defineProps({
  success: Boolean,
  error: Boolean,
});
</script>
<template>
  <div class="reshelf-toast-wrapper">
    <transition name="reshelf-toast">
      <div
        :class="[
          (show && success) || (show && error)
            ? 'block reshelf-toast-enter-active'
            : 'reshelf-toast-leave-to reshelf-toast-leave-active',
        ]"
      >
        <div class="reshelf-toast">
          <!-- <video id="check" autoplay loop muted playsinline>
            <source src="@/assets/images/animation/checkanimation.mp4" />
          </video> -->
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
          <div class="mr-4 font-bold">
            <slot></slot>
          </div>
          <div class="cursor-pointer" @click="show = !show">
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
.reshelf-toast {
  @apply rounded ml-auto -lg flex items-center w-full justify-between p-6;
  max-width: 400px;
  background: #fff;
  video {
    width: 70px;
    height: 70px;
  }
  &-wrapper {
    @apply fixed w-full;
    bottom: 20px;
    right: 20px;
  }
  &-success {
    color: white;
    background: #01bfa5;
  }
  &-danger {
    color: white;
    background: #ff0062;
  }
}

/* enter transitions */
.reshelf-toast-enter-active {
  animation: wobble 0.5s ease;
}
/* leave transitions */
.reshelf-toast-leave-to {
  opacity: 0;
  transform: translateY(60px) !important;
}
.reshelf-toast-leave-active {
  transition: all 0.3s ease !important;
}

@keyframes wobble {
  0% {
    transform: translateY(100px);
    opacity: 0;
  }
  50% {
    transform: translateY(0px);
    opacity: 1;
  }
  60% {
    transform: translateY(8px);
    opacity: 1;
  }
  70% {
    transform: translateY(-8px);
    opacity: 1;
  }
  80% {
    transform: translateY(4px);
    opacity: 1;
  }
  90% {
    transform: translateY(-4px);
    opacity: 1;
  }
  100% {
    transform: translateY(0px);
    opacity: 1;
  }
}

.check {
  @apply rounded-full flex items-center justify-center;
  width: 30px;
  height: 30px;
  &-success {
    background: #02875a;
  }
  &-danger {
    background: #de290e;
  }
  svg {
    color: #fff;
  }
}
</style>

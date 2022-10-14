<script setup>
import { ref } from "vue";

const open = ref(false);
const isLoginTab = ref(true);
</script>
<template>
  <div @click.self="open = false">
    <span class="btn-border" @click="open = true">ログイン</span>
    <transition name="modal" appear>
      <div v-show="open" class="overlay" @click.self="open = false">
        <div class="window">
          <template v-if="isLoginTab">
            <slot name="login"></slot>
            <div class="w-full flex justify-between items-center">
              <slot name="login-footer"></slot>
              <span
                class="text-xs cursor-pointer"
                @click="isLoginTab = !isLoginTab"
                >または新規登録</span
              >
            </div>
          </template>
          <template v-else>
            <slot name="register"></slot>
            <span
              class="w-full text-right text-xs cursor-pointer"
              @click="isLoginTab = !isLoginTab"
              >またはログイン</span
            >
          </template>
        </div>
      </div>
    </transition>
  </div>
</template>
<style lang="scss" scoped>
.window {
  @apply p-6;
  max-width: 400px;
}
</style>

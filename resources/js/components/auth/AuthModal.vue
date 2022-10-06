<script setup>
import { ref } from "vue";

const open = ref(false);
const isLoginTab = ref(true);
</script>
<template>
    <div @click.self="open = false">
        <span @click="open = true" class="btn-border">ログイン</span>
        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="open = false">
                <div class="window">
                    <template v-if="isLoginTab">
                        <slot name="login"></slot>
                        <div class="w-full flex justify-between items-center">
                            <slot name="login-footer"></slot>
                            <span
                                @click="isLoginTab = !isLoginTab"
                                class="text-xs cursor-pointer"
                                >または新規登録</span
                            >
                        </div>
                    </template>
                    <template v-else>
                        <slot name="register"></slot>
                        <span
                            @click="isLoginTab = !isLoginTab"
                            class="w-full text-right text-xs cursor-pointer"
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

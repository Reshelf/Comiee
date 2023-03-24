<script setup>
import { ref } from "vue";

const open = ref(false);
</script>
<template>
    <div class="" @click.self="open = false">
        <div class="tooltip cursor-pointer" @click="open = true">
            <svg
                class="w-[28px] h-[28px] stroke-[#606060] dark:stroke-ddd"
                width="28"
                height="28"
                viewBox="0 0 24 24"
                fill="none"
            >
                <path
                    d="M8 12H16"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M12 16V8"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
            <span class="tooltip-item right-[-40px]">{{
                t("新しく作品を投稿する")
            }}</span>
        </div>
        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="open = false">
                <div class="window">
                    <div class="header">
                        <button class="close" @click="open = false">
                            <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="#333"
                            >
                                <path
                                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"
                                ></path>
                            </svg>
                        </button>
                        <div class="title">{{ t("新しく作品を投稿する") }}</div>
                    </div>
                    <div
                        class="p-4 md:p-6 max-h-[60vh] overflow-y-scroll overflow-x-hidden scroll-none"
                    >
                        <slot></slot>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
<style lang="scss" scoped>
.title {
    @apply text-[#5A5777] dark:text-ddd tracking-widest;
    animation: slide-in 0.3s;
}
.circle {
    &:hover {
        .dotted {
            animation: r1 3s linear infinite;
            svg {
                animation: l1 3s linear infinite;
            }
        }
    }
}

@keyframes bounce-in {
    0% {
        transform: translateY(30px);
        opacity: 0;
    }
    100% {
        transform: translateY(0px);
        opacity: 1;
    }
}
@keyframes slide-in {
    0% {
        transform: translateX(-30px);
        opacity: 0;
    }
    100% {
        transform: translateX(0px);
        opacity: 1;
    }
}
@keyframes r1 {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
@keyframes l1 {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(-360deg);
    }
}
</style>

<script setup>
import { ref } from "vue";

const open = ref(false);
</script>
<template>
    <div @click.self="open = false" class="list-item">
        <div @click="open = true" class="flex flex-col cursor-pointer">
            <!-- <svg
                width="200"
                height="200"
                viewBox="0 0 200 200"
                fill="none"
                class="list-item-img rounded-sm border-2 border-eee hover:border-ddd"
            >
                <rect width="200" height="200" fill="white" />
                <rect x="95" y="70" width="10" height="60" fill="#DDDDDD" />
                <rect
                    x="70"
                    y="105"
                    width="10"
                    height="60"
                    transform="rotate(-90 70 105)"
                    fill="#D9D9D9"
                />
            </svg> -->
            <div
                class="circle bg-white dark:bg-dark-1 rounded-[3px] w-[200px] min-w-[200px] max-w-[200px] h-[200px] min-h-200[px] max-h-[200px] flex items-center justify-center"
            >
                <div
                    class="dotted flex items-center justify-center rounded-full h-[100px] w-[100px] border-4 border-dotted border-ccc"
                >
                    <div
                        class="bg-primary rounded-full h-[60px] w-[60px] flex items-center justify-center"
                    >
                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 60 60"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <rect x="25" width="10" height="60" fill="white" />
                            <rect
                                y="35"
                                width="10"
                                height="60"
                                transform="rotate(-90 0 35)"
                                fill="white"
                            />
                        </svg>
                    </div>
                </div>
            </div>
            <span class="mt-2">新しく作品を追加する</span>
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
                        <div class="title"><slot name="header"></slot></div>
                    </div>
                    <div class="p-6 max-h-[60vh] overflow-y-scroll scroll-none">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
<style lang="scss" scoped>
.header {
    @apply relative min-h-[30px] bg-[#F2F2F2] dark:bg-dark text-left rounded-t text-lg font-semibold py-3 pl-3 pr-8;
}
.title {
    @apply text-[#5A5777] dark:text-ddd;
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
    // 0% {
    //   transform: scale(0);
    // }
    // 50% {
    //   transform: scale(1.1);
    // }
    // 100% {
    //   transform: scale(1);
    // }
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

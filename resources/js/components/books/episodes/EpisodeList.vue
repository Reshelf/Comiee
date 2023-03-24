<script setup>
import { onMounted, ref } from "vue";

const open = ref(false);

//  eslint-disable-next-line
const props = defineProps({
    store: {
        type: Boolean,
        default: false,
    },
});

function openModal() {
    //  eslint-disable-next-line
    if (props.store) open.value = true;
}
onMounted(() => {
    openModal();
});
</script>
<template>
    <div @click.self="open = false">
        <button class="w-full" @click="open = true">
            <slot name="trigger"></slot>
        </button>
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
</style>

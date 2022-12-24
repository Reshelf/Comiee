<script setup>
import { ref } from "vue";

const open = ref(false);
</script>
<template>
    <div @click.self="open = false">
        <div class="btn" @click="open = true">投稿する</div>
        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="open = false">
                <div class="window absolute rounded p-4 bg-white dark:bg-dark">
                    <slot></slot>
                </div>
            </div>
        </transition>
    </div>
</template>
<style lang="scss" scoped>
.overlay {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    // background: rgba(0, 0, 0, 0.4);
    background: rgba(9, 30, 66, 0.54);
}
.window {
    max-width: 600px;
    @media screen and (max-width: 767px) {
        max-width: 90%;
    }
}
// オーバーレイのトランジション
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.2s;

    // オーバーレイに包含されているモーダルウィンドウのトランジション
    .window {
        // transition: opacity 0.3s, transform 0.3s;
        transition: opacity 0.2s, transform 0.2s;
    }
}
.modal-enter-active {
    .window {
        // animation: bounce-in 0.3s;
        animation: bounce-in 0.2s;
    }
}
// ディレイを付けるとモーダルウィンドウが消えた後にオーバーレイが消える
.modal-leave-active {
    // transition: opacity 0.3s ease 0.2s;
    // .modal-window {
    //   animation: bounce-in 0.3s reverse;
    // }
    transition: ease 0.2s;
    .window {
        animation: bounce-in 0.2s reverse;
    }
}

.modal-enter,
.modal-leave-to {
    opacity: 0;

    .window {
        opacity: 0;
        transform: translateY(-20px);
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
        transform: translateY(15px);
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

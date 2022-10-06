<template>
    <transition name="modal" appear>
        <div class="modal modal-overlay" @click.self="$emit('close')">
            <div class="modal-window rounded-lg">
                <header class="modal-header">
                    <button class="close" @click="$emit('close')">
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            style="
                                fill: rgba(0, 0, 0, 1);
                                transform: ;
                                msfilter: ;
                            "
                        >
                            <path
                                d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"
                            ></path>
                        </svg>
                    </button>
                    <div class="title">
                        <slot name="header"></slot>
                    </div>
                </header>
                <div class="modal-content">
                    <slot />
                </div>
                <footer class="modal-footer">
                    <slot name="footer"></slot>
                </footer>
            </div>
        </div>
    </transition>
</template>
<style lang="scss" scoped>
.modal {
    &.modal-overlay {
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        // background: rgba(9, 30, 66, 0.54);
    }

    &-window {
        background-color: var(--bg);
        max-width: 600px;
        @media screen and (max-width: 767px) {
            max-width: 90%;
        }
    }
    &-header {
        @apply relative rounded-t-lg text-xl font-bold py-3 pl-3 pr-8;
        background: #f2f2f2;
        text-align: left;
        min-height: 30px;
        .title {
            animation: slide-in 0.3s;
        }
    }
    &-content {
        @apply px-6;
    }

    &-footer {
        @apply rounded-b-lg py-4 px-6;
        background-color: var(--bg);
    }
}

// オーバーレイのトランジション
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.2s;

    // オーバーレイに包含されているモーダルウィンドウのトランジション
    .modal-window {
        // transition: opacity 0.3s, transform 0.3s;
        transition: opacity 0.2s, transform 0.2s;
    }
}
.modal-enter-active {
    .modal-window {
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
    .modal-window {
        animation: bounce-in 0.2s reverse;
    }
}

.modal-enter,
.modal-leave-to {
    opacity: 0;

    .modal-window {
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

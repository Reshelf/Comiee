<script setup>
import { ref } from "vue";

const open = ref(false);

/* eslint-disable */
const props = defineProps({
    avatar: {
        type: String,
        defalt: "",
    },
});
</script>
<template>
    <div>
        <span class="cursor-pointer" @click="open = true">
            <slot name="avatar"></slot>
        </span>

        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="open = false">
                <div class="window-avatar">
                    <img :src="`${avatar}`" alt="user image" loading="lazy" />
                </div>
            </div>
        </transition>
    </div>
</template>

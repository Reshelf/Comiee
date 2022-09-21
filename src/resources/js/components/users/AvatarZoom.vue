<script setup>
import { ref } from "vue";

const open = ref(false);

const props = defineProps({
    avatar: String,
});
</script>
<template>
    <div>
        <span @click="open = true" class="cursor-pointer">
            <slot name="avatar"></slot>
        </span>

        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="open = false">
                <div class="window-avatar">
                    <img
                        :src="`/img/users/avatar/${avatar}`"
                        alt="user image"
                    />
                </div>
            </div>
        </transition>
    </div>
</template>

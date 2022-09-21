<script setup>
import { ref } from "vue";

const open = ref(false);

const props = defineProps({
    thumbnail: String,
});
</script>
<template>
    <div>
        <div @click="open = true" class="cursor-pointer">
            <slot name="thumbnail"></slot>
        </div>

        <transition name="modal" appear>
            <div v-show="open" class="overlay" @click.self="open = false">
                <div class="window-avatar">
                    <img
                        :src="`/img/users/thumbnail/${thumbnail}`"
                        alt="user image"
                    />
                </div>
            </div>
        </transition>
    </div>
</template>

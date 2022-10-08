<script setup>
import { ref } from "vue";

const isActive = ref(1);

function isSelect(num) {
    this.isActive = num;
}

const props = defineProps({
    is_comment: Boolean,
});
</script>
<template>
    <div class="tab">
        <ul class="tabMenu">
            <li @click="isSelect(1)" :class="{ active: isActive === 1 }">
                エピソード
            </li>
            <li @click="isSelect(2)" :class="{ active: isActive === 2 }">
                作品情報
            </li>
            <li
                v-if="is_comment"
                @click="isSelect(3)"
                :class="{ active: isActive === 3 }"
            >
                コメント
            </li>
        </ul>
        <div class="tabContents">
            <div v-if="isActive === 1">
                <slot name="episode"></slot>
            </div>
            <div v-else-if="isActive === 2">
                <slot name="info"></slot>
            </div>
            <div v-else-if="isActive === 3">
                <slot name="comment"></slot>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
.tab {
    @apply w-full;
    .tabMenu {
        @apply flex bg-white dark:bg-dark;
        li {
            @apply w-auto cursor-pointer py-2 px-4 hover:text-primary;
            &.active {
                @apply font-semibold text-primary border-b-2 border-primary;
            }
        }
    }
    .tabContents {
        @apply w-full p-6;
    }
}
</style>

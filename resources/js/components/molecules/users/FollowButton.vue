<template>
    <button
        :class="buttonColor"
        class="px-4 md:px-6 text-xs max-h-[40px]"
        @click="clickFollow"
    >
        {{ buttonText }}
    </button>
</template>
<script setup lang="ts">
import { computed  } from "vue";
import axios from "axios";
import { ref } from "vue";

const props = defineProps({
    initialIsFollowedBy: {
        type: Boolean,
        default: false,
    },
    authorized: {
        type: Boolean,
        default: false,
    },
    endpoint: {
        type: String,
        default: "",
    },
});

const isFollowedBy = ref(props.initialIsFollowedBy);

const buttonColor = computed(() =>
    isFollowedBy.value ? "btn-border" : "btn-primary"
);
const buttonText = computed(() =>
    isFollowedBy.value ? t("フォロー中") : t("フォローする")
);

const clickFollow = async () => {
    if (!props.authorized) {
        alert(t("フォロー機能はログイン中のみ使用できます"));
        return;
    }

    isFollowedBy.value ? await unfollow() : await follow();
};

const follow = async () => {
    const response = await axios.put(props.endpoint);
    isFollowedBy.value = true;
};

const unfollow = async () => {
    const response = await axios.delete(props.endpoint);
    isFollowedBy.value = false;
};
</script>

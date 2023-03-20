<template>
    <div class="book-like" @click="clickLike">
        <svg
            :class="[{ clicked: isLikedBy }, iconClass]"
            class="w-[24px] h-[24px] mr-2"
            viewBox="0 0 21 20"
            fill="#c9cacc"
        >
            <path
                d="M11.7299 1.50965L13.4899 5.02965C13.7299 5.51965 14.3699 5.98965 14.9099 6.07965L18.0999 6.60965C20.1399 6.94965 20.6199 8.42965 19.1499 9.88965L16.6699 12.3696C16.2499 12.7896 16.0199 13.5996 16.1499 14.1796L16.8599 17.2496C17.4199 19.6796 16.1299 20.6196 13.9799 19.3496L10.9899 17.5796C10.4499 17.2596 9.55991 17.2596 9.00991 17.5796L6.01991 19.3496C3.87991 20.6196 2.57991 19.6696 3.13991 17.2496L3.84991 14.1796C3.97991 13.5996 3.74991 12.7896 3.32991 12.3696L0.849909 9.88965C-0.610091 8.42965 -0.140091 6.94965 1.89991 6.60965L5.08991 6.07965C5.61991 5.98965 6.25991 5.51965 6.49991 5.02965L8.25991 1.50965C9.21991 -0.400352 10.7799 -0.400352 11.7299 1.50965Z"
            />
        </svg>
        <count-animation
            :value="countLikes"
            :is-liked-by="isLikedBy"
        ></count-animation>
    </div>
</template>
<script>
import CountAnimation from "../CountAnimation.vue";
export default {
    components: { CountAnimation },
    props: {
        initialIsLikedBy: {
            type: Boolean,
            default: false,
        },
        initialCountLikes: {
            type: Number,
            default: 0,
        },
        authorized: {
            type: Boolean,
            default: false,
        },
        endpoint: {
            type: String,
            default: "",
        },
        big: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            isLikedBy: this.initialIsLikedBy,
            countLikes: this.initialCountLikes,
            gotToLike: false,
        };
    },
    computed: {
        iconClass() {
            return this.big ? "h-10 w-10" : "h-6 w-6";
        },
    },
    methods: {
        clickLike() {
            if (!this.authorized) {
                alert(t("いいね機能はログイン中のみ使用できます"));
                return;
            }

            this.isLikedBy ? this.unlike() : this.like();
        },
        async like() {
            // eslint-disable-next-line
            const response = await axios.put(this.endpoint);

            this.isLikedBy = true;
            this.countLikes = response.data.countLikes;
            this.gotToLike = true;
        },
        async unlike() {
            // eslint-disable-next-line
            const response = await axios.delete(this.endpoint);

            this.isLikedBy = false;
            this.countLikes = response.data.countLikes;
            this.gotToLike = false;
        },
    },
};
</script>
<style lang="scss" scoped>
.book-like {
    @apply flex items-center cursor-pointer;
}

.clicked {
    @apply fill-yellow;
    svg {
        box-shadow: 0 3px 12px 0 rgba(#f3c42d, 0.4);
    }
}
</style>

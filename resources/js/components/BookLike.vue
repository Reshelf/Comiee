<template>
    <div @click="clickLike" class="book-like">
        <svg
            :class="[{ clicked: isLikedBy }, iconClass]"
            class="mr-2"
            viewBox="0 0 20 20"
            fill="#aaa"
        >
            <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
            />
        </svg>
        <count-animation
            :value="countLikes"
            :isLikedBy="isLikedBy"
        ></count-animation>
    </div>
</template>
<script>
import CountAnimation from "./CountAnimation.vue";
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
                alert("いいね機能はログイン中のみ使用できます");
                return;
            }

            this.isLikedBy ? this.unlike() : this.like();
        },
        async like() {
            const response = await axios.put(this.endpoint);

            this.isLikedBy = true;
            this.countLikes = response.data.countLikes;
            this.gotToLike = true;
        },
        async unlike() {
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
}
</style>

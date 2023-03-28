<template>
    <button
        :class="buttonColor"
        class="w-full py-2.5 px-4 md:px-6 text-[14px]"
        @click="clickLike"
    >
        {{ buttonText }}
    </button>
</template>
<script>
export default {
    props: {
        initialIsLikedBy: {
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
        big: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            isLikedBy: this.initialIsLikedBy,
            gotToLike: false,
        };
    },
    computed: {
        buttonColor() {
            return this.isLikedBy ? "btn-border" : "btn-primary";
        },
        buttonText() {
            return this.isLikedBy
                ? this.t("お気に入り作品")
                : this.t("お気に入りに追加する");
        },
    },
    methods: {
        clickLike() {
            if (!this.authorized) {
                alert(this.t("いいね機能はログイン中のみ使用できます"));
                return;
            }
            this.isLikedBy ? this.unlike() : this.like();
        },
        async like() {
            // eslint-disable-next-line
            await axios.put(this.endpoint);
            this.isLikedBy = true;
            this.gotToLike = true;
        },
        async unlike() {
            // eslint-disable-next-line
            await axios.delete(this.endpoint);
            this.isLikedBy = false;
            this.gotToLike = false;
        },
    },
};
</script>
<style lang="scss" scoped></style>

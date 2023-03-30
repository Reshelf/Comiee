<template>
    <button
        :class="buttonColor"
        class="px-4 md:px-6 text-sm h-[40px]"
        @click="clickFollow"
    >
        {{ buttonText }}
    </button>
</template>
<script>
export default {
    props: {
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
    },
    data() {
        return {
            isFollowedBy: this.initialIsFollowedBy,
        };
    },
    computed: {
        buttonColor() {
            return this.isFollowedBy ? "btn-border" : "btn-primary";
        },
        buttonText() {
            return this.isFollowedBy
                ? this.t("登録済み")
                : this.t("チャンネル登録");
        },
    },
    methods: {
        clickFollow() {
            if (!this.authorized) {
                alert(this.t("フォロー機能はログイン中のみ使用できます"));
                return;
            }

            this.isFollowedBy ? this.unfollow() : this.follow();
        },
        async follow() {
            // eslint-disable-next-line
            const response = await axios.put(this.endpoint);

            this.isFollowedBy = true;
        },
        async unfollow() {
            // eslint-disable-next-line
            const response = await axios.delete(this.endpoint);

            this.isFollowedBy = false;
        },
    },
};
</script>

<!--
    ユーザーが書籍のページから離脱したかどうかを追跡します
    ユーザが書籍ページから移動したときに、bounceRateEndpointにPOSTリクエストを送信することで追跡します
    ログインしているユーザの離脱率のみを追跡します
 -->
<template>
    <div class="hidden"></div>
</template>
<script>
export default {
    props: {
        user: Object,
        book: Object,
        bounceRateEndpoint: String,
    },
    mounted() {
        if (this.user) {
            window.addEventListener("beforeunload", this.sendBounceRateEvent);
        }
    },
    beforeUnmount() {
        if (this.user) {
            window.removeEventListener(
                "beforeunload",
                this.sendBounceRateEvent
            );
        }
    },
    methods: {
        async sendBounceRateEvent() {
            try {
                const response = await fetch(this.bounceRateEndpoint, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify({
                        user_id: this.user.id,
                        book_id: this.book.id,
                    }),
                });
            } catch (error) {
                console.error("Error sending bounce rate event:", error);
            }
        },
    },
};
</script>

<!-- This is a Vue component that tracks whether a user has bounced from a book page
or not. It tracks this by sending a POST request to the bounceRateEndpoint when
the user navigates away from the book page. The component is only mounted if the
user is logged in, so it only tracks bounce rate for logged in users. -->
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

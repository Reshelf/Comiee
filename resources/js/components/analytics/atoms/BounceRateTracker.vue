<!--
    ユーザーが書籍のページから離脱したかどうかを追跡します
    ユーザが書籍ページから移動したときに、bounceRateEndpointにPOSTリクエストを送信することで追跡します
    ログインしているユーザの離脱率のみを追跡します
 -->
<template>
    <div class="hidden"></div>
</template>
<script setup lang="ts">
import { Book } from "@/types/book";
import { User } from "@/types/user";
import { inject, onBeforeUnmount, onMounted } from "vue";
const axios = inject<Window["axios"]>("axios");

const props = defineProps<{
    user: User | null;
    book: Book | null;
    bounceRateEndpoint: string | null;
}>();

const sendBounceRateEvent = () => {
    if (!props.user || !props.book || !props.bounceRateEndpoint || !axios)
        return;

    axios
        .post(
            props.bounceRateEndpoint,
            {
                user_id: props.user.id,
                book_id: props.book.id,
            },
            {
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN":
                        document
                            .querySelector('meta[name="csrf-token"]')
                            ?.getAttribute("content") ?? "",
                },
            }
        )
        .then((response) => {
            // 必要に応じて、response を利用した処理を行う
        })
        .catch((error) => {
            console.error("Error sending bounce rate event:", error);
        });
};

onMounted(() => {
    if (props.user) {
        window.addEventListener("beforeunload", sendBounceRateEvent);
    }
});

onBeforeUnmount(() => {
    if (props.user) {
        window.removeEventListener("beforeunload", sendBounceRateEvent);
    }
});
</script>

<template>
    <div>
        <h2 class="text-2xl mb-8">{{ t("コンテンツ分析") }}</h2>

        <section class="overflow-auto">
            <Thead />
            <div v-for="book in books" :key="book.id" class="flex">
                <Tbody :book="book" />
            </div>
        </section>
    </div>
</template>

<script lang="ts" setup>
import { Book } from "@/types/book";
import { defineComponent } from "vue";

import Tbody from "@/components/pages/analytics/page/contents/Tbody.vue";
import Thead from "@/components/pages/analytics/page/contents/Thead.vue";

defineProps({
    books: {
        type: Array as () => Book[],
        required: true,
    },
});

defineComponent({
    components: {
        Thead,
        Tbody,
    },
});
</script>

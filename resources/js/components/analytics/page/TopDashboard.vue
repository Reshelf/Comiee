<template>
    <div>
        <h2 class="text-2xl mb-8">{{ t("アナリティクスダッシュボード") }}</h2>
        <section class="flex">
            <div class="px-8 py-6 border border-comiee">
                <h3 class="text-lg">{{ t("最新の作品のパフォーマンス") }}</h3>
                <div v-if="book" class="mt-4">
                    <img
                        v-if="book.thumbnail"
                        class="w-[250px] h-[180px] object-cover"
                        :src="book.thumbnail"
                        alt=""
                    />
                    <div class="my-4">
                        <h4 class="mb-4">{{ book.title }}</h4>
                        <div class="mb-2 flex justify-between text-sm">
                            <div class="">閲覧回数</div>
                            <div class="">{{ book.views }}</div>
                        </div>
                    </div>
                    <div
                        class="text-primary dark:text-f5 text-sm cursor-pointer"
                    >
                        コンテンツアナリティクスへ移動
                    </div>
                </div>
            </div>
            <!-- <div class="ml-6 px-8 py-6 border border-comiee">
                <h3 class="text-lg">{{ t("最新の作品のパフォーマンス") }}</h3>
                <div v-if="book" class="mt-4">
                    <img
                        v-if="book.thumbnail"
                        class="w-[250px] h-[180px] object-cover"
                        :src="book.thumbnail"
                        alt=""
                    />
                    <div class="my-4">
                        <h4 class="mb-4">{{ book.title }}</h4>
                        <div class="mb-2 flex justify-between text-sm">
                            <div class="">閲覧回数</div>
                            <div class="">{{ book.views }}</div>
                        </div>
                    </div>
                    <div
                        class="text-primary dark:text-f5 text-sm cursor-pointer"
                    >
                        コンテンツアナリティクスへ移動
                    </div>
                </div>
            </div> -->
        </section>
        <section></section>
    </div>
</template>
<script>
export default {
    props: {
        user: {
            type: Object,
            required: true,
        },
        books: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            book: null,
        };
    },
    mounted() {
        this.$nextTick(() => {
            this.book = this.books[0];
        });
    },
};
</script>
<style lang="scss" scoped></style>

<template>
    <div
        class="cursor-pointer flex text-[13px] min-w-[382px] max-w-[382px] mb-2 pb-2 border-b border-comiee"
        @click="selectBook(book)"
    >
        <img
            :src="book.thumbnail || ''"
            alt="thumbnail"
            class="w-full md:w-[120px] h-[68px] object-cover"
            loading="lazy"
        />
        <div class="w-full flex flex-col px-4 py-2">
            <h3 class="text-[13px]">{{ book.title }}</h3>
            <div class="text-xs max-[232px] truncate">
                {{ book.story }}
            </div>
        </div>
    </div>
    <!-- 公開設定 -->
    <div
        class="flex text-[13px] justify-start px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"
    >
        <template v-if="book.is_hidden">
            <div class="flex items-start">
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4 mr-1 text-aaa"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"
                        />
                    </svg>
                    {{ t("非公開") }}
                </div>
            </div>
        </template>
        <template v-else>
            <div class="flex items-start">
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4 mr-1 text-green dark:text-[#2F873B]"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                    </svg>
                    {{ t("公開中") }}
                </div>
            </div>
        </template>
        <!-- <span
                        v-if="book.is_color"
                        class="h-[20px] inline-block text-pink dark:text-white dark:bg-pink text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2"
                    >
                        {{ t("カラー") }}</span
                    >
                    <span
                        v-if="book.screen_type === 'vertical'"
                        class="h-[20px] inline-block text-green dark:text-white dark:bg-green text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2"
                    >
                        {{ t("縦スク") }}</span
                    >
                    <span
                        v-if="book.screen_type !== 'vertical'"
                        class="h-[20px] inline-block text-green dark:text-white dark:bg-green text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2"
                    >
                        {{ t("横読み") }}</span
                    >
                    <span
                        v-if="book.is_complete"
                        class="h-[20px] inline-block text-[#e19324] dark:text-white dark:bg-[#e19324] text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2"
                    >
                        {{ t("完結") }}</span
                    >
                    <span
                        v-if="book.is_suspend"
                        class="h-[20px] inline-block text-red dark:text-white dark:bg-red text-xs border dark:border-none px-2 py-0.5 rounded-[5px] ml-2 mb-2"
                    >
                        {{ t("休載中") }}</span
                    > -->
    </div>

    <!-- 閲覧回数 -->
    <div
        class="flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"
    >
        0
    </div>
    <!-- ユーザー数 -->
    <div
        class="flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"
    >
        0
    </div>
    <!-- お気に入り数 -->
    <div
        class="flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"
    >
        {{ formatNumber(book.likes_count) }}
    </div>
    <!-- いいね総数 -->
    <div
        class="flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"
    >
        {{ formatNumber(book.count_episode_likes) }}
    </div>
    <!-- コメント数 -->
    <div
        class="flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"
    >
        0
    </div>
    <!-- 売上金額 -->
    <div
        class="flex justify-end px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"
    >
        0
    </div>

    <!-- 作品詳細アナリティクス -->
    <template v-if="selectedBook">
        <transition name="animation-bg">
            <div
                v-show="isBookDetail"
                class="absolute h-screen w-screen left-0 right-0 top-0 bottom-0 bg-white dark:bg-dark z-50"
            >
                <BookDetail
                    :isBookDetail="isBookDetail"
                    @close-book-detail="closeBookDetail"
                    :selectedBook="selectedBook"
                />
            </div>
        </transition>
    </template>
</template>
<script lang="ts" setup>
import BookDetail from "@/components/pages/analytics/page/contents/Tbody/BookDetail.vue";
import { Book } from "@/types/book";
import { ref, Ref } from "vue";
// props
const props = defineProps({
    book: {
        type: Object as () => Book,
        required: true,
    },
});

// data
const isBookDetail = ref(false);
const selectedBook: Ref<Book | null> = ref(null);

// methods
const selectBook = (book: Book) => {
    selectedBook.value = book;
    isBookDetail.value = true;
};
const closeBookDetail = () => {
    isBookDetail.value = false;
};
</script>
<style lang="scss" scoped></style>

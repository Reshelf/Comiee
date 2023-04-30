<template>
    <div class="w-full">
        <template v-if="!isEmpty(books)">
            <!-- 検索条件 -->
            <div
                class="text-[14px] flex lg:flex-wrap whitespace-nowrap overflow-x-scroll scroll-none items-center mb-4"
            >
                <!-- 作品言語 -->
                <div class="mb-4">
                    <select v-model="language" class="select-menu">
                        <option value="">{{ t("作品の言語") }}</option>
                        <option value="ja">日本語</option>
                        <option value="en">English</option>
                        <option value="tw">繁體中文</option>
                        <option value="cn">中国語</option>
                        <option value="es">Español</option>
                        <option value="fr">Français</option>
                        <option value="it">Italiano</option>
                        <option value="id">Bahasa Indonesia</option>
                        <option value="th">ภาษาไทย</option>
                        <option value="ko">한국어</option>
                        <option value="de">Deutsch</option>
                        <option value="pr">Português</option>
                        <option value="ar">العربية</option>
                    </select>
                </div>

                <!-- 画面タイプ -->
                <div class="mb-4">
                    <select v-model="screen_type" class="select-menu">
                        <option value="">{{ t("画面タイプ") }}</option>
                        <option value="horizontal">{{ t("横読み") }}</option>
                        <option value="vertical">
                            {{ t("縦スクロール") }}
                        </option>
                    </select>
                </div>

                <!-- その他の検索条件 -->
                <template v-for="(filter, index) in filters" :key="index">
                    <div
                        v-if="
                            filter.label !== t('非公開') ||
                            (filter.label === t('非公開') &&
                                shouldShowHiddenFilter)
                        "
                        :class="filterClasses(filter)"
                        class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-4 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                        @click="toggleFilter(filter)"
                    >
                        {{ filter.label }}
                    </div>
                </template>
            </div>

            <!-- 作品 -->
            <div class="flex flex-wrap">
                <template v-for="book in filteredManga" :key="book.id">
                    <div class="list-item">
                        <a :href="`/b/${book.title}`">
                            <template v-if="book.thumbnail">
                                <img
                                    :src="book.thumbnail"
                                    alt="thumbnail"
                                    class="w-full md:w-[200px] h-[200px] object-cover"
                                />
                            </template>
                            <template v-else>
                                <img
                                    src="/img/noimage.svg"
                                    alt=""
                                    class="block dark:hidden min-h-[200px] max-h-[200px] w-full md:min-w-[200px] md:max-w-[200px] object-cover"
                                />
                                <img
                                    src="/img/noimage-dark.svg"
                                    alt="thumbnail"
                                    class="hidden dark:block h-[200px] w-full md:w-[200px] object-cover"
                                />
                            </template>
                            <span class="thumbnail-title">{{
                                book.title
                            }}</span>
                        </a>
                    </div>
                </template>
            </div>
        </template>
        <template v-if="isEmpty(filteredManga)">
            <div class="p-4">{{ t("表示する作品がまだありません") }}</div>
        </template>
    </div>
</template>

<script>
export default {
    props: {
        authUser: {
            type: Object,
            default: {},
        },
        bookUser: {
            type: Object,
            default: {},
        },
        books: {
            type: Array,
            default: [],
        },
    },
    data() {
        return {
            filters: [
                { label: this.t("完結"), prop: "is_complete", active: false },
                { label: this.t("休載"), prop: "is_suspend", active: false },
                { label: this.t("非公開"), prop: "is_hidden", active: false },
                { label: this.t("カラー"), prop: "is_color", active: false },
                { label: this.t("今日の新作"), prop: "is_new", active: false },
            ],
            language: "",
            screen_type: "",
        };
    },
    computed: {
        filteredManga() {
            return this.books.filter((book) => {
                // 非公開作品の除外
                if (book.is_hidden && this.authUser.id !== this.bookUser.id) {
                    return false;
                }
                return this.applyFilters(book);
            });
        },
        shouldShowHiddenFilter() {
            return this.authUser.id === this.bookUser.id;
        },
    },
    methods: {
        applyFilters(book) {
            for (const filter of this.filters) {
                if (filter.active && !book[filter.prop]) {
                    return false;
                }
            }
            if (
                (this.language && book.lang !== this.language) ||
                (this.screen_type && book.screen_type !== this.screen_type)
            ) {
                return false;
            }
            return true;
        },
        filterClasses(filter) {
            return {
                "active bg-primary hover:bg-primary hover:bg-opacity-100 dark:border-primary":
                    filter.active,
            };
        },
        toggleFilter(filter) {
            filter.active = !filter.active;
        },
    },
};
</script>

<style lang="scss" scoped>
.active {
    color: white !important;
}
.select-menu {
    @apply bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-4 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262] appearance-none;
}
</style>

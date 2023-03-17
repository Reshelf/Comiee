<template>
    <div class="w-full">
        <template v-if="books.length > 0">
            <!-- 検索条件 -->
            <div
                class="flex lg:flex-wrap whitespace-nowrap overflow-x-scroll scroll-none items-center mb-4"
            >
                <!-- 作品言語 -->
                <div class="mb-4">
                    <select v-model="language" class="select-menu">
                        <option value="">作品の言語</option>
                        <option value="ja">日本語</option>
                        <option value="en">英語</option>
                        <option value="tw">繁体字</option>
                        <option value="cn">中国語</option>
                        <option value="es">スペイン語</option>
                        <option value="fr">フランス語</option>
                        <option value="it">イタリア語</option>
                        <option value="id">インドネシア語</option>
                        <option value="th">タイ語</option>
                        <option value="ko">韓国語</option>
                        <option value="de">ドイツ語</option>
                        <option value="pr">ポルトガル語</option>
                        <option value="ar">アラビア語</option>
                    </select>
                </div>

                <!-- 画面タイプ -->
                <div class="mb-4">
                    <select v-model="screen_type" class="select-menu">
                        <option value="">画面タイプ</option>
                        <option value="horizontal">横読み</option>
                        <option value="vertical">縦スクロール</option>
                    </select>
                </div>

                <!-- その他の検索条件 -->
                <template v-for="(filter, index) in filters" :key="index">
                    <div
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
                        <a :href="`/${lang}/books/${book.id}`">
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
        <template v-else>
            <div class="p-4">表示する作品がまだありません</div>
        </template>
    </div>
</template>

<script>
import { computed, ref } from "vue";

export default {
    props: {
        books: {
            type: Array,
            default: [],
        },
        lang: {
            type: String,
            default: "",
        },
    },
    setup(props) {
        const filters = ref([
            { label: "完結", prop: "is_complete", active: false },
            { label: "休載", prop: "is_suspend", active: false },
            { label: "非公開", prop: "is_hidden", active: false },
            { label: "カラー", prop: "is_color", active: false },
            { label: "今日の新作", prop: "is_new", active: false },
        ]);

        const language = ref("");
        const screen_type = ref("");

        const applyFilters = (book) => {
            for (const filter of filters.value) {
                if (filter.active && !book[filter.prop]) {
                    return false;
                }
            }

            if (
                (language.value && book.lang !== language.value) ||
                (screen_type.value && book.screen_type !== screen_type.value)
            ) {
                return false;
            }

            return true;
        };

        const filterClasses = (filter) => {
            return {
                "active bg-primary hover:bg-primary hover:bg-opacity-100 dark:border-primary":
                    filter.active,
            };
        };

        const toggleFilter = (filter) => {
            filter.active = !filter.active;
        };

        const filteredManga = computed(() => {
            return props.books.filter((book) => applyFilters(book));
        });

        return {
            filters,
            language,
            screen_type,
            applyFilters,
            filterClasses,
            toggleFilter,
            filteredManga,
        };
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

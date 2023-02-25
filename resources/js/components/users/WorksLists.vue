<template>
    <div class="w-full">
        <template v-if="books.length > 0">
            <!-- 検索条件 -->
            <div class="flex flex-wrap items-center mb-4">
                <!-- 作品言語 -->
                <div>
                    <label class="pr-2">作品言語</label>
                    <select
                        v-model="language"
                        class="dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-4 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                    >
                        <option value="">すべて</option>
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
                <div>
                    <label class="pr-2">画面タイプ</label>
                    <select
                        v-model="screen_type"
                        class="dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-4 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                    >
                        <option value="">すべて</option>
                        <option value="horizontal">横読み</option>
                        <option value="vertical">縦スクロール</option>
                    </select>
                </div>

                <!-- 完結作品 -->
                <div
                    :class="{
                        'active bg-primary hover:bg-primary hover:bg-opacity-100 dark:border-primary':
                            is_complete,
                    }"
                    class="cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-4 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                    @click="is_complete = !is_complete"
                >
                    完結作品
                </div>

                <!-- カラー作品 -->
                <div
                    :class="{
                        'active bg-primary hover:bg-primary hover:bg-opacity-100 dark:border-primary':
                            is_color,
                    }"
                    class="cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-4 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                    @click="is_color = !is_color"
                >
                    カラー作品
                </div>

                <!-- 休載作品 -->
                <div
                    :class="{
                        'active bg-primary hover:bg-primary hover:bg-opacity-100 dark:border-primary':
                            is_suspend,
                    }"
                    class="cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-4 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                    @click="is_suspend = !is_suspend"
                >
                    休載作品
                </div>
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
                                    src="{{ asset('/img/noimage.svg') }}"
                                    alt=""
                                    class="block dark:hidden min-h-[200px] max-h-[200px] w-full md:min-w-[200px] md:max-w-[200px] object-cover"
                                />
                                <img
                                    src="{{ asset('/img/noimage-dark.svg') }}"
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
export default {
    props: {
        books: {
            type: Array,
            default: [],
        },
    },
    data() {
        return {
            // 検索条件
            is_complete: false,
            is_suspend: false,
            is_color: false,
            language: "",
            screen_type: "",
        };
    },
    computed: {
        filteredManga() {
            let result = this.books;
            if (this.is_complete) {
                result = result.filter((manga) => manga.is_complete);
            }
            if (this.is_suspend) {
                result = result.filter((manga) => manga.is_suspend);
            }
            if (this.is_color) {
                result = result.filter((manga) => manga.is_color);
            }
            if (this.language) {
                result = result.filter((manga) => manga.lang === this.language);
            }
            if (this.screen_type) {
                result = result.filter(
                    (manga) => manga.screen_type === this.screen_type
                );
            }
            return result;
        },
    },
};
</script>
<style lang="scss" scoped>
.active {
    color: white !important;
}
select {
    @apply appearance-none;
}
</style>

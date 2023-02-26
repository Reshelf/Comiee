<template>
    <div ref="box" class="w-full">
        <!-- 検索条件 -->
        <div class="flex flex-wrap items-center mb-4">
            <!-- 画面タイプ -->
            <div class="mb-4">
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
                class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-4 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
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
                class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-4 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
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
                class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-4 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                @click="is_suspend = !is_suspend"
            >
                休載作品
            </div>
        </div>

        <!-- 作品 -->
        <div class="flex flex-wrap">
            <template v-for="manga in filteredManga" :key="manga.id">
                <div class="list-item">
                    <a :href="`/${lang}/books/${manga.id}`">
                        <template v-if="manga.thumbnail">
                            <img
                                :src="manga.thumbnail"
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
                        <span class="thumbnail-title">{{ manga.title }}</span>
                    </a>
                </div>
            </template>
        </div>

        <!-- ローディング -->
        <template v-if="loading">
            <div class="p-4">取得中...</div>
        </template>

        <!-- 0件 -->
        <template v-if="filteredManga.length === 0">
            <div class="p-4">表示する作品がまだありません</div>
        </template>
    </div>
</template>
<script>
export default {
    props: {
        lang: {
            type: String,
            default: "",
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

            // ロード
            mangas: [],
            currentPage: 1,
            lastPage: 1,
            loading: false,
            error: null,
        };
    },
    computed: {
        setManga() {
            return this.mangas ? this.mangas : null;
        },
        filteredManga() {
            let result = this.setManga;
            if (this.is_complete) {
                result = result.filter((manga) => manga.is_complete);
            }
            if (this.is_suspend) {
                result = result.filter((manga) => manga.is_suspend);
            }
            if (this.is_color) {
                result = result.filter((manga) => manga.is_color);
            }
            if (this.lang) {
                result = result.filter((manga) => manga.lang === this.lang);
            }
            if (this.screen_type) {
                result = result.filter(
                    (manga) => manga.screen_type === this.screen_type
                );
            }
            return result;
        },
    },
    mounted() {
        this.loadMore();

        window.onscroll = () => {
            //一定位置以上スクロールされればtrueを返す
            let bottomOfWindow =
                document.documentElement.scrollTop + window.innerHeight >=
                document.documentElement.offsetHeight;

            //trueでデータ取得
            if (bottomOfWindow) {
                this.loadMore();
            }
        };
    },
    methods: {
        loadMore() {
            if (this.loading || this.currentPage > this.lastPage) {
                return;
            }
            this.loading = true;
            axios
                .get(`/api/book?page=${this.currentPage}`)
                .then((response) => {
                    this.mangas = this.mangas.concat(response.data.data);
                    this.currentPage = response.data.current_page + 1;
                    this.lastPage = response.data.last_page;
                })
                .catch((error) => {
                    this.error = error;
                })
                .finally(() => {
                    this.loading = false;
                });
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

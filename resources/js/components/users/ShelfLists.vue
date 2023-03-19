<template>
    <div class="flex max-w-5xl w-full mx-auto px-6 md:px-0 justify-center mb-8">
        <div class="w-full lg:mt-4">
            <h3 class="text-2xl font-semibold py-4 block lg:hidden">本棚</h3>
            <div class="w-full lg:my-4 flex">
                <div class="setting-tab">
                    <!-- 項目 -->
                    <ul
                        class="tabMenu scroll-none sticky top-0 lg:h-[300px] lg:min-w-[200px]"
                    >
                        <h3
                            class="text-2xl font-semibold py-4 lg:pt-0 hidden lg:block"
                        >
                            本棚
                        </h3>
                        <h4
                            class="hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg whitespace-nowrap cursor-pointer tracking-widest"
                            :class="
                                isLikes
                                    ? 'text-primary dark:text-f5 font-semibold bg-f5 dark:bg-dark-1'
                                    : ''
                            "
                            @click="
                                (isLikes = true),
                                    (isRead = false),
                                    (isBought = false)
                            "
                        >
                            <svg
                                width="22"
                                height="22"
                                class="mr-4 hidden lg:block"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M12.62 20.8101C12.28 20.9301 11.72 20.9301 11.38 20.8101C8.48 19.8201 2 15.6901 2 8.6901C2 5.6001 4.49 3.1001 7.56 3.1001C9.38 3.1001 10.99 3.9801 12 5.3401C13.01 3.9801 14.63 3.1001 16.44 3.1001C19.51 3.1001 22 5.6001 22 8.6901C22 15.6901 15.52 19.8201 12.62 20.8101Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>

                            お気に入り
                        </h4>

                        <h4
                            class="hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg whitespace-nowrap cursor-pointer tracking-widest"
                            :class="
                                isRead
                                    ? 'text-primary dark:text-f5 font-semibold bg-f5 dark:bg-dark-1'
                                    : ''
                            "
                            @click="
                                (isLikes = false),
                                    (isRead = true),
                                    (isBought = false)
                            "
                        >
                            <svg
                                width="22"
                                height="22"
                                class="mr-4 hidden lg:block"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M9.57002 12.46L6.52002 15.51"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M6.54999 12.49L9.59999 15.54"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M13.53 14H13.54"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M17.47 14H17.48"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M15.5 15.98V15.96"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M15.5 12.04V12.02"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 22H15C20 22 22 20 22 15V13C22 8 20 6 15 6H9C4 6 2 8 2 13V15C2 20 4 22 9 22Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M13.01 2L13 3.01C12.99 3.56 12.55 4 12 4H11.97C11.42 4 10.98 4.45 10.98 5C10.98 5.55 11.43 6 11.98 6H12.98"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>

                            閲覧履歴
                        </h4>
                        <h4
                            class="hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg whitespace-nowrap cursor-pointer tracking-widest"
                            :class="
                                isBought
                                    ? 'text-primary dark:text-f5 font-semibold bg-f5 dark:bg-dark-1'
                                    : ''
                            "
                            @click="
                                (isLikes = false),
                                    (isRead = false),
                                    (isBought = true)
                            "
                        >
                            <svg
                                width="22"
                                height="22"
                                class="mr-4 hidden lg:block"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M10.4899 2.23006L5.49991 4.11006C4.34991 4.54006 3.40991 5.90006 3.40991 7.12006V14.5501C3.40991 15.7301 4.18991 17.2801 5.13991 17.9901L9.43991 21.2001C10.8499 22.2601 13.1699 22.2601 14.5799 21.2001L18.8799 17.9901C19.8299 17.2801 20.6099 15.7301 20.6099 14.5501V7.12006C20.6099 5.89006 19.6699 4.53006 18.5199 4.10006L13.5299 2.23006C12.6799 1.92006 11.3199 1.92006 10.4899 2.23006Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9.05005 11.8702L10.66 13.4802L14.96 9.18018"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            購入履歴
                        </h4>
                    </ul>

                    <div class="tabContents">
                        <div class="w-full flex flex-col my-4">
                            <div ref="box" class="w-full">
                                <!-- お気に入り -->
                                <template v-if="isLikes">
                                    <!-- 検索条件 -->
                                    <div
                                        class="w-full flex whitespace-nowrap overflow-x-scroll scroll-none items-center mt-4 lg:mt-0 mb-4"
                                    >
                                        <!-- 画面タイプ -->
                                        <div class="mb-4">
                                            <select
                                                v-model="screen_type"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    画面タイプ
                                                </option>
                                                <option value="horizontal">
                                                    横読み
                                                </option>
                                                <option value="vertical">
                                                    縦スクロール
                                                </option>
                                            </select>
                                        </div>

                                        <!-- 完結作品 -->
                                        <div
                                            :class="
                                                is_complete
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_complete = !is_complete"
                                        >
                                            完結作品
                                        </div>

                                        <!-- カラー作品 -->
                                        <div
                                            :class="
                                                is_color
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_color = !is_color"
                                        >
                                            カラー作品
                                        </div>

                                        <!-- 全話無料 -->
                                        <div
                                            :class="
                                                is_all_charge
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="
                                                is_all_charge = !is_all_charge
                                            "
                                        >
                                            全話無料
                                        </div>

                                        <!-- 今日の新作 -->
                                        <div
                                            :class="
                                                is_new
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_new = !is_new"
                                        >
                                            今日の新作
                                        </div>

                                        <!-- 閲覧数 -->
                                        <div class="mb-4 flex items-center">
                                            <select
                                                v-model="views"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">閲覧数</option>
                                                <option value="much">
                                                    多い順
                                                </option>
                                                <option value="less">
                                                    少ない順
                                                </option>
                                            </select>
                                        </div>

                                        <!-- ジャンル -->
                                        <div class="mb-4 flex items-center">
                                            <select
                                                v-model="genre_id"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    ジャンル
                                                </option>
                                                <option value="1">少年</option>
                                                <option value="2">青年</option>
                                                <option value="3">少女</option>
                                                <option value="4">女性</option>
                                            </select>
                                        </div>

                                        <!-- 言語 -->
                                        <div class="mb-4 flex items-center">
                                            <select
                                                v-model="manga_lang"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    作品言語
                                                </option>
                                                <option value="ja">
                                                    日本語
                                                </option>
                                                <option value="en">
                                                    English
                                                </option>
                                                <option value="tw">
                                                    繁体字
                                                </option>
                                                <option value="cn">
                                                    簡体字
                                                </option>
                                                <option value="es">
                                                    スペイン語
                                                </option>
                                                <option value="fr">
                                                    フランス語
                                                </option>
                                                <option value="it">
                                                    イタリア語
                                                </option>
                                                <option value="id">
                                                    インドネシア語
                                                </option>
                                                <option value="th">
                                                    タイ語
                                                </option>
                                                <option value="ko">
                                                    韓国語
                                                </option>
                                                <option value="de">
                                                    ドイツ語
                                                </option>
                                            </select>
                                        </div>

                                        <!-- 休載中 -->
                                        <div
                                            :class="
                                                is_suspend
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_suspend = !is_suspend"
                                        >
                                            休載中
                                        </div>
                                    </div>

                                    <!-- お気に入り -->
                                    <div class="flex flex-wrap">
                                        <template
                                            v-for="manga in filteredLikesManga"
                                            :key="manga.id"
                                        >
                                            <div class="list-item">
                                                <a
                                                    :href="`/${lang}/books/${manga.id}`"
                                                >
                                                    <template
                                                        v-if="manga.thumbnail"
                                                    >
                                                        <img
                                                            :src="
                                                                manga.thumbnail
                                                            "
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
                                                    <span
                                                        class="thumbnail-title"
                                                        >{{ manga.title }}</span
                                                    >
                                                </a>
                                            </div>
                                        </template>

                                        <!-- 0件 -->
                                        <div
                                            v-if="
                                                filteredLikesManga.length === 0
                                            "
                                        >
                                            {{ message }}
                                        </div>
                                    </div>
                                </template>

                                <!-- 閲覧履歴 -->
                                <template v-if="isRead">
                                    <div class="flex flex-wrap">
                                        <template
                                            v-for="episode in readsBooks"
                                            :key="episode.id"
                                        >
                                            <div class="list-item">
                                                <a
                                                    :href="`/${lang}/books/${episode.book_id}/${episode.number}`"
                                                >
                                                    <template
                                                        v-if="episode.thumbnail"
                                                    >
                                                        <img
                                                            :src="
                                                                episode.thumbnail
                                                            "
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
                                                    <span
                                                        class="thumbnail-title"
                                                        >{{ episode.title }}
                                                        {{
                                                            episode.number
                                                        }}話</span
                                                    >
                                                </a>
                                            </div>
                                        </template>
                                    </div>

                                    <!-- 0件 -->
                                    <div
                                        v-if="readsBooks.length === 0"
                                        class="py-8"
                                    >
                                        {{ message }}
                                    </div>
                                </template>

                                <!-- 購入履歴 -->
                                <template v-if="isBought">
                                    <div class="flex flex-wrap">
                                        <template
                                            v-for="episode in boughtBooks"
                                            :key="episode.id"
                                        >
                                            <div class="list-item">
                                                <a
                                                    :href="`/${lang}/books/${episode.book_id}/${episode.number}`"
                                                >
                                                    <template
                                                        v-if="episode.thumbnail"
                                                    >
                                                        <img
                                                            :src="
                                                                episode.thumbnail
                                                            "
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
                                                    <span
                                                        class="thumbnail-title"
                                                        >{{ episode.title }}
                                                        {{
                                                            episode.number
                                                        }}話</span
                                                    >
                                                </a>
                                            </div>
                                        </template>
                                    </div>

                                    <!-- 0件 -->
                                    <div
                                        v-if="boughtBooks.length === 0"
                                        class="py-8"
                                    >
                                        {{ message }}
                                    </div>
                                </template>

                                <!-- ローディング -->
                                <div v-if="loading" class="p-4">取得中...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        lang: {
            type: String,
            default: "",
        },
        user: {
            type: Object,
            default: {},
        },
        likeBooks: {
            type: Array,
            default: [],
        },
        readsBooks: {
            type: Array,
            default: [],
        },
        boughtBooks: {
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
            screen_type: "",
            is_all_charge: false,
            is_new: false,
            views: "",
            genre_id: "",
            manga_lang: this.lang,

            // ロード
            loading: false,
            error: null,
            message: "表示する作品がまだありません",

            // 選択タブ
            isLikes: true,
            isRead: false,
            isBought: false,
        };
    },
    computed: {
        setLikesBook() {
            return this.likeBooks ? this.likeBooks : null;
        },
        filteredLikesManga() {
            let result = this.setLikesBook;

            // 検索
            if (this.is_complete)
                result = result.filter((manga) => manga.is_complete);
            if (this.is_color)
                result = result.filter((manga) => manga.is_color);
            if (this.is_new) result = result.filter((manga) => manga.is_new);
            if (this.is_suspend)
                result = result.filter((manga) => manga.is_suspend);
            if (this.is_all_charge)
                result = result.filter(
                    (manga) => manga.is_all_charge === "false"
                );
            // 閲覧数 降順、昇順
            if (this.views === "much") {
                result = result.sort((a, b) => b.views - a.views);
            } else if (this.views === "less") {
                result = result.sort((a, b) => a.views - b.views);
            }
            // 言語
            if (this.manga_lang) {
                result = result.filter(
                    (manga) => manga.lang == this.manga_lang
                );
            }

            // 画面タイプ
            if (this.screen_type) {
                result = result.filter(
                    (manga) => manga.screen_type == this.screen_type
                );
            }

            // ジャンル
            if (this.genre_id) {
                let selected_genre = parseInt(this.genre_id); // 文字列 → 数字変換
                result = result.filter(
                    (manga) => manga.genre_id === selected_genre
                );
            }

            // ランダムにする
            result.sort(() => Math.random() - 0.5);
            return result;
        },
    },
    mounted() {},
    methods: {},
};
</script>
<style lang="scss" scoped>
.active {
    @apply bg-primary hover:bg-primary dark:border-primary;
    color: white !important;
}
select {
    @apply appearance-none;
}
</style>

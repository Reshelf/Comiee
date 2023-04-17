<template>
    <div>
        <div class="p-12 w-full">
            <div
                class="w-full flex items-center mb-8 pb-4 cursor-pointer border-b border-comiee"
                @click="closeBookDetail"
            >
                <svg
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6 mr-4"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"
                    />
                </svg>
                {{ t("戻る") }}
            </div>

            <div class=""></div>

            <div class="w-full flex">
                <div class="w-1/5 p-8 flex flex-col">
                    <div class="">離脱率</div>
                    <div class="">ページビュー</div>
                    <div class="">平均滞在時間</div>
                    <div class=""></div>
                </div>
                <div class="w-4/5 p-8">
                    <div class="">
                        <div class="bounceRate">
                            <div
                                class="circular-progress"
                                :style="
                                    circularProgressStyle(
                                        selectedBook.bounce_rate
                                    )
                                "
                            >
                                <span class="relative text-2xl"
                                    >{{
                                        roundToZeroDecimal(
                                            selectedBook.bounce_rate
                                        )
                                    }}%</span
                                >
                            </div>
                            <span class="">離脱率</span>
                        </div>
                    </div>
                    <!-- テーブル -->
                    <section class="overflow-auto">
                        <!-- thead -->
                        <div
                            class="w-full flex items-center whitespace-nowrap mb-4 py-4 border-y border-comiee text-xs text-aaa"
                        >
                            <div class="px-4 min-w-[382px]">エピソード</div>
                            <div class="px-4 min-w-[100px]">公開設定</div>
                            <div class="px-4 min-w-[100px] text-right">
                                閲覧回数
                            </div>
                            <div class="px-4 min-w-[100px] text-right">
                                ユーザー数
                            </div>
                            <div class="px-4 min-w-[100px] text-right">
                                お気に入り数
                            </div>
                            <div class="px-4 min-w-[100px] text-right">
                                いいね総数
                            </div>
                            <div class="px-4 min-w-[100px] text-right">
                                離脱率
                            </div>
                            <div class="px-4 min-w-[100px] text-right">
                                平均滞在時間
                            </div>
                            <div class="px-4 min-w-[100px] text-right">
                                売上金額
                            </div>
                            <div class="px-4 min-w-[100px] text-right">
                                コンバージョン率
                            </div>
                            <div class="px-4 min-w-[100px] text-right">
                                コメント数
                            </div>
                        </div>

                        <!-- tbody -->
                        <div
                            v-for="episode in selectedBook.episodes"
                            :key="episode.id"
                            class="flex"
                        >
                            <div
                                class="cursor-pointer flex text-[13px] min-w-[382px] max-w-[382px] mb-2 pb-2 border-b border-comiee"
                                @click="selectBook(episode)"
                            >
                                <img
                                    :src="episode.thumbnail"
                                    alt="thumbnail"
                                    class="w-full md:w-[120px] h-[68px] object-cover"
                                    loading="lazy"
                                />
                                <div class="w-full flex flex-col px-4 py-2">
                                    <h3 class="text-[13px]">
                                        {{ episode.title }}
                                    </h3>
                                    <!-- <div
                                                    class="text-xs max-[232px] truncate"
                                                >
                                                    {{ episode.story }}
                                                </div> -->
                                </div>
                            </div>
                            <!-- 公開設定 -->
                            <div
                                class="flex text-[13px] justify-start px-4 min-w-[100px] max-w-[100px] mb-2 pb-2 border-b border-comiee"
                            >
                                <template v-if="episode.is_hidden">
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
                            </div>
                        </div>
                    </section>

                    <!-- グラフ -->
                    <page-views-graph
                        v-if="selectedBook"
                        :book="selectedBook"
                    ></page-views-graph>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import PageViewsGraph from "@/components/analytics/book/PageViewsGraph.vue";
export default {
    data() {
        return {
            show: false,
        };
    },
    components: {
        PageViewsGraph,
    },
    props: {
        isBookDetail: Boolean,
        selectedBook: Object,
    },
    methods: {
        // 作品詳細を閉じる
        closeBookDetail() {
            this.$emit("close-book-detail");
        },
        // 作品を選択
        selectBook(book) {
            this.selectedBook = book;
            this.show = true;
        },
        // 小数点以下を切り捨て
        roundToZeroDecimal(value) {
            return parseFloat(value).toFixed(0);
        },
        // 離脱率グラフの動的スタイル
        circularProgressStyle(bounceRate) {
            const progressDegrees = (bounceRate / 100) * 360;
            return {
                background: `conic-gradient(#0570de ${progressDegrees}deg, #eee 0deg)`,
            };
        },
    },
};
</script>

<template>
    <div class="">
        <h2 class="text-2xl mb-8">{{ t("コンテンツ分析") }}</h2>
        <section class="">
            <div
                class="w-full flex items-center justify-between whitespace-nowrap mb-4 py-4 border-y border-[#dadce0] dark:border-dark-1 text-xs text-aaa"
            >
                <div class="px-4">作品</div>
                <div class="px-4">ページビュー数</div>
                <div class="px-4">閲覧回数</div>
                <div class="px-4">ユニークユーザー数</div>
                <div class="px-4">コメント数</div>
                <div class="px-4">売上金額</div>
                <div class="px-4">詳細設定</div>
            </div>
            <div v-for="book in books" :key="book.id" class="flex">
                <a href="">
                    <img
                        :src="book.thumbnail"
                        alt="thumbnail"
                        class="w-full md:w-[120px] h-[68px] object-cover"
                        loading="lazy"
                    />
                </a>
                <div class="flex flex-col px-4 py-2">
                    <h3 class="text-[13px]">{{ book.title }}</h3>
                    <div class="text-xs">{{ book.story }}</div>
                </div>
                <div class="" @click="show = !show">詳細</div>
            </div>
        </section>
        <transition name="animation-bg">
            <div
                v-show="show"
                class="absolute left-0 right-0 top-0 bottom-0 bg-white dark:bg-dark z-50"
            >
                <div class="p-12">
                    <div
                        class="flex items-center mb-8 pb-4 cursor-pointer border-b border-[#dadce0] dark:border-dark-1"
                        @click="show = !show"
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
                    <page-views-graph
                        :page-views="pageViews"
                    ></page-views-graph>
                </div>
            </div>
        </transition>
    </div>
</template>
<script>
import PageViewsGraph from "@/components/analytics/book/PageViewsGraph.vue";
export default {
    components: {
        PageViewsGraph,
    },
    props: {
        pageViews: {
            type: Array,
            required: true,
        },
        books: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            show: false,
        };
    },
};
</script>
<style lang="scss" scoped>
.animation-bg-enter-active {
    animation-name: PageIn;
    animation-duration: 0.2s;
}
.animation-bg-leave-active {
    animation-name: PageLeave;
    animation-duration: 0.3s;
}

@keyframes PageIn {
    0% {
        transform-origin: left;
        transform: scaleX(0);
    }
    100% {
        transform-origin: left;
        transform: scaleX(1);
    }
}
.animation-bg {
    animation-name: PageLeave;
}
@keyframes PageLeave {
    0% {
        transform-origin: right;
        transform: scaleX(1);
    }
    100% {
        transform-origin: right;
        transform: scaleX(0);
    }
}
</style>

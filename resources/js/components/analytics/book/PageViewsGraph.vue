<template>
    <div class="my-8">
        <h3 class="text-xs text-[#9aa0a6] leading-6">作品名</h3>
        <div class="text-3xl mb-8">
            {{ book.title }}
        </div>
        <div class="p-10 border border-[#dadce0] dark:border-dark-1">
            <h3 class="text-xs text-[#9aa0a6] leading-6">ページビュー</h3>
            <div class="flex items-center">
                <span class="lg:text-[28px] text-2xl">{{ animatedCount }}</span>
                <svg height="18" class="ml-2" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M15.5799 11.9999C15.5799 13.9799 13.9799 15.5799 11.9999 15.5799C10.0199 15.5799 8.41992 13.9799 8.41992 11.9999C8.41992 10.0199 10.0199 8.41992 11.9999 8.41992C13.9799 8.41992 15.5799 10.0199 15.5799 11.9999Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                    <path
                        d="M12.0001 20.2702C15.5301 20.2702 18.8201 18.1902 21.1101 14.5902C22.0101 13.1802 22.0101 10.8102 21.1101 9.40021C18.8201 5.80021 15.5301 3.72021 12.0001 3.72021C8.47009 3.72021 5.18009 5.80021 2.89009 9.40021C1.99009 10.8102 1.99009 13.1802 2.89009 14.5902C5.18009 18.1902 8.47009 20.2702 12.0001 20.2702Z"
                        stroke="currentColor"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </div>
            <line-chart :data="weeklyData" />
        </div>
    </div>
</template>

<script>
import CountUp from "@/common/utils/CountUp";
import LineChart from "@/components/analytics/atoms/LineChart.vue";
export default {
    components: {
        LineChart,
    },
    props: {
        pageViews: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            book: this.pageViews[0].book,
            animatedCount: 0,
        };
    },
    computed: {
        weeklyData() {
            // データを日付でグループ化
            const groupedData = this.pageViews.reduce((acc, currentValue) => {
                const date = currentValue.created_at.split("T")[0];
                if (!acc[date]) {
                    acc[date] = 0;
                }
                acc[date] += 1; // ここを変更
                return acc;
            }, {});

            // 過去7日間のデータを作成
            const data = [];
            for (let i = 6; i >= 0; i--) {
                const date = new Date();
                date.setDate(date.getDate() - i);
                const dateString = date.toISOString().split("T")[0];
                data.push({
                    date: dateString,
                    count: groupedData[dateString] || 0,
                });
            }

            return data.map((d, i) => ({
                x: i,
                y: isNaN(d.count) ? 0 : d.count,
                date: d.date,
            }));
        },
        linePath() {
            const pathData = this.weeklyData.reduce((acc, point, index) => {
                if (index === 0) {
                    return `M ${point.x} ${point.y}`;
                }
                const prevPoint = this.weeklyData[index - 1];
                const midX = (prevPoint.x + point.x) / 2;
                return `${acc} Q ${prevPoint.x} ${prevPoint.y}, ${midX} ${prevPoint.y} T ${point.x} ${point.y}`;
            }, "");
            return pathData;
        },
    },

    mounted() {
        // ページビュー数アニメーション
        const counter = new CountUp(this.pageViews.length);
        counter.start((value) => {
            this.animatedCount = value;
        });
    },
};
</script>

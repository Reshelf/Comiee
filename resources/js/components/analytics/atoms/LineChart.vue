<template>
    <div ref="graph" class="w-full pt-8 flex justify-center items-center">
        <svg
            class="w-full"
            :height="height"
            @mousemove="handleLineMouseover"
            @mouseleave="handleMouseleave"
        >
            <line
                :x1="paddingLeft"
                :y1="height - paddingBottom"
                :x2="width - paddingRight"
                :y2="height - paddingBottom"
                stroke="#dadce0"
                stroke-width="2"
            />

            <g v-for="i in 3" :key="i">
                <text
                    :x="paddingLeft - 10"
                    :y="height - paddingBottom - i * intervalYScale"
                    text-anchor="end"
                    font-size="12"
                >
                    {{ formatNumber(i * interval) }}
                </text>

                <line
                    :x1="paddingLeft"
                    :y1="height - paddingBottom - i * intervalYScale"
                    :x2="width - paddingRight"
                    :y2="height - paddingBottom - i * intervalYScale"
                    style="stroke: rgb(218, 220, 224)"
                />
            </g>

            <defs>
                <linearGradient id="lineShadow" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="#0076f0" stop-opacity="0.3" />
                    <stop offset="100%" stop-color="#0076f0" stop-opacity="0" />
                </linearGradient>
            </defs>

            <path :d="shadowPath" fill="url(#lineShadow)">
                <animate
                    attributeName="opacity"
                    from="0"
                    to="1"
                    dur=".5s"
                    fill="freeze"
                />
            </path>
            <g>
                <path
                    :d="linePath"
                    fill="none"
                    stroke="#0076f0"
                    stroke-width="4"
                >
                    <animate
                        attributeName="stroke-dasharray"
                        from="0, 1000"
                        to="1000, 0"
                        dur=".5s"
                        fill="freeze"
                    />
                </path>
            </g>

            <g v-for="(point, index) in points" :key="index">
                <line
                    :x1="point.x"
                    :y1="height - paddingBottom"
                    :x2="point.x"
                    :y2="height - paddingBottom - intervalYScale * 3"
                    :stroke-opacity="borderVisible[index] ? 1 : 0"
                    stroke="#bbb"
                    stroke-width="1"
                    stroke-dasharray="2,2"
                />
                <circle
                    :cx="point.x"
                    :cy="point.y"
                    r="4"
                    class="rounded-full fill-primary z-50"
                    :opacity="borderVisible[index] ? 1 : 0"
                />

                <text
                    :x="point.x"
                    :y="height - paddingBottom + 20"
                    text-anchor="middle"
                    font-size="12"
                >
                    {{ formatDate(point.date) }}
                </text>
            </g>

            <foreignObject
                v-if="tooltipVisible"
                :x="tooltipPosition.x"
                :y="tooltipPosition.y"
                width="100"
                height="100"
            >
                <div
                    class="bg-white rounded text-xs border border-[#dadce0] dark:border-dark-1 p-2"
                >
                    {{ t("ページビュー") }}
                    <p class="text-2xl">
                        {{ formatNumber(tooltipData.pageViews) }}
                    </p>
                </div>
            </foreignObject>
        </svg>
    </div>
</template>

<script>
export default {
    props: {
        data: {
            type: Array,
            required: true,
        },
        type: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            width: 600,
            height: 300,
            paddingLeft: 40,
            paddingRight: 20,
            paddingTop: 20,
            paddingBottom: 40,

            tooltipVisible: false,
            tooltipData: {},
            tooltipPosition: { x: 0, y: 0 },
            borderVisible: [],
        };
    },
    computed: {
        points() {
            const yScale =
                (this.height - this.paddingTop - this.paddingBottom) /
                (this.yMax * 1.5);

            let limit;
            if (this.type === "daily") {
                limit = this.data.length;
            } else if (this.type === "weekly") {
                limit = Math.min(this.data.length, 7);
            } else if (this.type === "monthly") {
                limit = Math.min(this.data.length, 30);
            } else if (this.type === "yearly") {
                limit = Math.min(this.data.length, 12);
            } else {
                limit = 7;
            }

            const limitedData = this.data.slice(-limit);

            const xScale =
                (this.width - this.paddingLeft - this.paddingRight) /
                (limitedData.length - 1);

            return limitedData.map((d, i) => {
                return {
                    x: this.paddingLeft + i * xScale,
                    y: this.height - this.paddingBottom - d.y * yScale,
                    date: d.date,
                };
            });
        },
        linePath() {
            if (this.points.length < 2) {
                return "";
            }

            let pathData = `M${this.points[0].x},${this.points[0].y}`;

            for (let i = 1; i < this.points.length; i++) {
                const prevPoint = this.points[i - 1];
                const currentPoint = this.points[i];
                const controlPointX = (currentPoint.x + prevPoint.x) / 2;
                pathData += `C${controlPointX},${prevPoint.y},${controlPointX},${currentPoint.y},${currentPoint.x},${currentPoint.y}`;
            }

            return pathData;
        },
        shadowPath() {
            let shadowPathString = this.linePath;

            // 最後のポイントを取得し、影のオフセットを適用します
            const lastPoint = this.points[this.points.length - 1];
            shadowPathString += ` L${lastPoint.x},${
                this.height - this.paddingBottom
            }`;

            // 影のパスを閉じるために、最初のポイントに戻ります
            const firstPoint = this.points[0];
            shadowPathString += ` L${firstPoint.x},${
                this.height - this.paddingBottom
            } Z`;

            return shadowPathString;
        },
        yMax() {
            const maxValue = Math.max(...this.data.map((d) => d.y)) || 1;
            return maxValue > 2 ? maxValue : 2;
        },
        yScale() {
            return (
                (this.height - this.paddingTop - this.paddingBottom) /
                (this.yMax * 1.5)
            );
        },
        interval() {
            return this.yMax / 2;
        },
        intervalYScale() {
            return this.yScale * this.interval;
        },
    },
    mounted() {
        this.$nextTick(() => {
            this.width = this.$refs.graph.clientWidth;
            this.borderVisible = Array(this.points.length).fill(false);
        });
    },
    methods: {
        formatDate(date) {
            const d = new Date(date);
            const month = d.getMonth() + 1;
            const day = d.getDate();

            if (this.type === "daily") {
                return `${month}-${day}`;
            } else if (this.type === "weekly") {
                return `${month}/${day}`;
            } else if (this.type === "monthly") {
                const firstDayOfMonth = new Date(
                    d.getFullYear(),
                    d.getMonth(),
                    1
                );
                const dayDifference = Math.ceil(
                    (d - firstDayOfMonth) / (1000 * 60 * 60 * 24)
                );
                return `${month}/${dayDifference}`;
            } else if (this.type === "yearly") {
                return `${d.getFullYear()}/${month}`;
            } else {
                return `${month}-${day}`;
            }
        },
        formatNumber(value) {
            if (value >= 1000000000000) {
                return (value / 1000000000000).toFixed(1) + "t";
            } else if (value >= 1000000000) {
                return (value / 1000000000).toFixed(1) + "b";
            } else if (value >= 1000000) {
                return (value / 1000000).toFixed(1) + "m";
            } else if (value >= 1000) {
                return (value / 1000).toFixed(1) + "k";
            } else {
                return value;
            }
        },
        showTooltip(index) {
            this.tooltipVisible = true;
            this.tooltipData = {
                pageViews: this.data[index].y,
            };
            this.tooltipPosition = {
                x: this.points[index].x - 50,
                y: this.points[index].y - 70,
            };
        },
        hideTooltip() {
            this.tooltipVisible = false;
        },
        showBorder(index) {
            this.borderVisible[index] = true;
        },
        hideBorder() {
            this.borderVisible = this.borderVisible.map(() => false);
        },
        handleMouseleave() {
            this.hideBorder();
            this.hideTooltip();
        },
        handleLineMouseover(event) {
            const mouseX =
                event.clientX - this.$refs.graph.getBoundingClientRect().left;

            let closestIndex = 0;
            let minDistanceX = Number.MAX_VALUE;

            this.points.forEach((point, index) => {
                const distanceX = Math.abs(point.x - mouseX);

                if (distanceX < minDistanceX) {
                    minDistanceX = distanceX;
                    closestIndex = index;
                }
            });

            const xScale = this.points[1].x - this.points[0].x;

            if (minDistanceX < xScale * 0.5) {
                this.borderVisible = this.borderVisible.map(() => false); // Add this line
                this.showBorder(closestIndex);
                this.showTooltip(closestIndex);
            } else {
                this.hideBorder();
                this.hideTooltip();
            }
        },
    },
};
</script>

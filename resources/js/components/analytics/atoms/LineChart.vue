<template>
    <div
        ref="graph"
        class="duration-300 w-full py-8 flex justify-center items-center"
    >
        <svg class="w-full" :height="height">
            <line
                :x1="paddingLeft"
                :y1="height - paddingBottom"
                :x2="width - paddingRight"
                :y2="height - paddingBottom"
                stroke="#dadce0"
                stroke-width="2"
            />

            <g v-for="i in 4" :key="i">
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
                    dur="1s"
                    fill="freeze"
                />
            </path>
            <g>
                <path
                    :d="linePath"
                    fill="none"
                    stroke="#0076f0"
                    stroke-width="3"
                >
                    <animate
                        attributeName="stroke-dasharray"
                        from="0, 1000"
                        to="1000, 0"
                        dur="1s"
                        fill="freeze"
                    />
                </path>
            </g>

            <g v-for="(point, index) in points" :key="index">
                <circle class="fill-primary" :cx="point.x" :cy="point.y" r="4">
                    <animate
                        attributeName="r"
                        from="0"
                        to="4"
                        dur="1s"
                        begin="0s"
                        fill="freeze"
                    />
                </circle>
                <text
                    :x="point.x"
                    :y="height - paddingBottom + 20"
                    text-anchor="middle"
                    font-size="12"
                >
                    {{ formatDate(data[index].date) }}
                </text>
            </g>
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
    },
    data() {
        return {
            width: 600,
            height: 300,
            paddingLeft: 40,
            paddingRight: 20,
            paddingTop: 20,
            paddingBottom: 40,
        };
    },
    computed: {
        points() {
            const xScale =
                (this.width - this.paddingLeft - this.paddingRight) /
                (this.data.length - 1);
            const yScale =
                (this.height - this.paddingTop - this.paddingBottom) /
                (this.yMax * 2);

            const limitedData = this.data.slice(-7);

            return limitedData.map((d, i) => {
                return {
                    x: this.paddingLeft + i * xScale,
                    y: this.height - this.paddingBottom - d.y * yScale,
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
            return Math.max(...this.data.map((d) => d.y)) || 1;
        },
        yScale() {
            return (
                (this.height - this.paddingTop - this.paddingBottom) /
                (this.yMax * 2)
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
        });
    },
    methods: {
        formatDate(date) {
            const d = new Date(date);
            return `${d.getMonth() + 1}-${d.getDate()}`;
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
    },
};
</script>

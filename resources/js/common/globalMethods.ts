import { App } from "vue";

declare module "@vue/runtime-core" {
    interface ComponentCustomProperties {
        isEmpty(value: unknown): boolean;
        formatNumber(value: number): string;
    }
}

const globalMethods = {
    install(app: App) {
        // 空判定
        app.config.globalProperties.isEmpty = function (
            value: unknown
        ): boolean {
            return value === undefined || value === null;
        };

        // 数値をフォーマット
        app.config.globalProperties.formatNumber = function (
            value: number
        ): string {
            const format = (num: number, unit: string): string => {
                const formattedNum = (value / num).toFixed(1);
                return formattedNum.endsWith(".0") // 小数点以下が0の場合は小数点以下を削除
                    ? formattedNum.slice(0, -2) + unit
                    : formattedNum + unit;
            };

            // 3桁ごとにカンマを挿入
            const numberWithCommas = (x: number): string => {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            };

            if (value >= 1e12) {
                return format(1e12, "t"); // 1兆以上
            } else if (value >= 1e9) {
                return format(1e9, "b"); // 1億以上
            } else if (value >= 1e6) {
                return format(1e6, "m"); // 1百万以上
            } else if (value >= 1e3) {
                return numberWithCommas(value); // 1千以上
            } else {
                return value.toString();
            }
        };
    },
};

export default globalMethods;

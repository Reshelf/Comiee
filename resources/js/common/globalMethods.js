export default {
    install(app) {
        // 空判定
        app.config.globalProperties.isEmpty = function (value) {
            return value === undefined || value === null;
        };

        // 数値をフォーマット
        app.config.globalProperties.formatNumber = function (value) {
            const format = (num, unit) => {
                const formattedNum = (value / num).toFixed(1);
                return formattedNum.endsWith(".0") // 小数点以下が0の場合は小数点以下を削除
                    ? formattedNum.slice(0, -2) + unit
                    : formattedNum + unit;
            };

            if (value >= 1e12) {
                return format(1e12, "t"); // 1兆以上
            } else if (value >= 1e9) {
                return format(1e9, "b"); // 1億以上
            } else if (value >= 1e6) {
                return format(1e6, "m"); // 1百万以上
            } else if (value >= 1e3) {
                return format(1e3, "k"); // 1千以上
            } else {
                return value;
            }
        };
    },
};

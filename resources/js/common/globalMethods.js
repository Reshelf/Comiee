export default {
    install(app) {
        // 空判定
        app.config.globalProperties.isEmpty = function (value) {
            return value === undefined || value === null;
        };
    },
};

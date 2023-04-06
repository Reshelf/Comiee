const { defineConfig } = require("cypress");

module.exports = defineConfig({
    projectId: "otmpfq",

    e2e: {
        baseUrl: "http://localhost",
        setupNodeEvents(on, config) {
            // implement node event listeners here
        },
    },

    component: {
        devServer: {
            framework: "vue",
            bundler: "vite",
        },
    },
});

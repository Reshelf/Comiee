// app.spec.js

describe("App Blade Test", () => {
    beforeEach(() => {
        // テスト対象のページにアクセスする
        cy.visit("/");
    });

    it("loads the app", () => {
        cy.get("#app").should("be.visible");
    });

    // 他のテストケースをここに追加
});

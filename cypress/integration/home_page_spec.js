describe("Home Page", () => {
    it("successfully loads", () => {
        cy.visit("/"); // ホームページを訪れる
    });

    it("displays the correct title", () => {
        cy.visit("/");
        cy.title().should("eq", "Your Desired Title"); // タイトルが正しいか確認
    });

    // 他のテストケースを追加...
});

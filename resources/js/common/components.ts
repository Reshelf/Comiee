import { defineAsyncComponent } from "vue";

const components = {
    /*
    |--------------------------------------------------------------------------
    | atoms
    |--------------------------------------------------------------------------
    |
    |
    */
    BookTagsInput: "@/components/atoms/BookTagsInput.vue",
    CountAnimation: "@/components/atoms/CountAnimation.vue",
    FooterContents: "@/components/atoms/FooterContents.vue",
    ThemeToggle: "@/components/ThemeToggle.vue",

    /*
    |--------------------------------------------------------------------------
    | molecules
    |--------------------------------------------------------------------------
    |
    |
    */
    // analytics
    PageViewsGraph: "@/components/analytics/atoms/PageViewsGraph.vue",

    // books
    BookLike: "@/components/molecules/books/BookLike.vue",
    BooksLists: "@/components/molecules/books/BooksLists.vue",
    BookEditModal: "@/components/molecules/books/BookEditModal.vue",
    CreateModal: "@/components/molecules/books/CreateModal.vue",
    DeleteModal: "@/components/molecules/books/DeleteModal.vue",
    EditModal: "@/components/molecules/books/EditModal.vue",

    // books/episodes
    EpisodeList: "@/components/molecules/books/episodes/EpisodeList.vue",
    EpisodeScreen: "@/components/molecules/books/episodes/EpisodeScreen.vue",
    EpisodeLike: "@/components/molecules/books/episodes/EpisodeLike.vue",

    // book/episodes/comments
    CommentPostModal:
        "@/components/molecules/books/episodes/comments/CommentPostModal.vue",
    CommentLike:
        "@/components/molecules/books/episodes/comments/CommentLike.vue",

    // users
    FollowButton: "@/components/molecules/users/FollowButton.vue",
    HeaderUserModal: "@/components/molecules/users/HeaderUserModal.vue",
    AvatarZoom: "@/components/molecules/users/AvatarZoom.vue",
    EditUserModal: "@/components/molecules/users/EditUserModal.vue",
    FollowModal: "@/components/molecules/users/FollowModal.vue",
    SetupModal: "@/components/molecules/users/SetupModal.vue",
    ShelfLists: "@/components/molecules/users/ShelfLists.vue",
    ThumbnailZoom: "@/components/molecules/users/ThumbnailZoom.vue",
    WorksLists: "@/components/molecules/users/WorksLists.vue",

    // search
    SearchForm: "@/components/molecules/search/SearchForm.vue",
    SpSearchForm: "@/components/molecules/search/SpSearchForm.vue",
    TagSearchModal: "@/components/molecules/search/TagSearchModal.vue",

    /*
    |--------------------------------------------------------------------------
    | organisms
    |--------------------------------------------------------------------------
    |
    |
    */

    /*
    |--------------------------------------------------------------------------
    | templates
    |--------------------------------------------------------------------------
    |
    |
    */

    /*
    |--------------------------------------------------------------------------
    | pages
    |--------------------------------------------------------------------------
    |
    |
    */
    ReleaseNote: "@/components/pages/ReleaseNote.vue",
    SctContents: "@/components/pages/SctContents.vue",
    AboutComiee: "@/components/pages/AboutComiee.vue",
    TermsOfService: "@/components/pages/TermsOfService.vue",
    CompanyContents: "@/components/pages/CompanyContents.vue",
    PrivacyPolicy: "@/components/pages/PrivacyPolicy.vue",

    // analytics
    AnalyticsDashboard: "@/components/pages/analytics/AnalyticsDashboard.vue",

    // analytics/page
    TopDashboard: "@/components/pages/analytics/page/TopDashboard.vue",
    CommentsDashboard:
        "@/components/pages/analytics/page/CommentsDashboard.vue",
    ContentsDashboard:
        "@/components/pages/analytics/page/ContentsDashboard.vue",
    RankingDashboard: "@/components/pages/analytics/page/RankingDashboard.vue",
    UserDashboard: "@/components/pages/analytics/page/UserDashboard.vue",
    TrendDashboard: "@/components/pages/analytics/page/TrendDashboard.vue",
    SalesDashboard: "@/components/pages/analytics/page/SalesDashboard.vue",

    // analytics/atoms
    GetUserInfo: "@/components/pages/analytics/atoms/GetUserInfo.vue",
    BounceRateTracker:
        "@/components/pages/analytics/atoms/BounceRateTracker.vue",
};

const asyncComponents = Object.fromEntries(
    Object.entries(components).map(([key, value]) => [
        key,
        defineAsyncComponent(() => import(value)),
    ])
);

export default asyncComponents;

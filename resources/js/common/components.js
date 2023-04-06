import { defineAsyncComponent } from "vue";
import CreateModal from "../components/books/CreateModal.vue";
import CommentPostModal from "../components/books/episodes/comments/CommentPostModal.vue";

const HeaderUserModal = defineAsyncComponent(() =>
    import("../components/HeaderUserModal.vue")
);
const FollowModal = defineAsyncComponent(() =>
    import("../components/users/FollowModal.vue")
);
const SetupModal = defineAsyncComponent(() =>
    import("../components/users/SetupModal.vue")
);
const TagSearchModal = defineAsyncComponent(() =>
    import("../components/search/TagSearchModal.vue")
);
const BookLike = defineAsyncComponent(() =>
    import("../components/books/BookLike.vue")
);
const BooksLists = defineAsyncComponent(() =>
    import("../components/books/BooksLists.vue")
);
const PageViewsGraph = defineAsyncComponent(() =>
    import("../components/analytics/book/PageViewsGraph.vue")
);
const BookEditModal = defineAsyncComponent(() =>
    import("../components/books/BookEditModal.vue")
);

const DeleteModal = defineAsyncComponent(() =>
    import("../components/books/DeleteModal.vue")
);
const EditModal = defineAsyncComponent(() =>
    import("../components/books/EditModal.vue")
);
const EpisodeList = defineAsyncComponent(() =>
    import("../components/books/episodes/EpisodeList.vue")
);
const EpisodeScreen = defineAsyncComponent(() =>
    import("../components/books/episodes/EpisodeScreen.vue")
);
const BookTagsInput = defineAsyncComponent(() =>
    import("../components/BookTagsInput.vue")
);
const CountAnimation = defineAsyncComponent(() =>
    import("../components/CountAnimation.vue")
);
const FollowButton = defineAsyncComponent(() =>
    import("../components/FollowButton.vue")
);
const SearchForm = defineAsyncComponent(() =>
    import("../components/search/SearchForm.vue")
);
const SpSearchForm = defineAsyncComponent(() =>
    import("../components/search/SpSearchForm.vue")
);
const ThemeToggle = defineAsyncComponent(() =>
    import("../components/ThemeToggle.vue")
);
const AvatarZoom = defineAsyncComponent(() =>
    import("../components/users/AvatarZoom.vue")
);
const EditUserModal = defineAsyncComponent(() =>
    import("../components/users/EditUserModal.vue")
);
const ShelfLists = defineAsyncComponent(() =>
    import("../components/users/ShelfLists.vue")
);
const ThumbnailZoom = defineAsyncComponent(() =>
    import("../components/users/ThumbnailZoom.vue")
);
const WorksLists = defineAsyncComponent(() =>
    import("../components/users/WorksLists.vue")
);
const CommentLike = defineAsyncComponent(() =>
    import("../components/books/episodes/comments/CommentLike.vue")
);
const EpisodeLike = defineAsyncComponent(() =>
    import("../components/books/episodes/EpisodeLike.vue")
);
const ReleaseNote = defineAsyncComponent(() =>
    import("../components/ReleaseNote.vue")
);
const GetUserInfo = defineAsyncComponent(() =>
    import("../components/analytics/atoms/GetUserInfo.vue")
);
const AnalyticsDashboard = defineAsyncComponent(() =>
    import("../components/analytics/AnalyticsDashboard.vue")
);
const CommentsDashboard = defineAsyncComponent(() =>
    import("../components/analytics/CommentsDashboard.vue")
);
const ContentsDashboard = defineAsyncComponent(() =>
    import("../components/analytics/ContentsDashboard.vue")
);
const RankingDashboard = defineAsyncComponent(() =>
    import("../components/analytics/RankingDashboard.vue")
);
const UserDashboard = defineAsyncComponent(() =>
    import("../components/analytics/UserDashboard.vue")
);
const TrendDashboard = defineAsyncComponent(() =>
    import("../components/analytics/TrendDashboard.vue")
);
const SalesDashboard = defineAsyncComponent(() =>
    import("../components/analytics/SalesDashboard.vue")
);

export default {
    SalesDashboard,
    TrendDashboard,
    UserDashboard,
    RankingDashboard,
    ContentsDashboard,
    BooksLists,
    CommentsDashboard,
    AnalyticsDashboard,
    PageViewsGraph,
    GetUserInfo,
    SpSearchForm,
    EpisodeLike,
    ShelfLists,
    WorksLists,
    SetupModal,
    CommentLike,
    TagSearchModal,
    ReleaseNote,
    SearchForm,
    BookEditModal,
    CommentPostModal,
    EpisodeScreen,
    EpisodeList,
    ThumbnailZoom,
    FollowModal,
    AvatarZoom,
    DeleteModal,
    CreateModal,
    CountAnimation,
    HeaderUserModal,
    ThemeToggle,
    EditModal,
    EditUserModal,
    BookLike,
    BookTagsInput,
    FollowButton,
};

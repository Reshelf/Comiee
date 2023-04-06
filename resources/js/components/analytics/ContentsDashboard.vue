<template>
    <div>コンテンツ</div>
    <page-views-graph :page-views="pageViews"></page-views-graph>
</template>
<script>
import PageViewsGraph from "@/components/analytics/book/PageViewsGraph.vue";
export default {
    components: {
        PageViewsGraph,
    },
    props: {
        pageViews: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {};
    },
};
</script>
<style lang="scss" scoped></style>

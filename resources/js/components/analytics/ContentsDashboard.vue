<template>
    <div>コンテンツ</div>
    <p>作品、エピソード</p>
    ページビュー <br />
    ユニークユーザー数 <br />
    平均滞在時間 <br />
    いいね率 <br />
    コメント率 <br />
    シェア率 <br />
    購入率 <br />
    購入金額 <br />
    購入数 <br />
    購入ユーザー数 <br />
    購入ユニークユーザー数 <br />
    離脱数 <br />
    離脱ユーザー数 <br />
    離脱ユニークユーザー数 <br />
    提案する追加分析項目: <br />

    収益 (広告やアフィリエイトなど、作品から得られる収益) <br />
    作品閲覧デバイス (モバイル、デスクトップ、タブレットの比率) <br />
    地理的分布 (国や地域別の閲覧者数) <br />
    新規ユーザーとリピートユーザーの比率 <br />
    ユーザーセグメント別の分析 (年齢層、性別、興味・関心など) <br />
    ページ単位の分析 (特定のページや章が特に人気があるかどうか) <br />
    ソーシャルメディアの言及数・感情分析
    (作品に関する言及の数とそのポジティブ・ネガティブな評価) <br />
    ユーザーアンケートやフィードバック (読者の意見や感想) <br />
    作品の完了率 (作品を最後まで読んだユーザーの割合) <br />
    関連作品のクロスセル率 (他の作品へのクリックや購入) <br />
    ページごとのスクロール深度 (各ページでどれだけスクロールされているか)
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

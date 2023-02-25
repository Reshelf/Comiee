<template>
    <div class="w-full">
        <ul class="lang-lists">
            <li
                v-for="(bookLang, index) in bookLangs"
                :key="index"
                :class="{
                    'active bg-primary hover:bg-primary hover:bg-opacity-100 dark:border-primary':
                        bookLang === selectedLang,
                }"
                class="cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                @click="selectLang(bookLang)"
            >
                <template v-if="bookLang === 'ja'"> 日本語 </template>
                <template v-else-if="bookLang === 'en'"> 英語 </template>
                <template v-else-if="bookLang === 'tw'"> 繁体字 </template>
                <template v-else-if="bookLang === 'cn'"> 簡体字 </template>
                <template v-else-if="bookLang === 'es'"> スペイン語 </template>
                <template v-else-if="bookLang === 'fr'"> フランス語 </template>
                <template v-else-if="bookLang === 'it'"> イタリア語 </template>
                <template v-else-if="bookLang === 'id'">
                    インドネシア語
                </template>
                <template v-else-if="bookLang === 'th'"> タイ語 </template>
                <template v-else-if="bookLang === 'ko'"> 韓国語 </template>
                <template v-else-if="bookLang === 'de'"> ドイツ語 </template>
                <template v-else-if="bookLang === 'ar'"> アラビア語 </template>
                <template v-else-if="bookLang === 'hi'">
                    ヒンディー語
                </template>
                <template v-else-if="bookLang === 'pt'">
                    ポルトガル語
                </template>
                <template v-else-if="bookLang === 'bn'"> ベンガル語 </template>
            </li>
        </ul>
        <div class="flex flex-wrap">
            <template v-for="(book, index) in books" :key="index">
                <div v-if="book.lang == selectedLang" class="list-item">
                    <a :href="`/${lang}/books/${book.id}`">
                        <template v-if="book.thumbnail">
                            <img
                                :src="book.thumbnail"
                                alt="thumbnail"
                                class="w-full md:w-[200px] h-[200px] object-cover"
                            />
                        </template>
                        <template v-else>
                            <img
                                src="{{ asset('/img/noimage.svg') }}"
                                alt=""
                                class="block dark:hidden min-h-[200px] max-h-[200px] w-full md:min-w-[200px] md:max-w-[200px] object-cover"
                            />
                            <img
                                src="{{ asset('/img/noimage-dark.svg') }}"
                                alt="thumbnail"
                                class="hidden dark:block h-[200px] w-full md:w-[200px] object-cover"
                            />
                        </template>
                        <span class="thumbnail-title">{{ book.title }}</span>
                    </a>
                </div>
            </template>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        books: {
            type: Array,
            default: [],
        },
        lang: {
            type: String,
            default: "",
        },
    },
    data() {
        return {
            langLists: [
                "ja",
                "en",
                "tw",
                "cn",
                "es",
                "fr",
                "it",
                "id",
                "th",
                "ko",
                "de",
                "hi",
                "ar",
                "pt",
                "bn",
            ],
            selectedLang: this.lang,
            bookLangs: [],
        };
    },
    mounted() {
        let lists = [];
        this.books.forEach((book) => {
            lists.push(book.lang);
        });
        this.bookLangs = new Set(lists);
    },
    methods: {
        selectLang(langList) {
            this.selectedLang = langList;
        },
    },
};
</script>
<style lang="scss" scoped>
.lang-lists {
    @apply inline-flex flex-row-reverse items-center mb-4;
}
.active {
    color: white !important;
}
</style>

<template>
    <div>
        <h2 class="text-2xl lg:text-3xl dark:text-f5 font-bold my-8 lg:mb-10">
            {{ t("リリースノート") }}
        </h2>

        <template v-for="(note, index) in displayedNotes" :key="index">
            <div
                class="p-6 lg:p-8 border border-b-l-c dark:border-dark-1 rounded-lg mb-6"
            >
                <h3 class="text-xl lg:text-2xl mb-4 dark:text-f5">
                    【{{ note.version }}】{{ t(note.title) }}
                </h3>
                <div class="mt-4 text-[15px]">
                    <p class="whitespace-pre-line">{{ t(note.content) }}</p>
                    <p>{{ note.date }}</p>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
import notesData from "@/util/notes.json";

export default {
    data() {
        return {
            notes: notesData,
            displayedNotes: [],
            itemsPerLoad: 5,
            currentIndex: 0,
        };
    },
    mounted() {
        this.loadMore();
        window.addEventListener("scroll", this.handleScroll);
    },
    beforeUnmount() {
        window.removeEventListener("scroll", this.handleScroll);
    },
    methods: {
        loadMore() {
            this.currentIndex += this.itemsPerLoad;
            this.displayedNotes = this.notes.slice(0, this.currentIndex);
        },
        handleScroll() {
            const scrollTop =
                document.documentElement.scrollTop || document.body.scrollTop;
            const windowHeight = window.innerHeight;
            const scrollHeight =
                document.documentElement.scrollHeight ||
                document.body.scrollHeight;

            if (scrollHeight - (scrollTop + windowHeight) < 20) {
                this.loadMore();
            }
        },
    },
};
</script>

<template>
    <div>
        <h2 class="text-2xl lg:text-3xl dark:text-f5 my-8 lg:mb-10">
            {{ t("リリースノート") }}
        </h2>

        <template v-for="note in displayedNotes" :key="note.version">
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
<script lang="ts" setup>
import { notesData, Note } from "@/util/notes";
import { onBeforeUnmount, onMounted, ref } from "vue";

const notes = ref(notesData);
const displayedNotes = ref<Note[]>([]);
const itemsPerLoad = 5;
const currentIndex = ref(0);

onMounted(() => {
    loadMore();
    window.addEventListener("scroll", handleScroll);
});

onBeforeUnmount(() => {
    window.removeEventListener("scroll", handleScroll);
});

function loadMore() {
    currentIndex.value += itemsPerLoad;
    displayedNotes.value = notes.value.slice(0, currentIndex.value);
}

function handleScroll() {
    const scrollTop =
        document.documentElement.scrollTop || document.body.scrollTop;
    const windowHeight = window.innerHeight;
    const scrollHeight =
        document.documentElement.scrollHeight || document.body.scrollHeight;

    if (scrollHeight - (scrollTop + windowHeight) < 20) {
        loadMore();
    }
}
</script>

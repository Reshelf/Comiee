<template>
    <div>
        <h2 class="text-2xl lg:text-3xl dark:text-f5 font-bold my-8 lg:mb-10">
            {{ t("リリースノート") }}
        </h2>

        <template v-for="(note, index) in notes" :key="index">
            <div
                class="p-6 lg:p-8 border border-b-l-c dark:border-dark-1 rounded-lg mb-6"
            >
                <h3 class="text-xl lg:text-2xl mb-4 dark:text-f5">
                    【{{ note.version }}】{{ note.title }}
                </h3>
                <div class="mt-4 text-[15px]">
                    <p class="whitespace-pre-line">
                        {{ note.content }}
                    </p>
                    <p>
                        {{ note.date }}
                    </p>
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
        };
    },
};
</script>

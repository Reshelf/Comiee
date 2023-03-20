<template>
    <div>
        <input type="hidden" name="tags" :value="tagsJson" />
        <vue-tags-input
            v-model="tag"
            :tags="tags"
            :placeholder="t('タグを10個まで入力できます')"
            :add-on-key="[13, 32]"
            :autocomplete-items="filteredItems"
            @tags-changed="(newTags) => (tags = newTags)"
        />
    </div>
</template>
<script>
import VueTagsInput from "@sipec/vue3-tags-input";

export default {
    components: {
        VueTagsInput,
    },
    props: {
        initialTags: {
            type: Array,
            // eslint-disable-next-line
            default: [],
        },
        autocompleteItems: {
            type: Array,
            // eslint-disable-next-line
            default: [],
        },
    },
    data() {
        return {
            tag: "",
            tags: this.initialTags,
        };
    },
    computed: {
        filteredItems() {
            return this.autocompleteItems.filter((i) => {
                return (
                    i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1
                );
            });
        },
        tagsJson() {
            return JSON.stringify(this.tags);
        },
    },
};
</script>

<script setup>
import { computed, reactive, ref } from "vue";

const open = ref(false);
const state = reactive({
    search: null,
    array: [
        { id: 1, title: "Thanos", content: "123" },
        { id: 2, title: "Deadpool", content: "456" },
        { id: 3, title: "Batman", content: "789" },
    ],
});

const filter = computed(() => {
    if (state.search) {
        return state.array.filter((item) => {
            return state.search
                .toLowerCase()
                .split(" ")
                .every((v) => item.title.toLowerCase().includes(v));
        });
    } else {
        return state.array;
    }
});

const getData = async () => {
    let result = await axios.get(url);
    data.mydata = result.data;
};
// onMounted(() => {
//     getData();
// });
// onMounted(() => {
//     console.log("Component is mounted!");
// });
</script>
<template>
    <div class="header-search-input relative flex items-center mx-auto">
        <input
            type="text"
            v-model="state.search"
            @focus="open = true"
            @blur="open = false"
            placeholder="検索"
            class="py-2 px-4 border border-ddd dark:bg-dark-1 dark:border-dark"
        />
        <button class="absolute right-2">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                <path
                    d="M11 20C15.9706 20 20 15.9706 20 11C20 6.02944 15.9706 2 11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20Z"
                    stroke="#AAAAAA"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                <path
                    d="M18.9299 20.6898C19.4599 22.2898 20.6699 22.4498 21.5999 21.0498C22.4499 19.7698 21.8899 18.7198 20.3499 18.7198C19.2099 18.7098 18.5699 19.5998 18.9299 20.6898Z"
                    stroke="#AAAAAA"
                    stroke-width="1.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </button>
        <div
            v-if="open && state.search.length > 0"
            class="absolute top-[30px] bg-white shadow-lg z-[999] rounded-[3px] p-2"
        >
            <div
                v-for="item in filter"
                :key="item"
                class="flex items-center p-4 cursor-pointer hover:bg-[#e8e8e8] rounded"
            >
                <div class="">{{ item.id }}}</div>
                <div class="">{{ item.title }}}</div>
                <div class="">{{ item.content }}}</div>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped></style>

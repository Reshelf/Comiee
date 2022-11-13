<script setup>
import { computed, onMounted, reactive, ref } from "vue";

const open = ref(false);
const state = reactive({
  search: "",
  array: [],
});

const filter = computed(() => {
  if (state.search) {
    return Object.values(state.array).filter((item) => {
      // 検索ワード
      let word = item.title.concat(item.name);

      return state.search
        .toLowerCase()
        .split(" ")
        .every((v) => word.toLowerCase().includes(v));
    });
  } else {
    return state.array;
  }
});

const getData = async () => {
  /* eslint-disable */
  let result = await axios.get("/api/search-words");
  state.array = result.data;
};
onMounted(() => {
  getData();
});

function locate(item) {
  location.href = "/books/" + item.id;
}
function reset() {
  state.search = "";
}
</script>
<template>
  <div class="header-search-input relative flex items-center mx-auto">
    <input
      ref="anyName"
      v-model="state.search"
      type="text"
      placeholder="検索"
      class="py-2 px-4 border border-ccc dark:bg-dark-1 dark:border-dark"
      @focus="open = true"
    />
    <button class="absolute right-2">
      <template v-if="open && state.search.length > 1">
        <svg
          width="18"
          height="18"
          viewBox="0 0 24 24"
          fill="none"
          @click="reset()"
        >
          <path
            d="M5.00098 5L19 18.9991"
            stroke="#aaa"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M4.99996 18.9991L18.999 5"
            stroke="#aaa"
            stroke-width="1.5"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </template>
    </button>
    <div
      v-if="open && state.search.length > 1"
      class="absolute dark:bg-dark top-[30px] bg-white shadow-lg z-[999] overflow-y-auto max-h-[500px] scroll-none rounded-[3px] p-2"
    >
      <a
        v-for="item in filter"
        :key="item"
        class="flex items-center p-4 cursor-pointer dark:hover:bg-dark-1 hover:bg-[#f5f5f5] rounded"
        @click="locate(item)"
      >
        <div class="flex items-center">
          <img
            v-if="item.thumbnail"
            :src="'/img/book/thumbnail/' + item.thumbnail"
            class="w-[80px] h-[80px] object-cover"
          />
          <img
            v-else
            src="/img/bg.svg"
            class="dark:fill-dark w-[70px] h-[70px] object-cover"
          />
          <div class="ml-4 w-[200px]">
            <div class="text-xl font-semibold">
              {{ item.title }}
            </div>
            <div class="text-666">{{ item.name }}</div>
          </div>
        </div>
      </a>
    </div>
  </div>
</template>

<script setup>
import { onMounted, reactive, ref } from "vue";

const open = ref(false);
const state = reactive({
  search: null,
  array: [],
});

const getData = async () => {
  /* eslint-disable */
  let result = await axios.get("/api/search-tags");
  state.array = result.data;
};
onMounted(() => {
  getData();
});
</script>
<template>
  <div @click.self="open = false">
    <div class="trigger" @click="open = true">
      <slot name="trigger"></slot>
    </div>
    <transition name="modal" appear>
      <div v-show="open" class="overlay" @click.self="open = false">
        <div class="window">
          <div class="header">
            <button class="close" @click="open = false">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="#333">
                <path
                  d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"
                ></path>
              </svg>
            </button>
            <div class="title"><slot name="trigger"></slot></div>
          </div>
          <div class="p-8 flex flex-wrap items-center">
            <a
              class="box my-4 ml-auto mr-4 text-[#901DF5] border-[#901DF5] hover:bg-[#901DF5] hover:bg-opacity-10"
            >
              少年・青年
            </a>
            <a
              class="box m-4 text-[#19A3FE] border-[#19A3FE] hover:bg-[#19A3FE] hover:bg-opacity-10"
            >
              少女・女性
            </a>
            <a
              class="box my-4 mr-auto ml-4 text-[#00AB8E] border-[#00AB8E] hover:bg-[#00AB8E] hover:bg-opacity-10"
            >
              TL
            </a>
            <a
              class="box my-4 ml-auto mr-4 text-[#F1C521] border-[#F1C521] hover:bg-[#F1C521] hover:bg-opacity-10"
            >
              BL
            </a>
            <a
              class="box m-4 text-[#FF0F77] border-[#FF0F77] hover:bg-[#FF0F77] hover:bg-opacity-10"
            >
              オトナ
            </a>
            <a class="box my-4 mr-auto ml-4 border-none"></a>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>
<style lang="scss" scoped>
.trigger {
  @apply cursor-pointer hover:text-primary;
}
.title {
  @apply text-[#5A5777] dark:text-ddd;
  animation: slide-in 0.3s;
}
.box {
  @apply cursor-pointer inline-flex items-center justify-center whitespace-nowrap p-6 font-semibold border-2 w-[140px] h-[80px];
}
@keyframes bounce-in {
  // 0% {
  //   transform: scale(0);
  // }
  // 50% {
  //   transform: scale(1.1);
  // }
  // 100% {
  //   transform: scale(1);
  // }
  0% {
    transform: translateY(30px);
    opacity: 0;
  }
  100% {
    transform: translateY(0px);
    opacity: 1;
  }
}
@keyframes slide-in {
  0% {
    transform: translateX(-30px);
    opacity: 0;
  }
  100% {
    transform: translateX(0px);
    opacity: 1;
  }
}
</style>

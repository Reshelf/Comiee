<script>
export default {
  data() {
    return {
      isActive: 1,
    };
  },
  methods: {
    isSelect(num) {
      this.isActive = num;
    },
  },
};
</script>
<template>
  <div class="tab">
    <ul class="tabMenu scroll-none">
      <li :class="{ active: isActive === 1 }" @click="isSelect(1)">
        メール通知
      </li>
      <li :class="{ active: isActive === 2 }" @click="isSelect(2)">購入履歴</li>
      <li :class="{ active: isActive === 3 }" @click="isSelect(3)">
        表示しない作品
      </li>
      <li :class="{ active: isActive === 4 }" @click="isSelect(4)">
        サイトの外観
      </li>
    </ul>
    <div class="tabContents">
      <div v-if="isActive === 1">
        <slot name="1"></slot>
      </div>
      <div v-else-if="isActive === 2">
        <slot name="2"></slot>
      </div>
      <div v-else-if="isActive === 3">
        <slot name="3"></slot>
      </div>
      <div v-else-if="isActive === 4">
        <slot name="4"></slot>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
.tab {
  @apply w-full flex flex-col md:flex-row;
  .tabMenu {
    @apply flex md:flex-col bg-white dark:bg-dark md:border-r-2 md:border-eee dark:border-dark-1 overflow-x-auto;
    li {
      @apply w-auto whitespace-nowrap text-xs md:text-[13px] cursor-pointer py-4 pr-8 md:pr-12 hover:text-primary;
      &.active {
        @apply font-semibold text-primary;
      }
    }
  }
  .tabContents {
    @apply w-full md:px-6 my-4 md:my-0;
  }
}
</style>

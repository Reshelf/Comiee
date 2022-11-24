<script>
export default {
  props: {
    isComment: {
      type: Boolean,
      default: false,
    },
    count: {
      type: Number,
      default: 0,
    },
  },
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
        エピソード
      </li>
      <li :class="{ active: isActive === 2 }" @click="isSelect(2)">作品情報</li>
      <li
        v-if="isComment"
        :class="{ active: isActive === 3 }"
        @click="isSelect(3)"
      >
        コメント <span class="font-semibold">{{ count }}</span> 件
      </li>
    </ul>
    <div class="tabContents">
      <div v-if="isActive === 1">
        <slot name="episode"></slot>
      </div>
      <div v-else-if="isActive === 2">
        <slot name="info"></slot>
      </div>
      <div v-else-if="isActive === 3">
        <slot name="comment"></slot>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
.tab {
  @apply w-full;
  .tabMenu {
    @apply flex bg-white dark:bg-dark overflow-x-auto;
    li {
      @apply w-auto cursor-pointer py-2 px-4 hover:text-primary;
      &.active {
        @apply font-semibold text-primary border-b-2 border-primary;
      }
    }
  }
  .tabContents {
    @apply w-full py-6 lg:p-6;
  }
}
</style>

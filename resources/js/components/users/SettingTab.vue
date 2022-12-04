<template>
  <div class="tab">
    <ul class="tabMenu scroll-none">
      <li :class="{ active: isActive === 1 }" @click="isSelect(1)">
        {{ one }}
      </li>
      <li :class="{ active: isActive === 2 }" @click="isSelect(2)">
        {{ two }}
      </li>
      <li :class="{ active: isActive === 3 }" @click="isSelect(3)">
        {{ three }}
      </li>
      <li :class="{ active: isActive === 4 }" @click="isSelect(4)">
        {{ four }}
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
<script>
export default {
  props: {
    one: {
      type: String,
      default: "",
    },
    two: {
      type: String,
      default: "",
    },
    three: {
      type: String,
      default: "",
    },
    four: {
      type: String,
      default: "",
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
<style lang="scss" scoped>
.tab {
  @apply w-full flex flex-col md:flex-row;
  .tabMenu {
    @apply flex mb-4 md:flex-col bg-white dark:bg-dark md:border-r-2 md:border-eee dark:border-dark-1 overflow-x-auto;
    li {
      @apply w-auto whitespace-nowrap text-[13px] cursor-pointer md:py-3 pr-6 md:pr-12 hover:text-primary dark:hover:text-light;
      &.active {
        @apply font-semibold text-primary dark:text-ddd;
      }
    }
  }
  .tabContents {
    @apply w-full md:px-6 md:my-0;
  }
}
</style>

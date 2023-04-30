<template>
  <div class="comment-like" @click="clickLike">
    <svg
      :class="{ clicked: isLikedBy }"
      height="16px"
      class="stroke-red"
      viewBox="0 0 22 20"
      fill="none"
    >
      <path
        d="M11.62 18.8101C11.28 18.9301 10.72 18.9301 10.38 18.8101C7.48 17.8201 1 13.6901 1 6.6901C1 3.6001 3.49 1.1001 6.56 1.1001C8.38 1.1001 9.99 1.9801 11 3.3401C12.01 1.9801 13.63 1.1001 15.44 1.1001C18.51 1.1001 21 3.6001 21 6.6901C21 13.6901 14.52 17.8201 11.62 18.8101Z"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
    <span class="ml-2">{{ countLikes }}</span>
  </div>
</template>
<script>
import axios from "axios";
export default {
  props: {
    initialIsLikedBy: {
      type: Boolean,
      default: false,
    },
    initialCountLikes: {
      type: Number,
      default: 0,
    },
    authorized: {
      type: Boolean,
      default: false,
    },
    endpoint: {
      type: String,
      default: "",
    },
    big: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      isLikedBy: this.initialIsLikedBy,
      countLikes: this.initialCountLikes,
      gotToLike: false,
    };
  },
  methods: {
    clickLike() {
      if (!this.authorized) {
        alert("いいね機能はログイン中のみ使用できます");
        return;
      }

      this.isLikedBy ? this.unlike() : this.like();
    },
    async like() {
      // eslint-disable-next-line
      const response = await axios.put(this.endpoint);

      this.isLikedBy = true;
      this.countLikes = response.data.countLikes;
      this.gotToLike = true;
    },
    async unlike() {
      // eslint-disable-next-line
      const response = await axios.delete(this.endpoint);

      this.isLikedBy = false;
      this.countLikes = response.data.countLikes;
      this.gotToLike = false;
    },
  },
};
</script>
<style lang="scss" scoped>
.comment-like {
  @apply flex items-center cursor-pointer;
}

.clicked {
  @apply fill-red w-[18px] h-[18px];
}
</style>

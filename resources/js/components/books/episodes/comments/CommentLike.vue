<template>
  <div class="comment-like" @click="clickLike">
    <svg
      :class="[{ clicked: isLikedBy }, iconClass]"
      class="w-[24px] h-[24px] mr-2 stroke-aaa"
      viewBox="0 0 24 24"
      fill="none"
    >
      <path
        d="M7.47998 18.35L10.58 20.75C10.98 21.15 11.88 21.35 12.48 21.35H16.28C17.48 21.35 18.78 20.45 19.08 19.25L21.48 11.95C21.98 10.55 21.08 9.34997 19.58 9.34997H15.58C14.98 9.34997 14.48 8.84997 14.58 8.14997L15.08 4.94997C15.28 4.04997 14.68 3.04997 13.78 2.74997C12.98 2.44997 11.98 2.84997 11.58 3.44997L7.47998 9.54997"
        stroke-width="1.5"
        stroke-miterlimit="10"
      />
      <path
        d="M2.37988 18.3499V8.5499C2.37988 7.1499 2.97988 6.6499 4.37988 6.6499H5.37988C6.77988 6.6499 7.37988 7.1499 7.37988 8.5499V18.3499C7.37988 19.7499 6.77988 20.2499 5.37988 20.2499H4.37988C2.97988 20.2499 2.37988 19.7499 2.37988 18.3499Z"
        stroke-width="1.5"
        stroke-linecap="round"
        stroke-linejoin="round"
      />
    </svg>
    <count-animation
      :value="countLikes"
      :is-liked-by="isLikedBy"
    ></count-animation>
  </div>
</template>
<script>
import CountAnimation from "../../../CountAnimation.vue";
export default {
  components: { CountAnimation },
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
  computed: {
    iconClass() {
      return this.big ? "h-10 w-10" : "h-6 w-6";
    },
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
  @apply fill-yellow;
  svg {
    box-shadow: 0 3px 12px 0 rgba(#ffbd64, 0.4);
  }
}
</style>

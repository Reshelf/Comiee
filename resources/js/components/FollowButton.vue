<template>
  <div>
    <button
      :class="buttonColor"
      class="px-4 md:px-6 text-xs"
      @click="clickFollow"
    >
      {{ buttonText }}
    </button>
  </div>
</template>
<script>
export default {
  props: {
    initialIsFollowedBy: {
      type: Boolean,
      default: false,
    },
    authorized: {
      type: Boolean,
      default: false,
    },
    endpoint: {
      type: String,
      default: "",
    },
  },
  data() {
    return {
      isFollowedBy: this.initialIsFollowedBy,
    };
  },
  computed: {
    buttonColor() {
      return this.isFollowedBy ? "btn-border" : "btn-primary";
    },
    buttonText() {
      return this.isFollowedBy ? "フォロー中" : "フォローする";
    },
  },
  methods: {
    clickFollow() {
      if (!this.authorized) {
        alert("フォロー機能はログイン中のみ使用できます");
        return;
      }

      this.isFollowedBy ? this.unfollow() : this.follow();
    },
    async follow() {
      // eslint-disable-next-line
      const response = await axios.put(this.endpoint);

      this.isFollowedBy = true;
    },
    async unfollow() {
      // eslint-disable-next-line
      const response = await axios.delete(this.endpoint);

      this.isFollowedBy = false;
    },
  },
};
</script>

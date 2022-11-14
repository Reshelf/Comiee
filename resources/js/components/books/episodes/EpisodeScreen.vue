<template>
  <div class="relative flex flex-col">
    <!-- 1段目 -->
    <div class="screen scroll-none" :class="isFullScreen">
      <div v-for="i in setImages" :key="i" class="images">
        <img
          :class="isFullScreen"
          class="image image-right"
          :src="`${i[0]}`"
          alt="image"
        />
        <img
          :class="isFullScreen"
          class="image image-left"
          :src="`${i[1]}`"
          alt="image"
        />
      </div>
      <slot name="contents"></slot>
      <button
        :class="isFullScreen"
        class="btn-next"
        @click="scroll_next"
        @keydown="scroll_next"
      >
        <svg width="60" height="60" viewBox="0 0 24 24" fill="none">
          <path
            d="M15 19.92L8.47997 13.4C7.70997 12.63 7.70997 11.37 8.47997 10.6L15 4.08002"
            stroke="#666"
            stroke-width="1.5"
            stroke-miterlimit="10"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </button>
      <button
        :class="isFullScreen"
        class="btn-prev"
        @click="scroll_prev"
        @keydown="scroll_prev"
      >
        <svg width="60" height="60" viewBox="0 0 24 24" fill="none">
          <path
            d="M8.91003 19.92L15.43 13.4C16.2 12.63 16.2 11.37 15.43 10.6L8.91003 4.08002"
            stroke="#666"
            stroke-width="1.5"
            stroke-miterlimit="10"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </button>

      <div id="bg" style="display: none">
        このページの画面操作はできません<br />
        ページをリロードしてください
      </div>
    </div>

    <!-- 2段目 -->
    <div class="hidden w-full bg-dark-1 px-4 py-2 lg:flex justify-between">
      <div class="text-eee"></div>
      <div class="flex text-ccc">
        <div
          v-if="!fullScreen"
          class="cursor-pointer flex items-center"
          @click="fullScreen = true"
        >
          <svg
            x="0px"
            y="0px"
            width="18px"
            height="18px"
            viewBox="-909 226 100 100"
            style="enable-background: new -909 226 100 100"
            xml:space="preserve"
          >
            <g>
              <path
                d="M-902.5,259.5L-902.5,259.5c1.4,0,2.5-1.1,2.5-2.5v-22h22c1.4,0,2.5-1.1,2.5-2.5l0,0c0-1.4-1.1-2.5-2.5-2.5h-24.5
		c-1.4,0-2.5,1.1-2.5,2.5V257C-905,258.4-903.9,259.5-902.5,259.5z"
                fill="#ccc"
              />
              <path
                d="M-818,317h-22c-1.4,0-2.5,1.1-2.5,2.5l0,0c0,1.4,1.1,2.5,2.5,2.5h24.5c1.4,0,2.5-1.1,2.5-2.5V295c0-1.4-1.1-2.5-2.5-2.5
		l0,0c-1.4,0-2.5,1.1-2.5,2.5V317z"
                fill="#ccc"
              />
              <path
                d="M-842.5,232.5L-842.5,232.5c0,1.4,1.1,2.5,2.5,2.5h22v22c0,1.4,1.1,2.5,2.5,2.5l0,0c1.4,0,2.5-1.1,2.5-2.5v-24.5
		c0-1.4-1.1-2.5-2.5-2.5H-840C-841.4,230-842.5,231.1-842.5,232.5z"
                fill="#ccc"
              />
              <path
                d="M-902.5,292.5L-902.5,292.5c-1.4,0-2.5,1.1-2.5,2.5v24.5c0,1.4,1.1,2.5,2.5,2.5h24.5c1.4,0,2.5-1.1,2.5-2.5l0,0
		c0-1.4-1.1-2.5-2.5-2.5h-22v-22C-900,293.6-901.1,292.5-902.5,292.5z"
                fill="#ccc"
              />
            </g>
          </svg>
          <span class="pl-2 text-xs">拡大</span>
        </div>
        <div
          v-if="fullScreen"
          class="cursor-pointer flex items-center"
          @keydown.esc="fullScreen = false"
          @click="fullScreen = false"
        >
          <svg
            x="0px"
            y="0px"
            width="20px"
            height="20px"
            viewBox="0 0 64 64"
            enable-background="new 0 0 64 64"
            xml:space="preserve"
          >
            <g>
              <polygon
                points="1.707,36.293 0.293,37.707 26.293,63.707 27.707,62.293 15.414,50 28,37.414 28,46 30,46 30,35 29,34 18,34 18,36
		26.586,36 14,48.586 	"
                fill="#ccc"
              />
              <polygon
                points="34,18 34,29 35,30 46,30 46,28 37.414,28 50,15.414 62.293,27.707 63.707,26.293 37.707,0.293 36.293,1.707
		48.586,14 36,26.586 36,18 	"
                fill="#ccc"
              />
            </g>
          </svg>
          <span class="pl-2 text-xs">通常</span>
        </div>
      </div>
      <div class="text-eee">SNSシェア</div>
    </div>

    <!-- SP -->
    <div class="lg:hidden w-full flex flex-col">
      <img
        v-for="image in images"
        :key="image"
        :class="isFullScreen"
        class="w-full"
        :src="`/img/book/${title}/${episodeNumber}/${image}`"
        alt="image"
      />
    </div>
  </div>
</template>
<script>
export default {
  props: {
    title: {
      type: String,
      default: "",
    },
    episodeNumber: {
      type: Number,
      default: 0,
    },
    contents: {
      type: String,
      default: "",
    },
  },
  data() {
    return {
      test: "",
      images: [],
      setImages: [],
      fullScreen: false,
    };
  },
  computed: {
    isFullScreen() {
      return this.fullScreen ? "max-h-[100vh]" : "max-h-[85vh]";
    },
    isNormalScreen() {
      return this.fullScreen ? "max-h-[85vh]" : "max-h-[100vh]";
    },
  },
  created() {
    // escでフルスクリーン解除メソッドを呼ぶ
    let that = this;
    document.addEventListener("keyup", function (evt) {
      if (evt.keyCode === 27) {
        that.clear_fullscreen();
      }
    });
  },
  mounted() {
    // json形式なので配列に変える
    this.images = JSON.parse(this.contents);

    const all = this.images;
    const window_width = window.innerWidth;
    const content = document.querySelector(".screen");

    // 2枚ずつに分け、スライド用の配列を作成
    const sliceByNumber = (all, number) => {
      const length = Math.ceil(all.length / number);
      return new Array(length)
        .fill()
        .map((_, i) => all.slice(i * number, (i + 1) * number));
    };
    this.setImages = sliceByNumber(all, 2);

    // キーボードキーでスライド移動
    document.onkeydown = function (e) {
      if (e.key === "ArrowRight") {
        content.scrollLeft += window_width;
      }
      if (e.key === "ArrowLeft") {
        content.scrollLeft -= window_width;
      }

      // スクショブロック
      // let bg = document.getElementById("bg").style;
      // if (
      //     e.metaKey ||
      //     e.key == "RightCommand" ||
      //     e.key == "LeftCommand" ||
      //     e.key == "F12"
      // ) {
      //     bg.display = "flex";
      // }
    };

    // window.oncontextmenu = function () {
    //     return false;
    // };
    // document.addEventListener(
    //     "keydown",
    //     function (event) {
    //         var key = event.key || event.keyCode;

    //         if (key == 123) {
    //             return false;
    //         } else if (
    //             (event.ctrlKey && event.shiftKey && key == 73) ||
    //             (event.ctrlKey && event.shiftKey && key == 74)
    //         ) {
    //             return false;
    //         }
    //     },
    //     false
    // );

    // document.addEventListener("keyup", function (e) {
    //     var keyCode = e.keyCode ? e.keyCode : e.which;
    //     if (keyCode == 44) {
    //         stopPrntScr();
    //     }
    // });
    // function stopPrntScr() {
    //     var inpFld = document.createElement("input");
    //     inpFld.setAttribute("value", ".");
    //     inpFld.setAttribute("width", "0");
    //     inpFld.style.height = "0px";
    //     inpFld.style.width = "0px";
    //     inpFld.style.border = "0px";
    //     document.body.appendChild(inpFld);
    //     inpFld.select();
    //     document.execCommand("copy");
    //     inpFld.remove(inpFld);
    // }
    // function AccessClipboardData() {
    //     try {
    //         window.clipboardData.setData("text", "Access   Restricted");
    //     } catch (err) {}
    // }
    // setInterval("AccessClipboardData()", 300);
  },
  methods: {
    scroll_next() {
      let window_width = window.innerWidth;
      let content = document.querySelector(".screen");
      content.scrollLeft -= window_width;
    },
    scroll_prev() {
      let window_width = window.innerWidth;
      let content = document.querySelector(".screen");
      content.scrollLeft += window_width;
    },
    // フルスクリーン解除
    clear_fullscreen() {
      this.fullScreen = false;
    },
  },
};
</script>
<style lang="scss" scoped>
.screen {
  @apply hidden lg:flex flex-row-reverse overflow-hidden duration-300;
  -webkit-overflow-scrolling: touch !important;
}
.images {
  @apply bg-dark-1 min-w-[100vw] max-w-[100vw] h-full flex justify-center flex-row-reverse duration-300;
}
.image {
  @apply max-w-[50vw] object-contain duration-300;
}
.btn-next {
  @apply absolute z-10 left-0 top-0 bottom-0 outline-none flex items-center pl-4 pr-96;
  &:hover {
    svg {
      path {
        stroke: #ccc !important;
      }
    }
  }
}
.btn-prev {
  @apply absolute z-10 right-0 top-0 bottom-0 outline-none flex items-center pr-4 pl-96;
  &:hover {
    svg {
      path {
        stroke: #ccc !important;
      }
    }
  }
}

#bg {
  justify-content: center;
  align-items: center;
  color: white;
  background: black;
  width: 100vw;
  height: 100vh;
  z-index: 9999;
  position: fixed;
  font-size: 40px;
  font-weight: 700;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
</style>

<template>
    <div class="relative flex flex-col">
        <!-- 縦スクロール -->
        <template v-if="book.screen_type == 'vertical'">
            <div v-if="show" class="bg-dark w-full hidden lg:block">
                <img
                    v-for="image in images"
                    :key="image"
                    class="max-h-[100vh] w-full object-contain mx-auto"
                    :src="`${image}`"
                    alt="image"
                />
            </div>
            <div
                ref="next"
                class="hidden lg:block min-w-[100vw] max-w-[100vw] w-full"
            >
                <div
                    class="min-w-[800px] max-w-[800px] bg-white dark:bg-dark p-10 flex flex-col justify-center mx-auto"
                >
                    <div v-if="episode.short_from_author" class="mb-10">
                        <h3 class="text-lg font-semibold">
                            {{ t("クリエイターさんからの一言") }}
                        </h3>
                        <div class="mt-4">
                            <div class="flex items-center mb-4">
                                <img
                                    v-if="book.user.avatar"
                                    :src="book.user.avatar"
                                    alt=""
                                    class="w-10 h-10 object-cover rounded-full shadow"
                                />
                                <svg
                                    v-else
                                    class="w-10 h-10 object-cover rounded-full shadow"
                                    viewBox="0 0 42 42"
                                    fill="none"
                                >
                                    <rect
                                        width="42"
                                        height="42"
                                        rx="21"
                                        class="dark:fill-dark-1 fill-eee"
                                    />
                                    <path
                                        class="stroke-white dark:stroke-ccc"
                                        d="M21 21C23.7614 21 26 18.7614 26 16C26 13.2386 23.7614 11 21 11C18.2386 11 16 13.2386 16 16C16 18.7614 18.2386 21 21 21Z"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M29.5901 31C29.5901 27.13 25.7402 24 21.0002 24C16.2602 24 12.4102 27.13 12.4102 31"
                                        class="stroke-white dark:stroke-ccc"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                                <div class="ml-2 font-semibold">
                                    {{ book.user.name }}
                                </div>
                            </div>
                            <div class="ml-[48px]">
                                {{ episode.short_from_author }}
                            </div>
                        </div>
                    </div>
                    <div>
                        <div
                            v-if="episode.number < episodeCount"
                            class="btn-primary text-center py-4 cursor-pointer"
                            @click="locale_next"
                        >
                            {{ t("次のエピソードを読む") }}
                        </div>
                        <div v-else class="mt-8 mb-4">
                            {{
                                t(
                                    "このエピソードは最新話です。次回作を楽しみにしてね！"
                                )
                            }}
                        </div>
                        <div
                            v-if="episode.number > 1"
                            class="text-primary mt-4 cursor-pointer"
                            @click="locale_prev"
                        >
                            {{ t("前のエピソードを読む") }}
                        </div>
                    </div>
                </div>
                <div
                    class="min-w-[800px] max-w-[800px] bg-white dark:bg-dark p-10 mx-auto"
                >
                    <div class="mb-8">
                        <h3 class="text-lg">{{ t("関連作品") }}</h3>
                    </div>
                    <div class="">
                        <h3 class="text-lg">{{ t("広告") }}</h3>
                    </div>
                </div>
            </div>
        </template>

        <!-- 横読み -->
        <template v-else>
            <!-- 1段目 -->
            <div
                v-if="show"
                ref="screen"
                class="screen scroll-none"
                :class="isFullScreen"
            >
                <div
                    v-for="i in pc_images"
                    :key="i"
                    ref="images"
                    class="images"
                >
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
                <div
                    ref="next"
                    class="min-w-[100vw] max-w-[100vw] flex justify-center bg-dark"
                >
                    <div
                        class="min-w-[35%] max-w-[35%] bg-white dark:bg-dark-1 p-10"
                    >
                        <div class="mb-8">
                            <h3 class="text-lg">{{ t("関連作品") }}</h3>
                        </div>
                        <div class="">
                            <h3 class="text-lg">{{ t("広告") }}</h3>
                        </div>
                    </div>
                    <div
                        class="min-w-[35%] max-w-[35%] bg-white dark:bg-dark-1 p-10 flex flex-col justify-center"
                    >
                        <div v-if="episode.short_from_author" class="mb-10">
                            <h3 class="text-lg font-semibold">
                                {{ t("クリエイターさんからの一言") }}
                            </h3>
                            <div class="mt-4">
                                <div class="flex items-center mb-4">
                                    <img
                                        v-if="book.user.avatar"
                                        :src="book.user.avatar"
                                        alt=""
                                        class="w-10 h-10 object-cover rounded-full shadow"
                                    />
                                    <svg
                                        v-else
                                        class="w-10 h-10 object-cover rounded-full shadow"
                                        viewBox="0 0 42 42"
                                        fill="none"
                                    >
                                        <rect
                                            width="42"
                                            height="42"
                                            rx="21"
                                            class="dark:fill-dark-1 fill-eee"
                                        />
                                        <path
                                            class="stroke-white dark:stroke-ccc"
                                            d="M21 21C23.7614 21 26 18.7614 26 16C26 13.2386 23.7614 11 21 11C18.2386 11 16 13.2386 16 16C16 18.7614 18.2386 21 21 21Z"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                        <path
                                            d="M29.5901 31C29.5901 27.13 25.7402 24 21.0002 24C16.2602 24 12.4102 27.13 12.4102 31"
                                            class="stroke-white dark:stroke-ccc"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                    <div class="ml-2 font-semibold">
                                        {{ book.user.name }}
                                    </div>
                                </div>
                                <div class="ml-[48px]">
                                    {{ episode.short_from_author }}
                                </div>
                            </div>
                        </div>
                        <div>
                            <div
                                v-if="episode.number < episodeCount"
                                class="btn-primary text-center py-4 cursor-pointer"
                                @click="locale_next"
                            >
                                {{ t("次のエピソードを読む") }}
                            </div>
                            <div v-else class="mt-8 mb-4">
                                {{
                                    t(
                                        "このエピソードは最新話です。次回作を楽しみにしてね！"
                                    )
                                }}
                            </div>
                            <div
                                v-if="episode.number > 1"
                                class="text-primary mt-4 cursor-pointer"
                                @click="locale_prev"
                            >
                                {{ t("前のエピソードを読む") }}
                            </div>
                        </div>
                    </div>
                </div>
                <button
                    v-if="canNext"
                    :class="isFullScreen"
                    class="btn-next"
                    @click="scroll_next"
                    @keydown="scroll_next"
                >
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none">
                        <title>next</title>
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
                    v-if="canPrev"
                    :class="isFullScreen"
                    class="btn-prev"
                    @click="scroll_prev"
                    @keydown="scroll_prev"
                >
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none">
                        <title>prev</title>
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
            </div>
            <!-- 2段目 -->
            <div
                v-if="show"
                class="hidden w-full bg-dark-1 px-4 lg:flex justify-between"
            >
                <!-- 左側 -->
                <div class="text-eee flex items-center">
                    <span class="max-w-[100px] truncate pr-2">{{
                        book.title
                    }}</span>
                    {{ episode.number }}{{ t("話") }}

                    <!-- コメント -->
                    <div
                        class="ml-4 p-3 flex items-center cursor-pointer"
                        @click="comment_menu = !comment_menu"
                    >
                        {{ t("コメント") }}
                        <div class="text-white text-xs ml-1 font-extralight">
                            ({{ commentCounts }})
                        </div>
                    </div>
                </div>

                <!-- 真ん中 -->
                <div class="lg:-ml-[200px] flex text-white">
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
                                    fill="#fff"
                                />
                                <path
                                    d="M-818,317h-22c-1.4,0-2.5,1.1-2.5,2.5l0,0c0,1.4,1.1,2.5,2.5,2.5h24.5c1.4,0,2.5-1.1,2.5-2.5V295c0-1.4-1.1-2.5-2.5-2.5
		l0,0c-1.4,0-2.5,1.1-2.5,2.5V317z"
                                    fill="#fff"
                                />
                                <path
                                    d="M-842.5,232.5L-842.5,232.5c0,1.4,1.1,2.5,2.5,2.5h22v22c0,1.4,1.1,2.5,2.5,2.5l0,0c1.4,0,2.5-1.1,2.5-2.5v-24.5
		c0-1.4-1.1-2.5-2.5-2.5H-840C-841.4,230-842.5,231.1-842.5,232.5z"
                                    fill="#fff"
                                />
                                <path
                                    d="M-902.5,292.5L-902.5,292.5c-1.4,0-2.5,1.1-2.5,2.5v24.5c0,1.4,1.1,2.5,2.5,2.5h24.5c1.4,0,2.5-1.1,2.5-2.5l0,0
		c0-1.4-1.1-2.5-2.5-2.5h-22v-22C-900,293.6-901.1,292.5-902.5,292.5z"
                                    fill="#fff"
                                />
                            </g>
                        </svg>
                        <span class="pl-2">{{ t("拡大") }}</span>
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
                                    fill="#fff"
                                />
                                <polygon
                                    points="34,18 34,29 35,30 46,30 46,28 37.414,28 50,15.414 62.293,27.707 63.707,26.293 37.707,0.293 36.293,1.707
		48.586,14 36,26.586 36,18 	"
                                    fill="#fff"
                                />
                            </g>
                        </svg>
                        <span class="pl-2">{{ t("通常") }}</span>
                    </div>
                </div>

                <!-- 右側 -->
                <div class="flex items-center text-eee">
                    <!-- 次の話 -->
                    <div
                        v-if="episode.number < episodeCount"
                        class="p-3 flex items-center cursor-pointer"
                        @click="locale_next"
                    >
                        <svg
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 flex-shrink-0"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 19.5L8.25 12l7.5-7.5"
                            />
                        </svg>
                        {{ t("次話") }}
                    </div>

                    <!-- 前の話 -->
                    <div
                        v-if="episode.number > 1"
                        class="p-3 flex items-center cursor-pointer"
                        @click="locale_prev"
                    >
                        {{ t("前話") }}
                        <svg
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6 flex-shrink-0"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8.25 4.5l7.5 7.5-7.5 7.5"
                            />
                        </svg>
                    </div>
                </div>
            </div>
        </template>

        <!-- 次の作品 モーダル -->
        <div @click.self="close">
            <transition name="modal" appear>
                <div v-show="open" class="overlay" @click.self="close">
                    <div class="window">
                        <div class="header">
                            <button class="close" @click="close">
                                <svg
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="#333"
                                >
                                    <path
                                        d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"
                                    ></path>
                                </svg>
                            </button>
                            <div class="title">
                                {{ t("この作品には続きがあります！") }}
                            </div>
                        </div>
                        <div
                            class="p-4 md:p-6 max-h-[60vh] md:max-h-[60vh] overflow-y-scroll overflow-x-hidden scroll-none"
                        >
                            <div
                                class="btn-primary text-center py-4 cursor-pointer"
                                @click="locale_next"
                            >
                                {{ t("このまま次のエピソードを読む") }}
                            </div>
                            <div
                                v-if="episode.number > 1"
                                class="text-primary text-center mt-4 cursor-pointer"
                                @click="locale_prev"
                            >
                                {{ t("ひとつ前のエピソードを読む") }}
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>

        <!-- SP -->
        <div
            v-if="show"
            ref="sp_screen"
            class="relative lg:hidden w-full flex flex-col duration-300"
            :class="[sp_menu ? 'my-[50px]' : '']"
            @click="sp_menu = !sp_menu"
        >
            <img
                v-for="image in images"
                :key="image"
                :class="isFullScreen"
                class="w-full object-contain"
                :src="`${image}`"
                alt="image"
            />

            <!-- SPメニュー上部 -->
            <transition name="sp-menu-top" appear>
                <div v-show="sp_menu">
                    <div
                        class="window fixed flex items-center justify-between top-0 right-0 left-0 w-screen bg-dark text-white z-[999] h-[55px]"
                    >
                        <!-- エピソード 話数、タイトル -->
                        <div class="pl-4 pr-2 py-3 truncate">
                            {{ episode.number }}話
                            <span v-if="episode.title" class="px-2">{{
                                episode.title
                            }}</span>
                        </div>
                        <!-- SNSシェア -->
                        <div class="p-3">
                            <svg
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-5 h-5 flex-shrink-0"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z"
                                />
                            </svg>
                        </div>
                    </div>
                </div>
            </transition>

            <!-- SPメニュー下部 -->
            <transition name="sp-menu-bottom" appear>
                <div v-show="sp_menu">
                    <div
                        class="window fixed flex items-center justify-between bottom-0 right-0 left-0 w-screen bg-dark text-white z-[999] h-[55px]"
                    >
                        <div class="flex items-center">
                            <!-- 作品トップ -->
                            <div class="p-3" @click="works_top">
                                <svg
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6 flex-shrink-0"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5"
                                    />
                                </svg>
                            </div>

                            <!-- コメント -->
                            <div
                                class="p-3 flex items-center"
                                @click="comment_menu = !comment_menu"
                            >
                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    class="w-6 h-6 flex-shrink-0"
                                >
                                    <path
                                        d="M8.5 19H8C4 19 2 18 2 13V8C2 4 4 2 8 2H16C20 2 22 4 22 8V13C22 17 20 19 16 19H15.5C15.19 19 14.89 19.15 14.7 19.4L13.2 21.4C12.54 22.28 11.46 22.28 10.8 21.4L9.3 19.4C9.14 19.18 8.77 19 8.5 19Z"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-miterlimit="10"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M15.9965 11H16.0054"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M11.9955 11H12.0045"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                    <path
                                        d="M7.99451 11H8.00349"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                                <div
                                    class="text-white text-xs ml-1 font-extralight"
                                >
                                    {{ commentCounts }}
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <!-- 次の話 -->
                            <div
                                v-if="episode.number < episodeCount"
                                class="p-3 flex items-center"
                                @click="locale_next"
                            >
                                <svg
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6 flex-shrink-0"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5"
                                    />
                                </svg>
                                次話
                            </div>

                            <!-- 前の話 -->
                            <div
                                v-if="episode.number > 1"
                                class="p-3 flex items-center"
                                @click="locale_prev"
                            >
                                前話
                                <svg
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6 flex-shrink-0"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>

        <!-- コメントメニュー -->
        <transition name="comment-menu" appear>
            <div
                v-show="comment_menu"
                class="overlay"
                @click.self="
                    (comment_menu = !comment_menu), (sp_menu = !sp_menu)
                "
            >
                <div class="window w-screen lg:w-[600px] h-screen lg:h-auto">
                    <!-- コメント上部 -->
                    <div
                        class="bg-dark text-white flex justify-between items-center h-[55px]"
                    >
                        <!-- エピソード 話数、タイトル -->
                        <div class="truncate p-3">
                            {{ episode.number }}{{ t("話") }}

                            <span class="px-2"
                                >{{ t("コメント") }}（{{
                                    commentCounts
                                }}）</span
                            >
                        </div>

                        <div class="p-3 flex items-center cursor-pointer">
                            <slot name="add-comments"></slot>
                        </div>
                    </div>

                    <!-- コメント内容 -->
                    <div
                        class="h-full pb-[100px] lg:pb-6 lg:mb-auto p-6 bg-dark-1 lg:min-h-[500px] lg:max-h-[500px] overflow-y-scroll"
                    >
                        <slot name="comments"></slot>
                    </div>

                    <!-- コメント下部 -->
                    <div
                        class="bg-dark flex items-center justify-between fixed lg:relative w-full bottom-0 lg:bottom-auto h-[55px]"
                    >
                        <!-- コメントメニュー 閉じる -->
                        <div
                            class="p-3 text-white flex items-center cursor-pointer"
                            @click="
                                (comment_menu = !comment_menu),
                                    (sp_menu = !sp_menu)
                            "
                        >
                            <svg
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 flex-shrink-0"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 19.5L8.25 12l7.5-7.5"
                                />
                            </svg>
                            <div class="hidden lg:block">{{ t("閉じる") }}</div>
                        </div>

                        <div class="flex items-center text-white">
                            <!-- 次の話 -->
                            <div
                                v-if="episode.number < episodeCount"
                                class="p-3 flex items-center"
                                @click="locale_next"
                            >
                                <svg
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6 flex-shrink-0"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5"
                                    />
                                </svg>
                                {{ t("次話") }}
                            </div>

                            <!-- 前の話 -->
                            <div
                                v-if="episode.number > 1"
                                class="p-3 flex items-center"
                                @click="locale_prev"
                            >
                                {{ t("前話") }}
                                <svg
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6 flex-shrink-0"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>

        <!-- セキュリティポリシー -->
        <div
            v-if="!show"
            ref="policy"
            class="bg-dark-1 text-white-2 text-xl lg:text-2xl font-semibold py-12 lg:py-20 px-4 flex items-center justify-center"
        >
            {{ t("作品保護のため、このページの画面操作はできません") }}
            {{ t("ページをリロードしてください") }}
        </div>
    </div>
</template>
<script>
export default {
    props: {
        lang: {
            type: String,
            default: "",
        },
        book: {
            type: Object,
            default: {},
        },
        episode: {
            type: Object,
            default: {},
        },
        episodeCount: {
            type: Number,
            default: 0,
        },
        comments: {
            type: Array,
            default: [],
        },
        commentCounts: {
            type: Number,
            default: 0,
        },
    },
    data() {
        return {
            images: JSON.parse(this.episode.contents),
            pc_images: [],
            fullScreen: false,
            show: true,
            windowWidth: window.innerWidth,
            screenWidth: 0,
            canPrev: true,
            canNext: true,
            open: false,
            ad: false,
            sp_menu: false,
            comment_menu: false,
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
    mounted() {
        this.setImages();
        document.addEventListener("keydown", this.onKeyDown);
    },
    beforeUnmount() {
        document.removeEventListener("keydown", this.onKeyDown);
    },
    methods: {
        onKeyDown(e) {
            if (e.key === "ArrowRight") {
                this.scroll_prev();
            }
            if (e.key === "ArrowLeft") {
                this.scroll_next();
            }

            // フルスクリーン解除
            if (e.keyCode === 27) {
                this.fullScreen = false;
            }

            // スクショブロック
            if (
                e.ctrlKey ||
                e.metaKey ||
                e.key == "RightCommand" ||
                e.key == "LeftCommand" ||
                e.key == "F12" ||
                e.keyCode == 91 // windows
            ) {
                this.show = false;
            }
        },
        setImages() {
            const all = this.images;

            // 2枚ずつに分け、スライド用の配列を作成
            const sliceByNumber = (all, number) => {
                const length = Math.ceil(all.length / number);
                return new Array(length)
                    .fill()
                    .map((_, i) => all.slice(i * number, (i + 1) * number));
            };
            this.pc_images = sliceByNumber(all, 2);
        },
        scroll_prev() {
            this.canNext = true;
            this.$refs.screen.scrollLeft -= this.windowWidth;
            if (this.$refs.screen.scrollLeft <= 0) {
                this.prev_episode();
            }
        },
        scroll_next() {
            this.canPrev = true;
            this.canNext = true;

            if (
                this.$refs.screen.clientWidth * (this.pc_images.length - 1) ==
                this.screenWidth
            ) {
                if (this.episode.number < this.episodeCount) {
                    this.open = true;
                }
            }

            this.$refs.screen.scrollLeft += this.windowWidth;
            this.screenWidth += this.windowWidth;
            if (
                this.$refs.screen.clientWidth * this.pc_images.length +
                    this.$refs.next.clientWidth <=
                this.screenWidth
            ) {
                this.next_episode();
            }
        },
        prev_episode() {
            if (this.episode.number > 1) {
                this.locale_prev();
            } else {
                if (
                    this.$refs.screen.clientWidth == this.$refs.next.clientWidth
                ) {
                    this.canPrev = false;
                } else {
                    this.canPrev = true;
                }
            }
        },
        next_episode() {
            if (this.$refs.screen.clientWidth == this.$refs.next.clientWidth) {
                this.canNext = false;
            } else {
                this.canNext = true;
            }
            if (this.episode.number < this.episodeCount) {
                this.locale_next();
            }
        },
        locale_next() {
            if (this.episode.number < this.episodeCount) {
                const nextNumber = this.episode.number + 1;
                location.href = `/${this.lang}/books/${this.book.id}/${nextNumber}`;
            }
        },
        locale_prev() {
            const prevNumber = this.episode.number - 1;
            location.href = `/${this.lang}/books/${this.book.id}/${prevNumber}`;
        },
        close() {
            if (this.open) this.open = false;
            if (this.comment_menu) this.comment_menu = false;
        },
        works_top() {
            location.href = "/" + this.lang + "/books/" + this.book.id;
        },
    },
};
</script>
<style lang="scss" scoped>
.screen {
    @apply hidden lg:flex flex-row overflow-hidden duration-300;
    -webkit-overflow-scrolling: touch !important;
}
.images {
    @apply bg-dark min-w-[100vw] max-w-[100vw] h-full flex justify-center flex-row-reverse duration-300;
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

.title {
    @apply text-[#5A5777] dark:text-ddd tracking-widest;
    animation: slide-in 0.3s;
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

/* enter transitions */
.comment-menu-enter-active {
    transition: opacity 0.1s ease 0.2s;
    .window {
        animation: comment_slide_in 0.2s;
    }
}
.comment-menu-leave-active {
    transition: all ease 0.3s;
    .window {
        animation: comment_slide_out 0.3s;
    }
}
/* leave transitions */
.comment-menu-leave-to {
    opacity: 0;
    .window {
        opacity: 0;
    }
}
@keyframes comment_slide_in {
    0% {
        transform: translateX(500px);
        opacity: 0;
    }
    100% {
        transform: translateX(0px);
        opacity: 1;
    }
}
@keyframes comment_slide_out {
    0% {
        transform: translateX(0px);
        opacity: 1;
    }
    100% {
        transform: translateX(500px);
        opacity: 0;
    }
}

.sp-menu-top-enter-active {
    transition: opacity 0.1s ease 0.2s;
    .window {
        animation: sp_slide_top_in 0.2s;
    }
}
.sp-menu-top-leave-active {
    transition: all ease 0.3s;
    .window {
        animation: sp_slide_top_out 0.3s;
    }
}
/* leave transitions */
.sp-menu-top-leave-to {
    opacity: 0;
    .window {
        opacity: 0;
    }
}
@keyframes sp_slide_top_in {
    0% {
        transform: translateY(-100px);
        opacity: 0;
    }
    100% {
        transform: translateY(0px);
        opacity: 1;
    }
}
@keyframes sp_slide_top_out {
    0% {
        transform: translateY(0px);
        opacity: 1;
    }
    100% {
        transform: translateY(-100px);
        opacity: 0;
    }
}

.sp-menu-bottom-enter-active {
    transition: opacity 0.1s ease 0.2s;
    .window {
        animation: sp_slide_bottom_in 0.2s;
    }
}
.sp-menu-bottom-leave-active {
    transition: all ease 0.3s;
    .window {
        animation: sp_slide_bottom_out 0.3s;
    }
}
/* leave transitions */
.sp-menu-bottom-leave-to {
    opacity: 0;
    .window {
        opacity: 0;
    }
}
@keyframes sp_slide_bottom_in {
    0% {
        transform: translateY(100px);
        opacity: 0;
    }
    100% {
        transform: translateY(0px);
        opacity: 1;
    }
}
@keyframes sp_slide_bottom_out {
    0% {
        transform: translateY(0px);
        opacity: 1;
    }
    100% {
        transform: translateY(100px);
        opacity: 0;
    }
}

.overlay {
    @apply bg-black bg-opacity-50;
}
</style>

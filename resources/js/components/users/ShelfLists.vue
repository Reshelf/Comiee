<template>
    <div class="flex max-w-5xl w-full mx-auto px-6 md:px-0 justify-center mb-8">
        <div class="w-full lg:mt-4">
            <h3 class="text-2xl font-semibold py-4 block lg:hidden">
                {{ t("本棚") }}
            </h3>
            <div class="w-full lg:my-4 flex">
                <div class="setting-tab">
                    <!-- 項目 -->
                    <ul
                        class="tabMenu scroll-none sticky top-0 lg:h-[300px] lg:min-w-[200px]"
                    >
                        <h3
                            class="text-2xl font-bold py-4 lg:pt-0 hidden lg:block"
                        >
                            {{ t("本棚") }}
                        </h3>
                        <!-- お気に入り -->
                        <h4
                            class="hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg whitespace-nowrap cursor-pointer tracking-widest"
                            :class="
                                isLikes
                                    ? 'text-primary dark:text-f5 font-semibold bg-f5 dark:bg-dark-1'
                                    : ''
                            "
                            @click="
                                (isLikes = true),
                                    (isRead = false),
                                    (isBought = false),
                                    (isFollow = false)
                            "
                        >
                            <svg
                                width="22"
                                height="22"
                                class="mr-4 hidden lg:block"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M12.62 20.8101C12.28 20.9301 11.72 20.9301 11.38 20.8101C8.48 19.8201 2 15.6901 2 8.6901C2 5.6001 4.49 3.1001 7.56 3.1001C9.38 3.1001 10.99 3.9801 12 5.3401C13.01 3.9801 14.63 3.1001 16.44 3.1001C19.51 3.1001 22 5.6001 22 8.6901C22 15.6901 15.52 19.8201 12.62 20.8101Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            {{ t("お気に入り") }}
                        </h4>
                        <!-- フォロー -->
                        <h4
                            class="hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg whitespace-nowrap cursor-pointer tracking-widest"
                            :class="
                                isFollow
                                    ? 'text-primary dark:text-f5 font-semibold bg-f5 dark:bg-dark-1'
                                    : ''
                            "
                            @click="
                                (isFollow = true),
                                    (isLikes = false),
                                    (isRead = false),
                                    (isBought = false)
                            "
                        >
                            <svg
                                width="22"
                                height="22"
                                class="mr-4 hidden lg:block"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M9.16006 10.87C9.06006 10.86 8.94006 10.86 8.83006 10.87C6.45006 10.79 4.56006 8.84 4.56006 6.44C4.56006 3.99 6.54006 2 9.00006 2C11.4501 2 13.4401 3.99 13.4401 6.44C13.4301 8.84 11.5401 10.79 9.16006 10.87Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M16.41 4C18.35 4 19.91 5.57 19.91 7.5C19.91 9.39 18.41 10.93 16.54 11C16.46 10.99 16.37 10.99 16.28 11"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M4.15997 14.56C1.73997 16.18 1.73997 18.82 4.15997 20.43C6.90997 22.27 11.42 22.27 14.17 20.43C16.59 18.81 16.59 16.17 14.17 14.56C11.43 12.73 6.91997 12.73 4.15997 14.56Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M18.3401 20C19.0601 19.85 19.7401 19.56 20.3001 19.13C21.8601 17.96 21.8601 16.03 20.3001 14.86C19.7501 14.44 19.0801 14.16 18.3701 14"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            {{ t("フォロー中") }}
                        </h4>
                        <!-- 閲覧履歴 -->
                        <h4
                            class="hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg whitespace-nowrap cursor-pointer tracking-widest"
                            :class="
                                isRead
                                    ? 'text-primary dark:text-f5 font-semibold bg-f5 dark:bg-dark-1'
                                    : ''
                            "
                            @click="
                                (isLikes = false),
                                    (isRead = true),
                                    (isBought = false),
                                    (isFollow = false)
                            "
                        >
                            <svg
                                width="22"
                                height="22"
                                class="mr-4 hidden lg:block"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M9.57002 12.46L6.52002 15.51"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M6.54999 12.49L9.59999 15.54"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M13.53 14H13.54"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M17.47 14H17.48"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M15.5 15.98V15.96"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M15.5 12.04V12.02"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9 22H15C20 22 22 20 22 15V13C22 8 20 6 15 6H9C4 6 2 8 2 13V15C2 20 4 22 9 22Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M13.01 2L13 3.01C12.99 3.56 12.55 4 12 4H11.97C11.42 4 10.98 4.45 10.98 5C10.98 5.55 11.43 6 11.98 6H12.98"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>

                            {{ t("閲覧履歴") }}
                        </h4>
                        <!-- 購入履歴 -->
                        <h4
                            class="hover:bg-primary hover:text-white lg:hover:text-primary dark:lg:hover:text-ddd flex items-center px-4 py-2 lg:py-3 lg:hover:bg-f5 dark:lg:hover:bg-dark-1 rounded-full lg:rounded-lg whitespace-nowrap cursor-pointer tracking-widest"
                            :class="
                                isBought
                                    ? 'text-primary dark:text-f5 font-semibold bg-f5 dark:bg-dark-1'
                                    : ''
                            "
                            @click="
                                (isLikes = false),
                                    (isRead = false),
                                    (isBought = true),
                                    (isFollow = false)
                            "
                        >
                            <svg
                                width="22"
                                height="22"
                                class="mr-4 hidden lg:block"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M10.4899 2.23006L5.49991 4.11006C4.34991 4.54006 3.40991 5.90006 3.40991 7.12006V14.5501C3.40991 15.7301 4.18991 17.2801 5.13991 17.9901L9.43991 21.2001C10.8499 22.2601 13.1699 22.2601 14.5799 21.2001L18.8799 17.9901C19.8299 17.2801 20.6099 15.7301 20.6099 14.5501V7.12006C20.6099 5.89006 19.6699 4.53006 18.5199 4.10006L13.5299 2.23006C12.6799 1.92006 11.3199 1.92006 10.4899 2.23006Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M9.05005 11.8702L10.66 13.4802L14.96 9.18018"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            {{ t("購入履歴") }}
                        </h4>
                    </ul>

                    <div class="tabContents">
                        <div class="w-full flex flex-col my-4">
                            <div ref="box" class="w-full">
                                <!-- お気に入り -->
                                <template v-if="isLikes">
                                    <!-- 検索条件 -->
                                    <div
                                        class="w-full flex whitespace-nowrap overflow-x-scroll scroll-none items-center mt-4 lg:mt-0 mb-4"
                                    >
                                        <!-- 画面タイプ -->
                                        <div class="mb-4">
                                            <select
                                                v-model="screen_type"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    {{ t("画面タイプ") }}
                                                </option>
                                                <option value="horizontal">
                                                    {{ t("横読み") }}
                                                </option>
                                                <option value="vertical">
                                                    {{ t("縦スクロール") }}
                                                </option>
                                            </select>
                                        </div>

                                        <!-- 完結作品 -->
                                        <div
                                            :class="
                                                is_complete
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_complete = !is_complete"
                                        >
                                            {{ t("完結作品") }}
                                        </div>

                                        <!-- カラー作品 -->
                                        <div
                                            :class="
                                                is_color
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_color = !is_color"
                                        >
                                            {{ t("カラー作品") }}
                                        </div>

                                        <!-- 全話無料 -->
                                        <div
                                            :class="
                                                is_all_charge
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="
                                                is_all_charge = !is_all_charge
                                            "
                                        >
                                            {{ t("全話無料") }}
                                        </div>

                                        <!-- 今日の新作 -->
                                        <div
                                            :class="
                                                is_new
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_new = !is_new"
                                        >
                                            {{ t("今日の新作") }}
                                        </div>

                                        <!-- 閲覧数 -->
                                        <div class="mb-4 flex items-center">
                                            <select
                                                v-model="views"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    {{ t("閲覧数") }}
                                                </option>
                                                <option value="much">
                                                    {{ t("多い順") }}
                                                </option>
                                                <option value="less">
                                                    {{ t("少ない順") }}
                                                </option>
                                            </select>
                                        </div>

                                        <!-- ジャンル -->
                                        <div class="mb-4 flex items-center">
                                            <select
                                                v-model="genre_id"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    {{ t("ジャンル") }}
                                                </option>
                                                <option value="1">
                                                    {{ t("少年") }}
                                                </option>
                                                <option value="2">
                                                    {{ t("青年") }}
                                                </option>
                                                <option value="3">
                                                    {{ t("少女") }}
                                                </option>
                                                <option value="4">
                                                    {{ t("女性") }}
                                                </option>
                                            </select>
                                        </div>

                                        <!-- 言語 -->
                                        <div class="mb-4 flex items-center">
                                            <select
                                                v-model="manga_lang"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    {{ t("作品言語") }}
                                                </option>
                                                <option value="ja">
                                                    日本語
                                                </option>
                                                <option value="en">
                                                    English
                                                </option>
                                                <option value="tw">
                                                    繁體中文
                                                </option>
                                                <option value="cn">
                                                    簡体中文
                                                </option>
                                                <option value="es">
                                                    Español
                                                </option>
                                                <option value="fr">
                                                    Français
                                                </option>
                                                <option value="it">
                                                    Italiano
                                                </option>
                                                <option value="id">
                                                    Bahasa Indonesia
                                                </option>
                                                <option value="th">
                                                    ภาษาไทย
                                                </option>
                                                <option value="ko">
                                                    한국어
                                                </option>
                                                <option value="de">
                                                    Deutsch
                                                </option>
                                                <option value="hi">
                                                    हिन्दी
                                                </option>
                                                <option value="ar">
                                                    العربية
                                                </option>
                                                <option value="pt">
                                                    Português
                                                </option>
                                                <option value="bn">
                                                    বাংলা
                                                </option>
                                            </select>
                                        </div>

                                        <!-- 休載中 -->
                                        <div
                                            :class="
                                                is_suspend
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_suspend = !is_suspend"
                                        >
                                            {{ t("休載中") }}
                                        </div>
                                    </div>

                                    <!-- お気に入り -->
                                    <div class="flex flex-wrap">
                                        <template
                                            v-for="manga in filteredLikesManga"
                                            :key="manga.id"
                                        >
                                            <div class="list-item">
                                                <a
                                                    :href="`/${lang}/books/${manga.title}`"
                                                >
                                                    <template
                                                        v-if="manga.thumbnail"
                                                    >
                                                        <img
                                                            :src="
                                                                manga.thumbnail
                                                            "
                                                            alt="thumbnail"
                                                            class="w-full md:w-[200px] h-[200px] object-cover"
                                                        />
                                                    </template>
                                                    <template v-else>
                                                        <img
                                                            src="/img/noimage.svg"
                                                            alt=""
                                                            class="block dark:hidden min-h-[200px] max-h-[200px] w-full md:min-w-[200px] md:max-w-[200px] object-cover"
                                                        />
                                                        <img
                                                            src="/img/noimage-dark.svg"
                                                            alt="thumbnail"
                                                            class="hidden dark:block h-[200px] w-full md:w-[200px] object-cover"
                                                        />
                                                    </template>
                                                    <span
                                                        class="thumbnail-title"
                                                        >{{ manga.title }}</span
                                                    >
                                                </a>
                                            </div>
                                        </template>

                                        <!-- 0件 -->
                                        <div
                                            v-if="
                                                filteredLikesManga.length === 0
                                            "
                                        >
                                            {{ message }}
                                        </div>
                                    </div>
                                </template>

                                <!-- フォロー -->
                                <template v-if="isFollow">
                                    <!-- 検索条件 -->
                                    <div
                                        class="w-full flex whitespace-nowrap overflow-x-scroll scroll-none items-center mt-4 lg:mt-0 mb-4"
                                    >
                                        <!-- 画面タイプ -->
                                        <div class="mb-4">
                                            <select
                                                v-model="screen_type"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    {{ t("画面タイプ") }}
                                                </option>
                                                <option value="horizontal">
                                                    {{ t("横読み") }}
                                                </option>
                                                <option value="vertical">
                                                    {{ t("縦スクロール") }}
                                                </option>
                                            </select>
                                        </div>

                                        <!-- 完結作品 -->
                                        <div
                                            :class="
                                                is_complete
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_complete = !is_complete"
                                        >
                                            {{ t("完結作品") }}
                                        </div>

                                        <!-- カラー作品 -->
                                        <div
                                            :class="
                                                is_color
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_color = !is_color"
                                        >
                                            {{ t("カラー作品") }}
                                        </div>

                                        <!-- 全話無料 -->
                                        <div
                                            :class="
                                                is_all_charge
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="
                                                is_all_charge = !is_all_charge
                                            "
                                        >
                                            {{ t("全話無料") }}
                                        </div>

                                        <!-- 今日の新作 -->
                                        <div
                                            :class="
                                                is_new
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_new = !is_new"
                                        >
                                            {{ t("今日の新作") }}
                                        </div>

                                        <!-- 閲覧数 -->
                                        <div class="mb-4 flex items-center">
                                            <select
                                                v-model="views"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    {{ t("閲覧数") }}
                                                </option>
                                                <option value="much">
                                                    {{ t("多い順") }}
                                                </option>
                                                <option value="less">
                                                    {{ t("少ない順") }}
                                                </option>
                                            </select>
                                        </div>

                                        <!-- ジャンル -->
                                        <div class="mb-4 flex items-center">
                                            <select
                                                v-model="genre_id"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    {{ t("ジャンル") }}
                                                </option>
                                                <option value="1">
                                                    {{ t("少年") }}
                                                </option>
                                                <option value="2">
                                                    {{ t("青年") }}
                                                </option>
                                                <option value="3">
                                                    {{ t("少女") }}
                                                </option>
                                                <option value="4">
                                                    {{ t("女性") }}
                                                </option>
                                            </select>
                                        </div>

                                        <!-- 言語 -->
                                        <div class="mb-4 flex items-center">
                                            <select
                                                v-model="manga_lang"
                                                class="bg-white dark:bg-transparent cursor-pointer py-1 px-2 inline-flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            >
                                                <option value="">
                                                    {{ t("作品言語") }}
                                                </option>
                                                <option value="ja">
                                                    日本語
                                                </option>
                                                <option value="en">
                                                    English
                                                </option>
                                                <option value="tw">
                                                    繁體中文
                                                </option>
                                                <option value="cn">
                                                    簡体中文
                                                </option>
                                                <option value="es">
                                                    Español
                                                </option>
                                                <option value="fr">
                                                    Français
                                                </option>
                                                <option value="it">
                                                    Italiano
                                                </option>
                                                <option value="id">
                                                    Bahasa Indonesia
                                                </option>
                                                <option value="th">
                                                    ภาษาไทย
                                                </option>
                                                <option value="ko">
                                                    한국어
                                                </option>
                                                <option value="de">
                                                    Deutsch
                                                </option>
                                                <option value="hi">
                                                    हिन्दी
                                                </option>
                                                <option value="ar">
                                                    العربية
                                                </option>
                                                <option value="pt">
                                                    Português
                                                </option>
                                                <option value="bn">
                                                    বাংলা
                                                </option>
                                            </select>
                                        </div>

                                        <!-- 休載中 -->
                                        <div
                                            :class="
                                                is_suspend
                                                    ? 'active hover:bg-opacity-80'
                                                    : 'hover:bg-opacity-10'
                                            "
                                            class="mb-4 cursor-pointer py-1 px-2 flex justify-center items-center border border-primary rounded-full mr-2 text-primary hover:bg-primary hover:bg-opacity-10 dark:text-[#8ab4f8] dark:border-[#626262]"
                                            @click="is_suspend = !is_suspend"
                                        >
                                            {{ t("休載中") }}
                                        </div>
                                    </div>

                                    <!-- お気に入り -->
                                    <div class="flex flex-wrap">
                                        <template
                                            v-for="manga in filteredLikesManga"
                                            :key="manga.id"
                                        >
                                            <div class="list-item">
                                                <a
                                                    :href="`/${lang}/books/${manga.title}`"
                                                >
                                                    <template
                                                        v-if="manga.thumbnail"
                                                    >
                                                        <img
                                                            :src="
                                                                manga.thumbnail
                                                            "
                                                            alt="thumbnail"
                                                            class="w-full md:w-[200px] h-[200px] object-cover"
                                                        />
                                                    </template>
                                                    <template v-else>
                                                        <img
                                                            src="/img/noimage.svg"
                                                            alt=""
                                                            class="block dark:hidden min-h-[200px] max-h-[200px] w-full md:min-w-[200px] md:max-w-[200px] object-cover"
                                                        />
                                                        <img
                                                            src="/img/noimage-dark.svg"
                                                            alt="thumbnail"
                                                            class="hidden dark:block h-[200px] w-full md:w-[200px] object-cover"
                                                        />
                                                    </template>
                                                    <span
                                                        class="thumbnail-title"
                                                        >{{ manga.title }}</span
                                                    >
                                                </a>
                                            </div>
                                        </template>

                                        <!-- 0件 -->
                                        <div
                                            v-if="
                                                filteredLikesManga.length === 0
                                            "
                                        >
                                            {{ message }}
                                        </div>
                                    </div>
                                </template>

                                <!-- 閲覧履歴 -->
                                <template v-if="isRead">
                                    <div class="flex flex-wrap">
                                        <template
                                            v-for="episode in readsBooks"
                                            :key="episode.id"
                                        >
                                            <div class="list-item">
                                                <a
                                                    :href="`/${lang}/books/${episode.book_title}/${episode.number}`"
                                                >
                                                    <template
                                                        v-if="episode.thumbnail"
                                                    >
                                                        <img
                                                            :src="
                                                                episode.thumbnail
                                                            "
                                                            alt="thumbnail"
                                                            class="w-full md:w-[200px] h-[200px] object-cover"
                                                        />
                                                    </template>
                                                    <template v-else>
                                                        <img
                                                            src="/img/noimage.svg"
                                                            alt=""
                                                            class="block dark:hidden min-h-[200px] max-h-[200px] w-full md:min-w-[200px] md:max-w-[200px] object-cover"
                                                        />
                                                        <img
                                                            src="/img/noimage-dark.svg"
                                                            alt="thumbnail"
                                                            class="hidden dark:block h-[200px] w-full md:w-[200px] object-cover"
                                                        />
                                                    </template>
                                                    <span
                                                        class="thumbnail-title"
                                                        >{{ episode.title }}
                                                        {{ episode.number
                                                        }}{{ t("話") }}</span
                                                    >
                                                </a>
                                            </div>
                                        </template>
                                    </div>

                                    <!-- 0件 -->
                                    <div
                                        v-if="readsBooks.length === 0"
                                        class="py-8"
                                    >
                                        {{ message }}
                                    </div>
                                </template>

                                <!-- 購入履歴 -->
                                <template v-if="isBought">
                                    <div class="flex flex-wrap">
                                        <template
                                            v-for="episode in boughtBooks"
                                            :key="episode.id"
                                        >
                                            <div class="list-item">
                                                <a
                                                    :href="`/${lang}/books/${episode.book_title}/${episode.number}`"
                                                >
                                                    <template
                                                        v-if="episode.thumbnail"
                                                    >
                                                        <img
                                                            :src="
                                                                episode.thumbnail
                                                            "
                                                            alt="thumbnail"
                                                            class="w-full md:w-[200px] h-[200px] object-cover"
                                                        />
                                                    </template>
                                                    <template v-else>
                                                        <img
                                                            src="/img/noimage.svg"
                                                            alt=""
                                                            class="block dark:hidden min-h-[200px] max-h-[200px] w-full md:min-w-[200px] md:max-w-[200px] object-cover"
                                                        />
                                                        <img
                                                            src="/img/noimage-dark.svg"
                                                            alt="thumbnail"
                                                            class="hidden dark:block h-[200px] w-full md:w-[200px] object-cover"
                                                        />
                                                    </template>
                                                    <span
                                                        class="thumbnail-title"
                                                        >{{ episode.title }}
                                                        {{ episode.number
                                                        }}{{ t("話") }}</span
                                                    >
                                                </a>
                                            </div>
                                        </template>
                                    </div>

                                    <!-- 0件 -->
                                    <div
                                        v-if="boughtBooks.length === 0"
                                        class="py-8"
                                    >
                                        {{ message }}
                                    </div>
                                </template>

                                <!-- ローディング -->
                                <div v-if="loading" class="p-4">
                                    {{ t("取得中...") }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        user: {
            type: Object,
            default: {},
        },
        likeBooks: {
            type: Array,
            default: [],
        },
        readsBooks: {
            type: Array,
            default: [],
        },
        boughtBooks: {
            type: Array,
            default: [],
        },
        followedBooks: {
            type: Array,
            default: [],
        },
    },
    data() {
        return {
            // 検索条件
            is_complete: false,
            is_suspend: false,
            is_color: false,
            screen_type: "",
            is_all_charge: false,
            is_new: false,
            views: "",
            genre_id: "",
            manga_lang: this.lang,

            // ロード
            loading: false,
            error: null,
            message: this.t("表示する作品がまだありません"),

            // 選択タブ
            isLikes: true,
            isRead: false,
            isBought: false,
            isFollow: false,
        };
    },
    computed: {
        setLikesBook() {
            if (this.isLikes) return this.likeBooks;
            if (this.isFollow) return this.followedBooks;
            return [];
        },
        filteredLikesManga() {
            let result = this.setLikesBook;

            result = result.filter((manga) => !manga.is_hidden);

            // 検索
            if (this.is_complete)
                result = result.filter((manga) => manga.is_complete);
            if (this.is_color)
                result = result.filter((manga) => manga.is_color);
            if (this.is_new) result = result.filter((manga) => manga.is_new);
            if (this.is_suspend)
                result = result.filter((manga) => manga.is_suspend);
            if (this.is_all_charge)
                result = result.filter(
                    (manga) => manga.is_all_charge === "false"
                );
            // 閲覧数 降順、昇順
            if (this.views === "much") {
                result = result.sort((a, b) => b.views - a.views);
            } else if (this.views === "less") {
                result = result.sort((a, b) => a.views - b.views);
            }
            // 言語
            if (this.manga_lang) {
                result = result.filter(
                    (manga) => manga.lang == this.manga_lang
                );
            }

            // 画面タイプ
            if (this.screen_type) {
                result = result.filter(
                    (manga) => manga.screen_type == this.screen_type
                );
            }

            // ジャンル
            if (this.genre_id) {
                let selected_genre = parseInt(this.genre_id); // 文字列 → 数字変換
                result = result.filter(
                    (manga) => manga.genre_id === selected_genre
                );
            }

            return result;
        },
    },
    watch: {
        is_complete: function (newValue) {
            this.saveFilters("is_complete", newValue);
        },
        is_suspend: function (newValue) {
            this.saveFilters("is_suspend", newValue);
        },
        is_color: function (newValue) {
            this.saveFilters("is_color", newValue);
        },
        screen_type: function (newValue) {
            this.saveFilters("screen_type", newValue);
        },
        is_all_charge: function (newValue) {
            this.saveFilters("is_all_charge", newValue);
        },
        is_new: function (newValue) {
            this.saveFilters("is_new", newValue);
        },
        views: function (newValue) {
            this.saveFilters("views", newValue);
        },
        genre_id: function (newValue) {
            this.saveFilters("genre_id", newValue);
        },
        manga_lang: function (newValue) {
            this.saveFilters("manga_lang", newValue);
        },
    },
    mounted() {
        this.loadFilters();
    },
    methods: {
        saveFilters(key, value) {
            localStorage.setItem(`manga_search_${key}`, value);
        },
        loadFilters() {
            const filterKeys = [
                "is_complete",
                "is_suspend",
                "is_color",
                "screen_type",
                "is_all_charge",
                "is_new",
                "views",
                "genre_id",
                "manga_lang",
            ];

            filterKeys.forEach((key) => {
                const storedValue = localStorage.getItem(`manga_search_${key}`);

                if (storedValue) {
                    this[key] =
                        storedValue === "true"
                            ? true
                            : storedValue === "false"
                            ? false
                            : storedValue;
                }
            });
        },
    },
};
</script>
<style lang="scss" scoped>
.active {
    @apply bg-primary hover:bg-primary dark:border-primary;
    color: white !important;
}
select {
    @apply appearance-none;
}
</style>

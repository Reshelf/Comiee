<template>
    <div>
        <toast-modal :success="success" :error="error"></toast-modal>
        <div class="w-full flex flex-col my-8">
            <input
                type="text"
                v-model.trim="name"
                placeholder="タイトル"
                class="w-full text-3xl bg-white p-2 rounded"
                maxlength="30"
                minlength="5"
            />
            <p v-if="name" class="w-full flex items-center justify-end mt-2">
                <svg
                    v-if="name.length <= 30 && name.length >= 5"
                    class="slide-animation h-5 w-5 text-primary mr-1"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span>{{ name.length }}/30</span>
            </p>
        </div>

        <div class="w-full flex flex-col items-center">
            <textarea
                type="text"
                minlength="1000"
                v-model.trim="body"
                placeholder="本文"
                class="w-full p-4 bg-white whitespace-pre-line rounded h-full text-lg leading-9"
            ></textarea>
            <p v-if="body" class="w-full flex items-center justify-end mt-2">
                <svg
                    v-if="body.length >= 1000"
                    class="slide-animation h-5 w-5 text-primary mr-1"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span>1000/{{ body.length }}</span>
            </p>
        </div>
    </div>
</template>
<script>
import ToastModal from "../../atoms/ToastModal.vue";
export default {
    data() {
        return {
            success: false,
            error: false,
            form: {
                id: this.id,
                name: this.name,
                body: this.body,
            },
        };
    },
    components: {
        ToastModal,
    },
    props: {
        id: {
            type: Number,
        },
        name: {
            type: String,
        },
        body: {
            type: String,
        },
    },
    watch: {
        name: {
            // eslint-disable-next-line
            handler: _.debounce(function () {
                this.form.name = this.name;
            }, 0), // 更新されたら保存処理
            deep: true,
        },
        body: {
            // eslint-disable-next-line
            handler: _.debounce(function () {
                this.form.body = this.body;
            }, 0), // 更新されたら保存処理
            deep: true,
        },
        form: {
            // eslint-disable-next-line
            handler: _.debounce(function () {
                this.update();
            }, 2000), // 更新されたら保存処理
            deep: true,
        },
    },
    methods: {
        async update() {
            await axios
                .patch(`/api/episode/${this.id}`, this.form)
                .then(() => {
                    this.success = true;
                    setTimeout(() => (this.success = false), 3000);
                })
                .catch(() => {
                    this.error = true;
                    setTimeout(() => (this.error = false), 3000);
                });
        },
    },
};
</script>

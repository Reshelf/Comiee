<template>
    <div class="">
        <div class="flex justify-center items-center">
            <input
                v-model.number="price"
                name="price"
                type="number"
                min="2"
                max="500"
                class="p-4 border border-ccc text-3xl outline-none rounded"
                required
                @input="change"
            />
            <span class="ml-2">エール</span>
        </div>

        <div class="range-slider">
            <input
                v-model.number="price"
                class="rs-range"
                type="range"
                min="2"
                max="500"
                step="2"
                @input="change"
            />
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            price: 2,
        };
    },
    methods: {
        change(e) {
            this.price = e.target.value;
        },
    },
};
</script>
<style lang="scss" scoped>
.box-minmax {
    margin-top: 30px;
    display: flex;
    justify-content: space-between;
    font-size: 20px;
    span:first-child {
        margin-left: 10px;
    }
}
.rs-range {
    @apply w-full;
    margin-top: 29px;
    -webkit-appearance: none;
    &:focus {
        outline: none;
    }
    &::-webkit-slider-runnable-track {
        @apply bg-primary w-full h-[3px] cursor-pointer shadow-none rounded-none;
    }
    &::-moz-range-track {
        @apply bg-primary w-full h-[3px] cursor-pointer shadow-none rounded-none;
    }
    &::-webkit-slider-thumb {
        @apply bg-white mt-[-15px];
        box-shadow: none;
        border: 3px solid #0570de;
        // box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);
        height: 30px;
        width: 30px;
        border-radius: 30px;
        cursor: pointer;
        -webkit-appearance: none;
    }
    &::-moz-focus-outer {
        border: 0;
    }
}
</style>

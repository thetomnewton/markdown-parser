<template>
    <div class="flex">
        <div class="w-1/2 border-r h-screen overflow-auto">
            <textarea
                ref="content"
                class="block w-full p-4 h-full"
                autofocus
                @input="input"
            ></textarea>
        </div>
        <div class="w-1/2 p-4 h-screen overflow-auto">
            <div v-html="parsed" class="markdown-body"></div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            parsed: null,
        };
    },

    methods: {
        input() {
            this.parseDebounce();
        },
        parse() {
            axios
                .post("/parse", { content: this.$refs.content.value })
                .then(({ data }) => {
                    this.parsed = data;
                });
        },
        parseDebounce: _.debounce(function() {
            this.parse();
        }, 250),
    },
};
</script>

<template>
    <div class="flex text-gray-900">
        <div class="w-1/2 border-r h-screen overflow-auto bg-gray-50 pb-8">
            <textarea
                ref="content"
                class="block w-full p-6 h-full bg-transparent resize-none"
                autofocus
                @input="input"
            ></textarea>
        </div>
        <div class="w-1/2 p-6 h-screen overflow-auto text-gray-800 pb-8">
            <div ref="output" v-html="parsed" class="markdown-body"></div>
        </div>
    </div>

    <div
        class="fixed bottom-0 left-0 right-0 border-t py-1 px-2 text-xs text-gray-700 bg-gray-100"
    >
        Created by
        <a href="//twitter.com/thetomnewton" target="_blank">@thetomnewton</a>.
    </div>
</template>

<script>
import axios from "axios";
import Prism from "prismjs";

window.Prism = Prism;

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
                    this.$nextTick(() => {
                        Prism.highlightAll(this.$refs.output);
                    });
                });
        },
        parseDebounce: _.debounce(function() {
            this.parse();
        }, 250),
    },
};
</script>

<template>
    <div class="flex text-gray-900 h-screen">
        <textarea
            ref="content"
            class="block w-1/2 border-r bg-gray-50 p-6 mb-8 resize-x"
            autofocus
            @input="input"
        ></textarea>
        <div class="w-1/2 p-6 overflow-auto text-gray-800 mb-8">
            <div ref="output" v-html="parsed" class="markdown-body"></div>
        </div>
    </div>

    <div
        class="fixed bottom-0 left-0 right-0 border-t py-1 px-2 leading-6 text-xs text-gray-700 bg-gray-100"
    >
        Created by
        <a
            href="//twitter.com/thetomnewton"
            target="_blank"
            class="text-gray-700 font-medium"
            >@thetomnewton</a
        >.
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

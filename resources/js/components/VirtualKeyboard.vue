<template>
    <div class="flex flex-wrap justify-center p-8 mb-8">
        <button v-for="letter in alphabet" :key="letter" @click="guessLetter(letter)"
            :disabled="guessedLetters.includes(letter)"
            class="m-1 px-3 py-2 bg-white text-black rounded disabled:opacity-50 disabled:cursor-not-allowed">
            {{ letter }}
        </button>
    </div>
</template>

<script>
export default {
    props: {
        guessedLetters: Array,
    },
    data() {
        return {
            alphabet: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split(''),
        };
    },
    methods: {
        guessLetter(letter) {
            this.$emit('guess', letter);
        },
    },
};
</script>


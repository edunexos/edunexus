<template>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Physics Hangman Game</h1>
        <p class="text-xl mb-4">Guess the word by selecting the letters below:</p>

        <div class="mb-4">
            <pre class="text-2xl">{{ displayWord }}</pre>
        </div>

        <div class="mb-4">
            <pre class="text-xl">{{ hangmanState }}</pre>
        </div>

        <p class="text-lg mb-4">Hint: {{ currentTerm.hint }}</p>

        <VirtualKeyboard :guessedLetters="guessedLetters" @guess="guessLetter" />

        <div v-if="gameOver" class="mt-4">
            <p v-if="hasWon" class="text-green-600 text-xl font-bold">Congratulations! You guessed the word!</p>
            <p v-else class="text-red-600 text-xl font-bold">Game Over! The word was: {{ currentTerm.term }}</p>
            <button @click="resetGame" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Play Again</button>
        </div>
    </div>
</template>

<script>
import VirtualKeyboard from './VirtualKeyboard.vue';
import physicsTerms from './PhysicsTerms.json';

export default {
    components: {
        VirtualKeyboard,
    },
    data() {
        return {
            guessedLetters: [],
            errors: 0,
            currentTerm: {},
            gameOver: false,
            hasWon: false,
        };
    },
    computed: {
        displayWord() {
            return this.currentTerm.term ? this.currentTerm.term.split('').map(letter => this.guessedLetters.includes(letter) ? letter : "_").join(" ") : "";
        },
        hangmanState() {
            const hangmanStages = [
                `
           ----
           |   |
           |
           |
           |
           |
          ----`,
                `
           ----
           |   |
           |   O
           |
           |
           |
          ----`,
                `
           ----
           |   |
           |   O
           |   |
           |
           |
          ----`,
                `
           ----
           |   |
           |   O
           |  /|
           |
           |
          ----`,
                `
           ----
           |   |
           |   O
           |  /|\\
           |
           |
          ----`,
                `
           ----
           |   |
           |   O
           |  /|\\
           |  /
           |
          ----`,
                `
           ----
           |   |
           |   O
           |  /|\\
           |  / \\
           |
          ----`,
            ];
            return hangmanStages[Math.min(this.errors, hangmanStages.length - 1)];
        },
    },
    methods: {
        resetGame() {
            this.guessedLetters = [];
            this.errors = 0;
            this.gameOver = false;
            this.hasWon = false;
            this.currentTerm = physicsTerms[Math.floor(Math.random() * physicsTerms.length)];
        },
        guessLetter(letter) {
            if (!this.guessedLetters.includes(letter)) {
                this.guessedLetters.push(letter);
                if (!this.currentTerm.term.includes(letter)) {
                    this.errors++;
                }
                this.checkGameState();
            }
        },
        checkGameState() {
            if (this.errors >= 6) {
                this.gameOver = true;
            } else if (this.currentTerm.term.split('').every(letter => this.guessedLetters.includes(letter))) {
                this.gameOver = true;
                this.hasWon = true;
            }
        },
    },
    mounted() {
        this.resetGame();
    },
};
</script>

<style scoped>
body {
    font-family: 'Inter', sans-serif;
}
</style>

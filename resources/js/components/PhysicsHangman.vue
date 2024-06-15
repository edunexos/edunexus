<template>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-r from-green-400 to-blue-500">
        <h1 class="text-5xl font-extrabold mb-6 text-white drop-shadow-lg">Physics Hangman Game</h1>
        <p class="text-2xl mb-6 text-yellow-100 drop-shadow-md">Guess the word by selecting the letters below:</p>

        <div class="mb-6 bg-white px-6 py-4 rounded-lg shadow-lg">
            <pre class="text-3xl font-mono">{{ displayWord }}</pre>
        </div>

        <div class="mb-6 bg-white px-6 py-4 rounded-lg shadow-lg">
            <pre class="text-2xl font-mono text-red-600">{{ hangmanState }}</pre>
        </div>

        <p class="text-xl mb-6 text-yellow-200">Hint: {{ currentTerm.hint }}</p>

        <VirtualKeyboard :guessedLetters="guessedLetters" @guess="guessLetter" />

        <div v-if="gameOver" class="mt-6 flex flex-col items-center">
            <p v-if="hasWon" class="text-green-300 text-2xl font-bold animate-bounce">Congratulations! You guessed the word!</p>
            <p v-else class="text-red-300 text-2xl font-bold animate-shake">Game Over! The word was: {{ currentTerm.term }}</p>
            <button @click="resetGame" class="mt-6 bg-white text-black border border-black px-4 py-2 rounded shadow-lg hover:bg-green-900 hover:text-white">Play Again</button>
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
.animate-bounce {
    animation: bounce 1s infinite;
}
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}
.animate-shake {
    animation: shake 0.5s;
}
@keyframes shake {
    0%, 100% {
        transform: translateX(0);
    }
    25% {
        transform: translateX(-5px);
    }
    75% {
        transform: translateX(5px);
    }
}
</style>

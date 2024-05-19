<template>
    <div class="container mx-auto p-6 text-center">
        <h1 class="text-4xl font-bold mb-8">Piano App</h1>
        <div class="piano flex justify-center mb-8">
            <div v-for="note in notes" :key="note" :class="[
                'tile',
                'w-12 h-48 mx-1 flex items-center justify-center rounded-lg cursor-pointer',
                {
                    'bg-gray-200': !pressedKeys.includes(note),
                    'bg-gray-400': pressedKeys.includes(note),
                }
            ]" @mousedown="handleTileClick(note)" @mouseup="handleTileRelease(note)">
                {{ note }}
            </div>
        </div>
        <select class="appearance-none border border-gray-300 rounded-md p-8 pr-10 shadow-sm mb-4"
            @change="e => composition = e.target.value">
            <option value="odeToJoy">Ode to Joy</option>
            <option value="up">Up</option>
        </select>
        <p class="mb-4">Follow the following music sequence: {{ sequences[composition].split('').join(' ') }}</p>
        <p class="mb-4">These are your inputs: {{ sheetMusic.split('').join(' ') }}</p>
        <button @click="checkSheetMusic" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-700 mb-4">
            Check
        </button>
        <div v-if="isCorrect !== null">
            <p :class="{ 'text-green-500': isCorrect, 'text-red-500': !isCorrect }" class="mb-4">
                {{ isCorrect ? 'Correct!' : 'Incorrect! Try again.' }}
            </p>
            <button @click="resetGame" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-700">
                Try Again
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            sheetMusic: '',
            isCorrect: null,
            pressedKeys: [],
            composition: 'odeToJoy',
            showSequence: true,
            notes: ['C', 'D', 'E', 'F', 'G', 'A', 'B'],
            sequences: {
                odeToJoy: 'EEFGGFEDCCDEEDDDEEFGGFEDCCDEDCC',
                up: 'CDEFGAB',
            },
            noteSounds: {
                C: new Audio('/sounds/do.wav'),
                D: new Audio('/sounds/re.wav'),
                E: new Audio('/sounds/mi.wav'),
                F: new Audio('/sounds/fa.wav'),
                G: new Audio('/sounds/sol.wav'),
                A: new Audio('/sounds/la.wav'),
                B: new Audio('/sounds/si.wav'),
            },
        };
    },
    methods: {
        handleTileClick(note) {
            this.sheetMusic += note;
            if (this.noteSounds[note]) {
                this.noteSounds[note].play();
            }
            if (!this.pressedKeys.includes(note)) {
                this.pressedKeys.push(note);
            }
        },
        handleTileRelease(note) {
            this.pressedKeys = this.pressedKeys.filter((key) => key !== note);
        },
        checkSheetMusic() {
            this.isCorrect = this.sheetMusic === this.sequences[this.composition];
        },
        resetGame() {
            this.sheetMusic = '';
            this.isCorrect = null;
            this.pressedKeys = [];
            this.showSequence = true;
            setTimeout(() => {
                this.showSequence = false;
            }, 3000);
        },
    },
    mounted() {
        const handleKeyDown = (event) => {
            const keyMappings = {
                Digit1: 'C',
                Digit2: 'D',
                Digit3: 'E',
                Digit4: 'F',
                Digit5: 'G',
                Digit6: 'A',
                Digit7: 'B',
            };
            const pressedKey = keyMappings[event.code];
            if (pressedKey && !this.pressedKeys.includes(pressedKey)) {
                this.handleTileClick(pressedKey);
            }
        };
        const handleKeyUp = (event) => {
            const keyMappings = {
                Digit1: 'C',
                Digit2: 'D',
                Digit3: 'E',
                Digit4: 'F',
                Digit5: 'G',
                Digit6: 'A',
                Digit7: 'B',
            };
            const releasedKey = keyMappings[event.code];
            if (releasedKey) {
                this.handleTileRelease(releasedKey);
            }
        };
        document.addEventListener('keydown', handleKeyDown);
        document.addEventListener('keyup', handleKeyUp);
        this.$on('hook:beforeDestroy', () => {
            document.removeEventListener('keydown', handleKeyDown);
            document.removeEventListener('keyup', handleKeyUp);
        });
    },
};
</script>

<style scoped>
.tile {
    width: 3rem;
    height: 8rem;
    margin: 0.5rem;
    background-color: #ffffff;
    border: 1px solid #000000;
    border-radius: 0.25rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: bold;
    cursor: pointer;
    user-select: none;
    box-shadow: 0 4px #ccc;
    transition: all 0.2s ease;
}

.tile.pressed {
    background-color: #ddd;
    box-shadow: 0 2px #aaa;
    transform: translateY(2px);
}

.tile.show-sequence {
    background-color: #f3f4f6;
}

</style>

<template>
    <div class="flex flex-col items-center justify-center bg-gray-100 p-4">
        <div v-if="!quizOver" class="w-full max-w-3xl">
            <transition-group name="fade" tag="div">
                <div v-for="(question, index) in paginatedQuestions" :key="index" class="mb-6">
                    <p class="text-lg font-semibold mb-2">{{ question.question }}</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <button v-for="option in question.options" :key="option"
                            @click="selectOption((currentPage - 1) * questionsPerPage + index, option)"
                            :class="['p-2 border rounded transition-colors duration-300', getOptionClass((currentPage - 1) * questionsPerPage + index, option)]">
                            {{ option }}
                        </button>
                    </div>
                </div>
            </transition-group>
            <div class="flex justify-between w-full mt-4">
                <button @click="prevPage" :disabled="currentPage === 1"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 disabled:opacity-50"> < </button>
                <div class="flex space-x-2">
                    <button v-for="page in totalPages" :key="page" @click="goToPage(page)"
                        :class="['px-3 py-1 rounded', currentPage === page ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-700']">
                        {{ page }}
                    </button>
                </div>
                <button @click="nextPage" :disabled="currentPage === totalPages"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 disabled:opacity-50"> > </button>
            </div>
            <div class="flex justify-end w-full mt-4">
                <button @click="submitQuiz"
                    class="bg-green-800 text-white px-4 py-2 rounded shadow-lg hover:bg-green-900">Submit Quiz</button>
            </div>
        </div>

        <div v-else class="text-center">
            <p class="text-2xl font-bold mb-4">Quiz Over!</p>
            <p class="text-lg mb-4">You scored {{ score }} out of {{ questions.length }}</p>
            <div class="text-left mb-4">
                <div v-for="(question, index) in questions" :key="index" class="mb-2">
                    <p>{{ question.question }}</p>
                    <p
                        :class="['your-answer', selectedOptions[index] === questions[index].answer ? 'text-blue-700' : 'text-red-700']">
                        Your answer: {{ selectedOptions[index] }}</p>
                    <p class="text-green-700">Correct answer: {{ question.answer }}</p>
                </div>
            </div>
            <button @click="resetQuiz"
                class="mt-6 bg-green-800 text-white px-4 py-2 rounded shadow-lg hover:bg-green-900">Play Again</button>
        </div>
    </div>
</template>

<script>
import Swal from 'sweetalert2';
import questions from './questions.json';

export default {
    data() {
        return {
            questions: [],
            selectedOptions: [],
            score: 0,
            quizOver: false,
            currentPage: 1,
            questionsPerPage: 3,
        };
    },
    computed: {
        totalPages() {
            return Math.ceil(this.questions.length / this.questionsPerPage);
        },
        paginatedQuestions() {
            const start = (this.currentPage - 1) * this.questionsPerPage;
            const end = start + this.questionsPerPage;
            console.log('Paginated Questions:', this.questions.slice(start, end));
            return this.questions.slice(start, end);
        }
    },
    methods: {
        loadQuestions() {
            this.questions = questions;
            this.selectedOptions = new Array(questions.length).fill(null);
            console.log('Questions loaded:', this.questions);
            console.log('Selected Options initialized:', this.selectedOptions);
        },
        selectOption(questionIndex, option) {
            this.selectedOptions.splice(questionIndex, 1, option);
            console.log(`Option selected for question ${questionIndex}:`, option);
            console.log('Current selected options:', this.selectedOptions);
        },
        getOptionClass(questionIndex, option) {
            return this.selectedOptions[questionIndex] === option ? 'bg-blue-200' : '';
        },
        getResultClass(questionIndex, option) {
            if (this.selectedOptions[questionIndex] === option) {
                return option === this.questions[questionIndex].answer ? 'text-green-700' : 'text-red-700';
            }
            return '';
        },
        submitQuiz() {
            this.score = this.questions.reduce((score, question, index) => {
                return score + (this.selectedOptions[index] === question.answer ? 1 : 0);
            }, 0);
            console.log('Final Score:', this.score);
            this.quizOver = true;

            const correctCount = this.selectedOptions.filter((option, index) => option === this.questions[index].answer).length;
            const incorrectCount = this.questions.length - correctCount;
            console.log('Correct Answers:', correctCount);
            console.log('Incorrect Answers:', incorrectCount);

            Swal.fire({
                title: 'Quiz Completed!',
                html: `You scored ${this.score} out of ${this.questions.length}<br>Correct answers: ${correctCount}<br>Incorrect answers: ${incorrectCount}`,
                icon: 'success',
                confirmButtonText: 'OK'
            });
        },
        resetQuiz() {
            this.loadQuestions();
            this.score = 0;
            this.quizOver = false;
            this.currentPage = 1;
            console.log('Quiz reset');
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
                console.log('Current Page:', this.currentPage);
            }
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
                console.log('Current Page:', this.currentPage);
            }
        },
        goToPage(page) {
            this.currentPage = page;
            console.log('Navigated to Page:', this.currentPage);
        }
    },
    mounted() {
        this.loadQuestions();
    },
};
</script>

<style scoped>
body {
    font-family: 'Inter', sans-serif;
}

button {
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #e2e8f0;
}

button.bg-green-800:hover {
    background-color: #065f46;
}

button.bg-green-800 {
    background-color: #2f855a;
    color: white;
}

button.bg-gray-500:hover {
    background-color: #4b5563;
}

button.disabled {
    background-color: gray;
    cursor: not-allowed;
}

button.bg-blue-200 {
    background-color: #bfdbfe;
    color: black;
}

button.bg-gray-200 {
    background-color: #e2e8f0;
    color: black;
}

button.bg-red-200 {
    background-color: #feb2b2;
    color: black;
}

button.bg-green-200 {
    background-color: #c6f6d5;
    color: black;
}

.bg-green-200 {
    background-color: #c6f6d5;
    color: black;
}

.bg-red-200 {
    background-color: #feb2b2;
    color: black;
}

.text-green-700 {
    color: #2f855a;
}

.text-red-700 {
    color: #c53030;
}

.text-blue-700 {
    color: #1e3a8a;
}

.your-answer {
    padding: 2px 4px;
    border-radius: 4px;
}

.correct-answer {
    padding: 2px 4px;
    border-radius: 4px;
}

.incorrect-answer {
    padding: 2px 4px;
    border-radius: 4px;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>

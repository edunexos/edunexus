import { createApp } from 'vue';
import CalendarComponent from './components/CalendarComponent.vue';
import PianoApp from './components/PianoApp.vue';
import PhysicsHangman from './components/PhysicsHangman.vue';
import HistoryQuiz from './components/HistoryQuiz.vue';

const app = createApp({});

app.component('calendar-component', CalendarComponent);
app.component('piano-app', PianoApp);
app.component('physics-hangman', PhysicsHangman);
app.component('history-quiz', HistoryQuiz);

app.mount('#app');

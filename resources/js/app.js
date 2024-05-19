import { createApp } from 'vue';
import CalendarComponent from './components/CalendarComponent.vue';
import PianoApp from './components/PianoApp.vue';
import PhysicsHangman from './components/PhysicsHangman.vue';

const app = createApp({});

app.component('calendar-component', CalendarComponent);
app.component('piano-app', PianoApp);
app.component('physics-hangman', PhysicsHangman);

app.mount('#app');

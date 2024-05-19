<template>
    <div>
        <full-calendar :events="calendarEvents" :options="calendarOptions"></full-calendar>
    </div>
</template>

<script>
import { ref } from 'vue';
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

export default {
    name: 'CalendarComponent',
    components: {
        FullCalendar
    },
    setup() {
        const calendarEvents = ref([
            { title: 'Event 1', start: '2024-05-20' },
            { title: 'Event 2', start: '2024-05-21' },
        ]);

        const calendarOptions = ref({
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            editable: true,
            selectable: true,
            dateClick: (info) => {
                alert('Date: ' + info.dateStr);
            },
            eventClick: (info) => {
                alert('Event: ' + info.event.title);
            },
        });

        return {
            calendarEvents,
            calendarOptions
        };
    }
};
</script>

<style scoped>
h1 {
    color: #4a5568;
    text-align: center;
    margin-bottom: 20px;
}
</style>

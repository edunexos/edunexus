<template>
    <div>
        <full-calendar :events="calendarEvents" :options="calendarOptions"></full-calendar>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import axios from 'axios';

export default {
    name: 'CalendarComponent',
    components: {
        FullCalendar
    },
    setup() {
        const calendarEvents = ref([]);
        const calendarOptions = ref({
            plugins: [dayGridPlugin, interactionPlugin],
            initialView: 'dayGridMonth',
            editable: true,
            selectable: true,
            dateClick: async (info) => {
                const title = prompt('Enter Event Title:');
                if (title) {
                    try {
                        const response = await axios.post('/api/events', {
                            title: title,
                            start_date: info.dateStr,
                        });
                        calendarEvents.value.push({
                            title: response.data.title,
                            start: response.data.start_date,
                            end: response.data.end_date
                        });
                    } catch (error) {
                        console.error('Error creating event:', error);
                    }
                }
            },
            eventClick: (info) => {
                alert('Event: ' + info.event.title);
            },
        });

        const loadEvents = async () => {
            try {
                const response = await axios.get('/api/events');
                calendarEvents.value = response.data.map(event => ({
                    title: event.title,
                    start: event.start_date,
                    end: event.end_date
                }));
            } catch (error) {
                console.error('Error loading events:', error);
            }
        };

        onMounted(loadEvents);

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

<template>
    <div>
        <full-calendar :events="calendarEvents" :options="calendarOptions"></full-calendar>
    </div>
</template>

<script>
import { ref, onMounted, watch } from 'vue';
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import axios from 'axios';
import Swal from 'sweetalert2';

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
                Swal.fire({
                    title: 'Enter Event Title',
                    input: 'text',
                    showCancelButton: true,
                    confirmButtonText: 'Create',
                    cancelButtonText: 'Cancel'
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        const title = result.value;
                        if (title) {
                            try {
                                const response = await axios.post('/events', {
                                    title: title,
                                    start_date: info.dateStr,
                                    end_date: info.dateStr
                                });
                                calendarEvents.value.push({
                                    title: response.data.title,
                                    start: response.data.start_date,
                                    end: response.data.end_date
                                });
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Event Created',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } catch (error) {
                                console.error('Error creating event:', error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'There was an error creating the event.'
                                });
                            }
                        }
                    }
                });
            },
            eventClick: (info) => {
                Swal.fire({
                    title: 'Event Details',
                    text: 'Event: ' + info.event.title,
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            },
        });

        const loadEvents = async () => {
            try {
                const response = await axios.get('/events');
                calendarEvents.value = response.data.map(event => ({
                    title: event.title,
                    start: event.start_date,
                    end: event.end_date
                }));
                calendarOptions.value.events = calendarEvents.value;
            } catch (error) {
                console.error('Error loading events:', error);
            }
        };

        onMounted(loadEvents);

        watch(calendarEvents, (newEvents) => {
            calendarOptions.value.events = newEvents;
        }, { immediate: true });

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

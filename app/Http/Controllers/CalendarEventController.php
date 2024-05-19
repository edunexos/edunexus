<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarEventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        $calendarEvents = $events->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        });

        return response()->json($calendarEvents);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        $calendarEvents = $events->map(function ($event) {
            return [
                'title' => $event->title,
                'start_date' => $event->start_date,
                'end_date' => $event->end_date,
            ];
        });

        return response()->json($calendarEvents);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $event = Event::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date ?? $request->start_date,
        ]);

        return response()->json($event);
    }
}

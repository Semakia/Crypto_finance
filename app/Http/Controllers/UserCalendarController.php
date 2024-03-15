<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UserCalendarController extends Controller
{
    //
    public function index()
    {
        $events = Event::latest()->take(4)->get();
        return view('user.calendar.index',compact('events'));
    }

    public function store(Request $request){}

    public function show($id){}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Place;
use App\Event;

class HomeController extends Controller
{
    public function index(){

        $places = Place::all();
        $events = Event::all()->sortByDesc('event_startdate')->take(14);

        return view('home', compact('places', 'events'));
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
    $data['Events'] = Event::orderBy('id','desc')->paginate(5);
    return view('Events.index', $data);
    }

    public function create()
    {
    return view('Events.AddEvent');
    }


    public function store(Request $request)
        {
        $request->validate([
            'ev_name' => 'required',
            'ev_describ' => 'required',
            'ev_date' => 'required',
        ]);
        $Event = new Event;
        $Event->ev_name = $request->ev_name;
        $Event->ev_describ = $request->ev_describ;
        $Event->ev_date = $request->ev_date;
        $Event->save();
        return redirect()->route('Events.index')->with('success','Company has been created successfully.');
        }




}

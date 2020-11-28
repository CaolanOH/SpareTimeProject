<?php
# @Date:   2020-11-28T10:28:32+00:00
# @Last modified time: 2020-11-28T12:56:27+00:00




namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
         $this->middleware('role:user, admin');
     }

    public function index()
    {
        $events = Event::all();
        return view('user.events.index', [
          'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required|max:191',
          'description' => 'required|max:191',
          'start_time' => 'required|date_format:H:i',
          'end_time' => 'required|date_format:H:i|after:start_time',
          'date' => 'required|date|date_format:d-m-Y',
          'commute' => 'required|max:191',
          'type' => 'required|max:191',
        ]);

        $event = new Event();
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->date = $request->input('date');
        $event->commute = $request->input('commute');
        $event->type = $request->input('type');
        $event->save();

        return redirect()->route('user.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('user.events.show', [
          'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $event = Event::findOrFail($id);

      return view('user.events.edit', [
        'event' => $event
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required|max:191',
        'description' => 'required|max:191',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
        'date' => 'required|date|date_format:d-m-Y',
        'commute' => 'required|max:191',
        'type' => 'required|max:191',
      ]);

      $event = Event::findOrFail($id);

      $event->name = $request->input('name');
      $event->description = $request->input('description');
      $event->start_time = $request->input('start_time');
      $event->end_time = $request->input('end_time');
      $event->date = $request->input('date');
      $event->commute = $request->input('commute');
      $event->type = $request->input('type');
      $event->save();

      return redirect()->route('user.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('user.events.index');
    }
}

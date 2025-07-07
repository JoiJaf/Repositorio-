<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use App\Models\UserSpecific;

class EventController extends Controller
{
    public function index()
    {

        $events = Event::select(
            'events.id',
            'events.title',
        )->orderBy('created_at', 'asc')
        ->paginate(10);

        $total = count(Event::all());

        return view('events.index', compact('events', 'total'));

    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tag_id' => 'required',
            'course_id' => 'required',
            'user_specific_id' => 'required',
            'title' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'description' => 'required|string',
            'status' => 'required|string',
            'finish_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public\images', $imageName); 

            
            $validatedData['image'] = $imageName;
        }

        $event = Event::create($validatedData);

        return redirect()->route('events.index');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);

    $validatedData = $request->validate([
        'tag_id' => 'required',
        'course_id' => 'required',
        'user_specific_id' => 'required',
        'title' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
        'description' => 'required|string',
        'status' => 'required|string',
        'finish_date' => 'required|date',
    ]);

    
    if ($request->hasFile('image')) {
       
        if ($event->image) {
            Storage::delete('public/storage/images/' . $event->image);
        }

        
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        $validatedData['image'] = $imageName;
    }

    $event->update($validatedData);

    return redirect()->route('events.index');
}

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index');
    }

    public function listEvents($id)
    {
        // $users = UserSpecific::select('id')->where('id', $id)->get();
        // foreach ($users as $event) {
        //     $events=Event::where('user_specific_id', $event->id)->select('title')->get();
        //     $event->$event = $events;
        // }
        // return $users;

        $events = Event::where('user_specific_id', $id)->get();
        return $events;
    }

    public function specificEvent($id)
    {
        // $users = UserSpecific::select('id')->where('id', $id)->get();
        // foreach ($users as $event) {
        //     $events=Event::where('user_specific_id', $event->id)->select('title')->get();
        //     $event->$event = $events;
        // }
        // return $users;

        $events = Event::where('id', $id)->get();
        return $events;
    }      

}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateEvent;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');

        if($search)
        {
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }
        else
        {
             $events = Event::all();
        }
        return view('welcome',['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(StoreUpdateEvent $request)
    {

        $event = new Event;

        $event->evento = $request->evento;
        $event->data = $request->data;
        $event->cidade = $request->cidade;
        $event->private = $request->private;
        $event->descrição = $request->descrição;
        $event->items = $request->items;


        // Image Upload
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;
            $extension = $requestImagem->extension();
            $imagemName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImagem->move(public_path('/public/img/events'), $imagemName);
            $event->imagem = $imagemName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();
        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $user = auth()->user();

        $hasUserJoined = false;

        if($user){

            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent)
            {
                if($userEvent['id'] == $id) {

                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard()
    {
        $user = auth()->user();

        $eventsAsParticipant = $user->eventsAsParticipant;

        $events = $user->events;

        return view('events.dashboard',
             ['events' => $events, 'eventsAsParticipant' =>$eventsAsParticipant]);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id){

        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    public function update(StoreUpdateEvent $request)
    {
        Event::findOrFail($request->id)->update($request->all());
        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');

    }

    public function joinEvent($id)
    {
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento: ' . $event->evento);
    }

    public function leaveEvent($id){
        $user =auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento: ' . $event->evento);

    }
}

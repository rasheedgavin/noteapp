<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;


class NoteController extends Controller
{
    public function index(){
        $notes = Note::all();
        return view('notes.index', ['notes' => $notes]);
    }

    public function create(){

        return view('notes.create-notes');
    }

    public function save(Request $request){
        $data = $request->validate([
            'title' => 'nullable|string|max:200',
            'notes' => 'required|string|min:1|max:10000'
        ]);

        $data['title'] = $data['title'] ?? 'Untitled';

        $newNote = Note::create($data);

        return redirect(route('notes.save'))->with('success', 'created succesfully');
    }
    
    public function view(Note $note){
        return view('notes.view-notes', ['note' => $note]);
    }

    public function edit(Note $note){
        return view('notes.edit-notes', ['note' => $note]);
    }

    public function update(Note $note, Request $request){
        $data = $request->validate([
            'title' => 'nullable|string|max:20',
            'notes' => 'required|string|min:1|max:10000'
        ]);

        $data['title'] = $data['title'] ?? 'Untitled';
        
        $note->update($data);

        return redirect(route('notes.index'))->with('success', 'update succesfully');

    }

    public function delete(Note $note){
        $note->delete();
        
        return redirect(route('notes.index'))->with('success', 'deleted succesfully');

    }

}


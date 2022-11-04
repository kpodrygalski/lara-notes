<?php

namespace App\Http\Controllers\Views;

use App\Models\Note;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteViewController extends Controller
{
    public function notesIndex()
    {
        $notes = Note::all(['id', 'title', 'is_completed']);

        return Inertia::render('Views/NotesView', [
            'notes' => $notes
        ]);
    }

    public function showNoteById()
    {
        return Inertia::render('Views/SingleNote');
    }

    public function about()
    {
        return Inertia::render('Views/About');
    }
}

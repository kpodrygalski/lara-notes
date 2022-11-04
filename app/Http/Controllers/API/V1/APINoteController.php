<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNoteRequest;
use Symfony\Component\HttpFoundation\Response;

class APINoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        // READ ALL
        // SELECT * FROM notes;
        $notes = Note::all(['id', 'title', 'is_completed']);

        // $notes = Note::query();

        // ?title=asjdhuiasndjiausdihusdhbndoiasdpaos%asdoiauinf=%
        // if ($request->has('title')) {
        //     $title = $request->get('title');
        //     $notes->where('title', 'LIKE', '%' . $title . '%');
        // }

        return response()->json([
            'notes' => $notes
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteRequest $request): JsonResponse
    {
        // CREATE
        // INSERT INTO ...
        $note = Note::create([
            'title' => $request->title,
            'is_completed' => $request->is_completed
        ]);

        return response()->json([
            'note' => $note
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Note $note
     * @return JsonResponse
     */
    public function show(Note $note): JsonResponse
    {
        // dd($note);
        // READ ONE
        // SELECT * FROM notes WHERE ID = $note->id;
        // 404 - jeśli nie znajdzie nic w bazie

        return response()->json([
            'note' => $note->only(['id', 'title', 'is_completed'])
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Note $note
     * @return JsonResponse
     */
    public function update(Request $request, Note $note): JsonResponse
    {
        // UPDATE - aktualizuj wszystko
        $note->update([
            'title' => $request->title,
            'is_completed' => $request->is_completed
        ]);

        return response()->json([
            'updatedNote' => $note,
        ], Response::HTTP_OK);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Note $note
     * @return void
     */
    public function destroy(Note $note)
    {
        // DELETE
        $id = $note->id;
        $note->delete();

        return response()->json([
            'message' => 'Note with ID = ' . $id . ' was deleted.'
        ], Response::HTTP_NO_CONTENT);
    }
}

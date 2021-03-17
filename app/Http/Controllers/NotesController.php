<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use Symfony\Component\HttpFoundation\Response;

class NotesController extends Controller
{
    public function view(){
        return view('index');
    }

    public function get_notes_data(Request $request){
        $note = Notes::latest()->paginate(5);

        return $request->ajax() ?
            response()->json($note, Response::HTTP_OK)
            : abort(404);
    }

    public function store(Request $request){
        Notes::updateOrCreate(
            ['id' => $request->id],
            ['title' => $request->title, 'description' => $request->description]
        );

        return response()->json(
            ['success'=>true, 'message'=>'Note created successfully']
        );
    }

    public function update($id) {
        $note = Notes::find($id);

        return response()->json(['data' => $note]);
    }

    public function destroy($id) {
        $note = Notes::find($id);
        $note->delete();

        return response()->json(['message'=>'Note deleted']);
    }

}

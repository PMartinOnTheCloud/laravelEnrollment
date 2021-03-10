<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Term;

class TermController extends Controller
{
    public function show() {
        return response()->json(Term::all());
    }

    public function getTerm($id) {
        if (Term::where('id', $id)->exists()) {
            $book = Term::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
        } else {
            return response()->json([
              "message" => "El curso no se ha encontrado."
            ], 404);
        }
    }

    public function create(Request $request) {
        $term = new Term;
        $term->name = $request->name;
        $term->description = $request->description;
        $term->active = $request->active;
        $term->start = $request->start;
        $term->end = $request->end;

        return response()->json([
            "message" => "El curso ha sido creado correctamente."
        ], 201);
    }

    public function update(Request $request, $id) {
        if(Term::where('id', $id)->exists()) {
            $term = Term::find($id);

            $term->name = is_null($request->name) ? $request->name : $term->name;
            $term->description = is_null($request->description) ? $request->description : $term->description;
            $term->active = is_null($request->active) ? $request->active : $term->active;
            $term->start = is_null($request->start) ? $request->start : $term->start;
            $term->end = is_null($request->end) ? $request->end : $term->end;

            $term->save();

            return response()->json([
              "message" => "El curso se ha guardado."
            ], 200);
        } else {
            return response()->json([
              "message" => "El curso no se ha encontrado."
            ], 404);
        }
    }

    public function delete($id) {
        if(Term::where('id', $id)->exists()) {
            $term = Term::find($id);
            $term->delete();

            return response()->json([
              "message" => "Se ha eliminado el curso #".$id
            ], 202);

        } else {
            return response()->json([
              "message" => "El curso no se ha encontrado."
            ], 404);
        }
    }
}

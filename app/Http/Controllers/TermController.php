<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\User;

class TermController extends Controller
{
    public function index(Request $request) {
        $data = ['status' => '403'];
        $token = $request->header('token');
        if(!empty($token)) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if($user['token'])
                $data = Term::select("*")->get();
        }
        return response()->json($data);
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

    public function update(Request $request, Term $term) {
        $data = ['status' => '403'];
        $token = $request->header('token');
        if(!empty($token)) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if($user['token']) {
                $term->name = $request->name;
                $term->description = $request->desc;
                $term->start = $request->start;
                $term->end = $request->end;
                $term->updated_at = $request->updated;

                if($term->save()) {
                    $data = ['status' => '200', 'message' => 'El curso se ha actualizado.'];
                }
            }
        }

        return response()->json($data);
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

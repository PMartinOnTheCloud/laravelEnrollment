<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\User;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ['status' => '403'];
        $token = $request->header('token');
        if(!empty($token)) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if($user['token']) {
                $data = Term::select("*")->get();
            }
        }

        return response()->json($data);
    }

    /**
     * Show data to show options.
     *
     * @return \Illuminate\Http\Response
     */
    public function showoptions(Request $request)
    {
        $data = ['status' => '403'];
        $token = $request->header('token');
        if(!empty($token)) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if($user['token']) {
                $data = Term::select('id', 'name')->get();
            }
        }

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = ['status' => '403'];
        $token = $request->header('token');
        if(!empty($token)) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if($user['token']) {
                if($request->start < $request->end) {
                    if(Term::create($request->all())) {
                        $data = ['status' => '200', 'message' => 'El curso se ha añadido.'];
                    }
                } else {
                    $data = ['status' => '404', 'message' => 'El curso no se ha podido añadir debido a que la fecha de comenzar debe de ser inferior a la de finalizar.'];
                }
            }
        }

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = ['status' => '403'];
        $token = $request->header('token');
        if(!empty($token)) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if($user['token']) {

                if(Term::whereId($id)->update($request->all())) {
                    $data = ['status' => '200', 'message' => 'El curso se ha actualizado.'];
                }
            }
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = ['status' => '403'];
        $token = $request->header('token');
        if(!empty($token)) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if($user['token']) {
                if(Term::whereId($id)->delete()) {
                    $data = ['status' => '200', 'message' => 'El curso se ha eliminado.'];
                }
            }
        }

        return response()->json($data);
    }
}

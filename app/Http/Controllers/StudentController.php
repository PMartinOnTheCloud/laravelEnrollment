<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
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
            if($user['token'])
                $data = User::select("*")->where('role', 'alumn')->get();
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
                if(User::create($request->all())) {
                    $data = ['status' => '200', 'message' => 'El estudiante se ha añadido.'];
                }
            }
        }

        return response()->json($data);
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
                if(User::whereId($id)->update($request->all())) {
                    $data = ['status' => '200', 'message' => 'El estudiante se ha actualizado.'];
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
                if(User::whereId($id)->update(['active' => 0])) {
                    $data = ['status' => '200', 'message' => 'El estudiante se ha eliminado.'];
                }
            }
        }

        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\User;

class CareerController extends Controller
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
            $user = User::select('id', 'token')->where('token', $token)->get()[0];
            if($user['token']) {
                Log::channel('logapp')->notice('Ha solicitado mostrar todos los ciclos', ['user_id' => $user['id']]);
                $data = Career::select("*")->get();
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
            $user = User::select('id', 'token')->where('token', $token)->get()[0];
            if($user['token']) {
                if(Career::create($request->all())) {
                    Log::channel('logapp')->notice('Ha agregado un nuevo ciclo', ['user_id' => $user['id']]);
                    $data = ['status' => '200', 'message' => 'El ciclo se ha añadido.'];
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
            $user = User::select('id', 'token')->where('token', $token)->get()[0];
            if($user['token']) {
                if(Career::whereId($id)->update($request->all())) {
                    Log::channel('logapp')->notice('Ha actualizado el ciclo #'. $id, ['user_id' => $user['id']]);
                    $data = ['status' => '200', 'message' => 'El ciclo se ha actualizado.'];
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
            $user = User::select('id', 'token')->where('token', $token)->get()[0];
            if($user['token']) {
                if(Career::whereId($id)->delete()) {
                    Log::channel('logapp')->notice('Ha borrado el ciclo #'. $id, ['user_id' => $user['id']]);
                    $data = ['status' => '200', 'message' => 'El ciclo se ha eliminado.'];
                }
            }
        }

        return response()->json($data);
    }
}

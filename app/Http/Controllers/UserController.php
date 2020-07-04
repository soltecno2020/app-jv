<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;
use Exception;
use carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2|max:45|string',
                'email' => 'required|min:2|max:45|string',
                'password' => 'required|min:2|max:45|string',
                'username' => 'required|min:2|max:45|string',
                'apellido' => 'required|min:2|max:45|string',
                'telefono' => 'required|min:2|integer',
                'rut' => 'required|min:2|max:45|String',
                'fecha_nacimiento' => 'required|date',
                'vivienda_id' => 'required|numeric',
                'estado' => 'required|numeric',
            ]);
            if($validator->fails()){
                Session::flash('error', 'Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect('usuarios/create')
                            ->withErrors($validator)
                            ->withInput();
            }            
            $usuarios = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'username' => $request->username,
                'apellido'  => $request->apellido,
                'telefono'=> $request->telefono,
                'rut'   => $request->rut,
                'fecha_nacimiento' => Carbon::parse($request->fecha_nacimiento)->format('Y-m-d'), 
                'vivienda_id' => $request->vivienda_id,
                'estado' => $request->estado,
            ]);
            Session::flash('success', 'Acabas de crear una vivienda "'.strtoupper($request->username).'" exitosamente!');
            return redirect()->route('viviendas.index');
        }catch(Exception $e){
            dd($e->getMessage());
            Session::flash('error', 'Ha ocurrido un error');
            return redirect('eventos/create')
            ->withErrors($validator)
            ->withInput();
        }
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
        $usuarios = User::find($id);
        return view('usuarios.edit', compact('usuarios'));
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
         try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2|max:45|string',
                'email' => 'required|min:2|max:45|string',
                'password' => 'required|min:2|max:45|string',
                'username' => 'required|min:2|max:45|string',
                'apellido' => 'required|min:2|max:45|string',
                'telefono' => 'required|min:2|integer',
                'rut' => 'required|min:2|max:45|String',
                'fecha_nacimiento' => 'required|min:2|max:45|date',
                'vivienda_id' => 'required|numeric',
                'estado' => 'required|numeric',
            ]);
            if($validator->fails()){
                Session::flash('error', 'Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect()->route('usuarios.edit', $id)
                            ->withErrors($validator)
                            ->withInput();
            }
            $usuarios = User::find($id);
            $usuarios->name = $request->name;
            $usuarios->email = $request->email;
            $usuarios->password = $request->password;
            $usuarios->username = $request->username;
            $usuarios->apellido = $request->apellido;
            $usuarios->username = $request->username;
            $usuarios->telefono = $request->telefono;
            $usuarios->rut = $request->rut;
            $usuarios->fecha_nacimiento = Carbon::parse($request->fecha_nacimiento)->format('Y-m-d');      
            $usuarios->vivienda_id = $request->vivienda_id;
            $usuarios->estado = $request->estado;
            $usuarios->save();            
            Session::flash('success', 'Acabas de actualizar el usuario "'.strtoupper($request->name).'" exitosamente!');
            return redirect()->route('usuarios.index');
        }catch(Exception $e){
            dd($e->getMessage());
            Session::flash('error', 'Ha ocurrido un error.');
            return redirect('usuarios/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function cambiarEstado(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric',
            ]);
            if($validator->fails()){
                return response()->json([
                    'code' => 400,
                    'message' => 'error',
                    'data' => $validator->messages()
                ]);
            }
            $usuarios = Viviendas::find($request->id);
            $estado = $usuarios->estado == 1 ? 2 : 1;
            $usuarios->estado = $estado;
            $usuarios->save();        
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'usuarios' => $usuarios
            ]);
        }catch(Exception $e){
            return response()->json([
                'code' => 401,
                'message' => 'error',
                'data' => 'Ha ocurrido un error.'
            ]);
        }
    } 
}

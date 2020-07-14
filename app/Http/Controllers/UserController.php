<?php

namespace App\Http\Controllers;

use App\Viviendas;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;
use Hash;
use carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $viviendas = Viviendas::all();
        $usuarios = User::with('viviendas')->get();;
        return view('usuarios.index', compact('usuarios','viviendas'));
    }

    public function create()
    {   
        $viviendas = Viviendas::all();
        return view('usuarios.create',compact('viviendas'));
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2|max:45|string',
                'email' => 'required|min:2|max:45|string|unique:users',
                'password' => 'required|min:2|max:45|string|confirmed',
                'username' => 'required|min:2|max:45|string',
                'apellido' => 'required|min:2|max:45|string',
                'telefono' => 'required|min:2|integer',
                'rut' => 'required|min:2|max:45|String',
                'fecha_nacimiento' => 'required|date',
                'vivienda_id' => 'required|numeric',
                'estado' => 'required|numeric',
            ],
            [
                'name.required' => 'Debe ingresar un nombre',
                'email.required' => 'Debe ingresar un email',
                'telefono.integer' => 'Debe ingresar un numero ej:56940321',
                'username.required' => 'Debe ingresar un nombre de usuario',
                'apellido.required' => 'Debe ingresar un apellido',
                'fecha_nacimiento.required' => 'Debe ingresar una fecha de nacimiento',
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
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'apellido'  => $request->apellido,
                'telefono'=> $request->telefono,
                'rut'   => $request->rut,
                'fecha_nacimiento' => Carbon::parse($request->fecha_nacimiento)->format('Y-m-d'), 
                'vivienda_id' => $request->vivienda_id,
                'estado' => $request->estado,
            ]);
            Session::flash('success', 'Acabas de crear una usuario "'.strtoupper($request->username).'" exitosamente!');
            return redirect()->route('usuarios.index');
        }catch(Exception $e){
            dd($e->getMessage());
            Session::flash('error', 'Ha ocurrido un error');
            return redirect('eventos/create')
            ->withErrors($validator)
            ->withInput();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $viviendas = Viviendas::all();
        $usuarios = User::find($id);
        return view('usuarios.edit', compact('usuarios','viviendas'));
    }

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
                'fecha_nacimiento' => 'required|min:2|max:45|date',
                'vivienda_id' => 'required|numeric',
                'estado' => 'required|numeric',
                'rut' =>['required',
                          'string',
                          'max:20',
                          'unique:users',
                          function ($attribute, $value, $fail){
                            $validarRut = $this->valida_rut($value);
                            if(!$validarRut){
                                $fail('Ingrese un rut valido.');
                            }
                          },
                        ],
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
            $usuarios = User::find($request->id);
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

        function valida_rut($rut)
        {
            try{
                $rut = preg_replace('/[*k0-9]/i', '',$rut);
                $dv = substr($rut, -1);
                $numero = substr($rut, 0, strlen($rut)-1);
                $i = 2;
                $suma =0;
                foreach (array_reverse(str_split($numero)) as $v)
                {
                    if($i==8)
                        $i = 2;
                    $suma +=$v * $i;
                    ++$i;
                }
                $dvr = 11 - ($suma % 11);
                if($dvr ==11)
                    $dvr =0;
                if($dvr ==10)
                    $dvr ='K';
                if($dvr == strcasecmp($dv))
                    return true;
                else
                    return false;
            }catch(Exception $e){
                return false;
            }
        }    
    } 
}

<?php

namespace App\Http\Controllers;

use App\TipoConsultas;
use App\FormulariosContactos;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;

class FormulariosContactosController extends Controller
{
    
    public function index()
    {
        $tipoConsultas = TipoConsultas::all();        
        $formularioContactos = FormulariosContactos::with('tipoConsulta')->get();
        

        return view('formularios-contactos.index', compact('formularioContactos','tipoConsultas'));
    }

    public function create()
    {
        $tipoConsultas = TipoConsultas::all();
        return view('formularios-contactos.create',compact('tipoConsultas'));
    }

    public function store(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'tipo_consultas_id' => 'required|numeric|not_in:0',
                'descripcion' => 'required|min:2|max:45|string',
                'estado' => 'required|numeric',
            ],
            [
                'tipo_consultas_id.not_in' => 'Debe seleccionar un tipo de consulta',
                'descripcion.required' => 'Debe ingresar una descripción'
            ]);
            if($validator->fails()){
                //dd($validator);
                Session::flash('error', 'Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect('formularioscontactos/create')
                ->withErrors($validator)
                ->withInput();
            }
            $formulariocontacto = formularioscontactos::create([
                'tipo_consultas_id'    => $request->tipo_consultas_id,
                'descripcion'    => $request->descripcion,
                'estado'    => $request->estado,
            ]);
            Session::flash('success', 'Acabas de enviar su formulario "'.strtoupper($request->descripcion).'" exitosamente!');
            return redirect()->route('formularioscontactos.index');
        }catch(Exception $e){
            dd($e->getMessage());
            Session::flash('error', 'Ha ocurrido un error');
            return redirect('formularioscontactos/create')
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
        $tipoConsultas = TipoConsultas::all();
        $formularioContactos = FormulariosContactos::find($id);
        return view('formularios-contactos.edit', compact('formularioContactos','tipoConsultas'));
    }

    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'tipo_consultas_id' => 'required|numeric|not_in:0',
                'descripcion' => 'required|min:2|max:45|string',
                'estado' => 'required|numeric',
            ],
            [
                'tipo_consultas_id.not_in' => 'Debe seleccionar un tipo de consulta',
                'descripcion.required' => 'Debe ingresar una descripción'
            ]);
            if($validator->fails()){
                Session::flash('error', 'Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect()->route('formularioscontactos.edit', $id)
                ->withErrors($validator)
                ->withInput();
            }
            $formularioContactos = FormulariosContactos::find($id);
            $formularioContactos->tipo_consultas_id = $request->tipo_consultas_id;
            $formularioContactos->descripcion = $request->descripcion;           
            $formularioContactos->estado = $request->estado;
            $formularioContactos->save();            
            Session::flash('success', 'Acabas de actualizar el el formulario "'.strtoupper($request->descripcion).'" exitosamente!');
            return redirect()->route('formularioscontactos.index');
        }catch(Exception $e){
            Session::flash('error', 'Ha ocurrido un error.');
            return redirect('formularioscontactos/edit')
            ->withErrors($validator)
            ->withInput();
        }
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
            $formularioscontactos = FormulariosContactos::find($request->id);
            $estado = $formularioscontactos->estado == 1 ? 2 : 1;
            $formularioscontactos->estado = $estado;
            $formularioscontactos->save();        
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'eventos' => $formularioscontactos
            ]);
        }catch(Exception $e){
            return response()->json([
                'code' => 401,
                'message' => 'error',
                'data' => 'Ha ocurrido un error.'
            ]);
        }
    }  

    public function destroy($id)
    {
        //
    }
}

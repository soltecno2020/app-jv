<?php

namespace App\Http\Controllers;

use App\TipoEventos;
use App\Eventos;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;
use carbon\Carbon;
use Auth;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Super Administrador');
    }

    public function index()
    {
        $tipoEventos = TipoEventos::all();        
        $eventos = Eventos::with('tipoEvento')->get();
        //dd($eventos[0]->tipoEvento->nombre);
        
        return view('eventos.index', compact('eventos','tipoEventos'));
    }

    public function create()
    {
        $tipoEventos = TipoEventos::all();
        return view('eventos.create',compact('tipoEventos'));
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|min:2|max:45|string',
                'titulo' => 'required|min:2|max:20|string',
                'descripcion_corta' => 'required|min:2|max:200|string',
                'descripcion_larga' => 'required|min:2|max:5000|string',
                'fecha_inicio' => 'required|date',
                'fecha_termino' => 'required|date',
                'hora_inicio' => 'required|date_format:H:i',
                'hora_termino' => 'required|date_format:H:i',
                'lugar' => 'required|min:2|max:50|string',
                'estado' => 'required|numeric',
                'tipo_evento' => 'required|numeric|not_in:0',
            ],
            [
                'nombre.required' => 'Debe ingresar un nombre',
                'titulo.required' => 'Debe ingresar un titulo',
                'descripcion_corta.required' => 'Debe ingresar una descripcion corta',
                'descripcion_larga.required' => 'Debe ingresar una descripcion larga',
                'fecha_inicio.required' => 'Debe ingresar una fecha de inicio',
                'fecha_termino.required' => 'Debe ingresar una fechad e termino',
                'hora_inicio.required' => 'Debe ingresar una hora de inicio',
                'hora_inicio.date_format' => 'Debe ingresar un formato de hora valido',
                'hora_termino.required' => 'Debe ingresar una hora de termino',
                'hora_termino.date_format' => 'Debe ingresar un formato de hora valido',
                'lugar.required' => 'Debe ingresar un lugar de encuentro',
                'tipo_evento.not_in' => 'Debe seleccionar un tipo de evento',
            ]);
            if($validator->fails()){
                Session::flash('error', 'Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect('eventos/create')
                ->withErrors($validator)
                ->withInput();
            }
            $eventos = eventos::create([
                'nombre'    => $request->nombre,
                'titulo'    => $request->titulo,
                'descripcion_corta'    => $request->descripcion_corta,
                'descripcion_larga'    => $request->descripcion_larga,
                'fecha_inicio'    => Carbon::parse($request->fecha_inicio)->format('Y-m-d'),
                'fecha_termino'    => Carbon::parse($request->fecha_termino)->format('Y-m-d'),
                'hora_inicio'    => Carbon::parse($request->hora_inicio)->format('H:i:s'),
                'hora_termino'    =>  Carbon::parse($request->hora_termino)->format('H:i:s'),
                'lugar'    => $request->lugar,
                'estado'    => $request->estado,
                'tipo_eventos_id'    => $request->tipo_evento,
                'user_created_id'    => 1,
                'user_updated_id'    => 1,
            ]);
            Session::flash('success', 'Acabas de crear un evento "'.strtoupper($request->titulo).'" exitosamente!');
            return redirect()->route('eventos.index');
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
        $tipoEventos = TipoEventos::all();
        $eventos = Eventos::find($id);
        return view('eventos.edit', compact('eventos','tipoEventos'));
    }

    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|min:2|max:45|string',
                'titulo' => 'required|min:2|max:20|string',
                'descripcion_corta' => 'required|min:2|max:200|string',
                'descripcion_larga' => 'required|min:2|max:5000|string',
                'fecha_inicio' => 'required|date',
                'fecha_termino' => 'required|date',
                'hora_inicio' => 'required|date_format:H:i',
                'hora_termino' => 'required|date_format:H:i',
                'lugar' => 'required|min:2|max:50|string',
                'estado' => 'required|numeric',
                'tipo_evento' => 'required|numeric|not_in:0',
            ],
            [
                'nombre.required' => 'Debe ingresar un nombre',
                'titulo.required' => 'Debe ingresar un titulo',
                'descripcion_corta.required' => 'Debe ingresar una descripcion corta',
                'descripcion_larga.required' => 'Debe ingresar una descripcion larga',
                'fecha_inicio.required' => 'Debe ingresar una fecha de inicio',
                'fecha_termino.required' => 'Debe ingresar una fechad e termino',
                'hora_inicio.required' => 'Debe ingresar una hora de inicio',
                'hora_inicio.date_format' => 'Debe ingresar un formato de hora valido',
                'hora_termino.required' => 'Debe ingresar una hora de termino',
                'hora_termino.date_format' => 'Debe ingresar un formato de hora valido',
                'lugar.required' => 'Debe ingresar un lugar de encuentro',
                'tipo_evento.not_in' => 'Debe seleccionar un tipo de evento',
            ]);
            if($validator->fails()){
                Session::flash('error', 'Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect()->route('eventos.edit', $id)
                ->withErrors($validator)
                ->withInput();
            }
            $eventos = Eventos::find($id);
            $eventos->nombre = $request->nombre;
            $eventos->titulo = $request->titulo;
            $eventos->descripcion_corta = $request->descripcion_corta;
            $eventos->descripcion_larga = $request->descripcion_larga;
            $eventos->fecha_inicio = Carbon::parse($request->fecha_inicio)->format('Y-m-d');
            $eventos->fecha_termino = Carbon::parse($request->fecha_termino)->format('Y-m-d');
            $eventos->hora_inicio = Carbon::parse($request->hora_inicio)->format('H:i:s');
            $eventos->hora_termino = Carbon::parse($request->hora_termino)->format('H:i:s');
            $eventos->lugar = $request->lugar;
            $eventos->estado = $request->estado;
            $eventos->tipo_eventos_id = $request->tipo_evento;
            $eventos->user_updated_id = 1;
            $eventos->save();            
            Session::flash('success', 'Acabas de actualizar el evento "'.strtoupper($request->titulo).'" exitosamente!');
            return redirect()->route('eventos.index');
        }catch(Exception $e){
            Session::flash('error', 'Ha ocurrido un error.');
            return redirect('eventos/edit')
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
            $eventos = Eventos::find($request->id);
            $estado = $eventos->estado == 1 ? 2 : 1;
            $eventos->estado = $estado;
            $eventos->save();        
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'eventos' => $eventos
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

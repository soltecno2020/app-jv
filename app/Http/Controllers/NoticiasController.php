<?php

namespace App\Http\Controllers;

use App\Noticias;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;

class NoticiasController extends Controller
{
    public function index()
    {
        $noticias = Noticias::all();
        return view('noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'titulo' => 'required|min:2|max:50|string',
                'descripcion_corta' => 'required|min:2|max:100|string',
                'descripcion_larga' => 'required|min:2|max:10000|string',
                'estado' => 'required|numeric',
            ]);
            if($validator->fails()){
                Session::flash('error', 'Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect('noticias/create')
                ->withErrors($validator)
                ->withInput();
            }            
            $noticias = noticias::create([
                'titulo'    => $request->titulo,
                'descripcion_corta'    => $request->descripcion_corta,
                'descripcion_larga'    => $request->descripcion_larga,
                'estado'    => $request->estado,
                'user_created_id'    => 1,
                'user_updated_id'    => 1,
            ]);
            Session::flash('success', 'Acabas de crear una noticia "'.strtoupper($request->titulo).'" exitosamente!');
            return redirect()->route('noticias.index');
        }catch(Exception $e){
            Session::flash('error', 'Ha ocurrido un error');
            return redirect('noticias/create')
            ->withErrors($validator)
            ->withInput();
        }
    }

    public function show($id)
    {
        $noticias = Noticias::paginate(2);
        return view('noticias.show', compact('noticias'));
    }

    public function edit($id)
    {
        $noticias = Noticias::find($id);
        return view('noticias.edit', compact('noticias'));
    }

    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'titulo' => 'required|min:2|max:50|string',
                'descripcion_corta' => 'required|min:2|max:100|string',
                'descripcion_larga' => 'required|min:2|max:10000|string',
                'estado' => 'required|numeric',
            ]);
            if($validator->fails()){
                Session::flash('error', 'Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect()->route('noticias.edit', $id)
                ->withErrors($validator)
                ->withInput();
            }
            $noticias = Noticias::find($id);
            $noticias->titulo = $request->titulo;
            $noticias->descripcion_corta = $request->descripcion_corta;
            $noticias->descripcion_larga = $request->descripcion_larga;
            $noticias->estado = $request->estado;
            $noticias->user_updated_id = 1;
            $noticias->save();            
            Session::flash('success', 'Acabas de actualizar la noticia "'.strtoupper($request->titulo).'" exitosamente!');
            return redirect()->route('noticias.index');
        }catch(Exception $e){
            Session::flash('error', 'Ha ocurrido un error.');
            return redirect('noticias/edit')
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
            $noticias = Noticias::find($request->id);
            $estado = $noticias->estado == 1 ? 2 : 1;
            $noticias->estado = $estado;
            $noticias->save();        
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'noticias' => $noticias
            ]);
        }catch(Exception $e){
            return response()->json([
                'code' => 401,
                'message' => 'error',
                'data' => 'Ha ocurrido un error.'
            ]);
        }
    }  
    
    public function mostrar()
    {
        $noticias = Noticias::paginate(2);
        return view('noticias.mostrar', compact('noticias'));
    }
}

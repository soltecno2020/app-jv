<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Validator;

class ImagenesController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function subirImagen(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);

            if (!$validator->passes()) {
                return response()->json([
                    'code' => 401,
                    'message' => 'error',
                    'data' => $validator->messages()
                ]);            
            }
            $imagen = $request->file('imagen');
            $nombreImagen = time().'.'.$imagen->extension();
            if(config('app.ambiente') == 'desarrollo'){
                $imagen->move('imagenes/noticias/temp/', $nombreImagen);
                return response()->json([
                    'code' => 200,
                    'message' => 'success',
                    'nombre' => $nombreImagen,
                    'ruta' => 'imagenes/noticias/temp/',
                    'nombreOrigen' => $imagen->getClientOriginalName()
                ]);
            }else{
                $imagen->move('../../public_html/darwin/imagenes/noticias/temp/', $nombreImagen);
                return response()->json([
                    'code' => 200,
                    'message' => 'success',
                    'nombre' => $nombreImagen,
                    'ruta' => 'imagenes/noticias/temp/',
                    'nombreOrigen' => $imagen->getClientOriginalName()
                ]);
            }
        }catch(Exception $e){
            return response()->json([
                'code' => 400,
                'message' => 'error',
                'data' => $e->getMessage()
            ]);
        }
    }
}

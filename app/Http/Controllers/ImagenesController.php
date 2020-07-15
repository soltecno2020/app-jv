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

    /*public function subirImagen(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            if($validator->fails()){
                return response()->json([
                    'code' => 405,
                    'message' => 'error',
                    'data' => $validator->messages()
                ]);
            }
            $input = $request->all();
            $input['image'] = time().'.'.$request->image->extension();
            $request->image->move(storage_path().'/imagenes/noticias/temp/', $input['image']);
            return response()->json([
                'code' => 405,
                'message' => 'error',
                'data' => $request->all()
            ]);
            if ($request->hasFile('imagen')) {
                $file = $request->file('imagen');
                $name = time().$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension(); 
                $file->move(storage_path().'/imagenes/noticias/temp/',$name);
                return response()->json([
                    'code' => 200,
                    'message' => 'success'
                ]);
            }            
        }catch(Exception $e){
            return response()->json([
                'code' => 400,
                'message' => 'error',
                'data' => $e->getMessage()
            ]);
        }
    }*/

    public function subirImagen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


      if ($validator->passes()) {
        $input = $request->all();
        $input['image'] = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $input['image']);
        return response()->json(['success'=>'done']);
      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }
}

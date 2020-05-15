<?php

namespace App\Http\Controllers;

use App\TipoEventos;
use Illuminate\Http\Request;

class TipoEventosController extends Controller
{
    public function index()
    {
        $tipoEventos = TipoEventos::all();
        return view('tipo-eventos.index', compact('tipoEventos'));
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
}

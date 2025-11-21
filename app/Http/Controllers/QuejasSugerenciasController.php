<?php

namespace App\Http\Controllers;

use App\Models\QuejasSugerencias;
use Illuminate\Http\Request;

class QuejasSugerenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quejasSugerencias = QuejasSugerencias::orderBy('periodo', 'desc')->get();
        return view('QuejasSugerencias.index', compact('quejasSugerencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('QuejasSugerencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'periodo' => 'required|string|max:5',
            'no_de_control' => 'required|string|max:10',
            'mensaje' => 'required|string',
            'fecha' => 'required|date',
            'no' => 'required|integer',
            'titulo' => 'required|string|max:255',
            'clave_area' => 'required|string|max:6',
        ], [
            'periodo.required' => 'El periodo es obligatorio',
            'no_de_control.required' => 'El número de control es obligatorio',
            'mensaje.required' => 'El mensaje es obligatorio',
            'fecha.required' => 'La fecha es obligatoria',
            'no.required' => 'El número es obligatorio',
            'titulo.required' => 'El título es obligatorio',
            'clave_area.required' => 'La clave de área es obligatoria',
        ]);

        try {
            // Crear el nuevo registro
            QuejasSugerencias::create($validatedData);

            return redirect()->route('QuejasSugerencias.index')->with('success', 'Queja/Sugerencia creada exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error al crear el registro: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(QuejasSugerencias $quejasSugerencia)
    {
        return view('QuejasSugerencias.show', compact('quejasSugerencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuejasSugerencias $quejasSugerencia)
    {
        return view('QuejasSugerencias.edit', compact('quejasSugerencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuejasSugerencias $quejasSugerencia)
    {
        $validatedData = $request->validate([
            'periodo' => 'required|string|max:5',
            'no_de_control' => 'required|string|max:10',
            'mensaje' => 'required|string',
            'fecha' => 'required|date',
            'no' => 'required|integer',
            'titulo' => 'required|string|max:255',
            'clave_area' => 'required|string|max:6',
        ]);

        try {
            // Actualizar el registro
            $quejasSugerencia->update($validatedData);

            return redirect()->route('QuejasSugerencias.index')->with('success', 'Registro actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuejasSugerencias $quejasSugerencia)
    {
        try {
            $quejasSugerencia->delete();

            return redirect()->route('QuejasSugerencias.index')->with('success', 'Registro eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }
}
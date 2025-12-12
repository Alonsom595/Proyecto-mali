<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\QuejasSugerencias;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuejaSugerenciaApiController extends Controller
{
    public function index(): JsonResponse
    {
        $quejasSugerencias = QuejasSugerencias::orderBy('fecha', 'desc')->get();
        return response()->json($quejasSugerencias);
    }

    public function store(Request $request): JsonResponse
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

        $quejaSugerencia = QuejasSugerencias::create($validatedData);
        return response()->json($quejaSugerencia, 201);
    }

    public function show(string $id): JsonResponse
    {
        try {
            $quejaSugerencia = QuejasSugerencias::findOrFail($id);
            return response()->json($quejaSugerencia);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Queja/Sugerencia no encontrada'], 404);
        }
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $validatedData = $request->validate([
            'periodo' => 'required|string|max:5',
            'no_de_control' => 'required|string|max:10',
            'mensaje' => 'required|string',
            'fecha' => 'required|dateTime',
            'no' => 'required|integer',
            'titulo' => 'required|string|max:255',
            'clave_area' => 'required|string|max:6',
        ]);

        $quejaSugerencia = QuejasSugerencias::findOrFail($id);
        $quejaSugerencia->update($validatedData);
        return response()->json($quejaSugerencia);
    }

    public function destroy(string $id): JsonResponse
    {
        QuejasSugerencias::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
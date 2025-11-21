@extends('layouts.app2')

@section('title', 'Detalle de Queja o Sugerencia')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle de Queja o Sugerencia</h4>
                    <div>
                        <a href="{{ route('QuejasSugerencias.edit', $quejasSugerencia->id) }}" 
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('QuejasSugerencias.index') }}" 
                           class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="bg-light" width="40%">Periodo</th>
                                        <td>{{ $quejasSugerencia->periodo }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">No. de Control</th>
                                        <td>{{ $quejasSugerencia->no_de_control }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Título</th>
                                        <td>{{ $quejasSugerencia->titulo }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Clave de Área</th>
                                        <td>{{ $quejasSugerencia->clave_area }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">No.</th>
                                        <td>{{ $quejasSugerencia->no }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th class="bg-light" width="40%">Fecha</th>
                                        <td>{{ $quejasSugerencia->fecha ? $quejasSugerencia->fecha->format('d/m/Y') : 'Sin especificar' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Creado</th>
                                        <td>{{ $quejasSugerencia->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Actualizado</th>
                                        <td>{{ $quejasSugerencia->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5 class="border-bottom pb-2">Mensaje</h5>
                        <p class="text-justify">{{ $quejasSugerencia->mensaje }}</p>
                    </div>

                    <!-- Botón de eliminar -->
                    <div class="mt-4 border-top pt-3">
                        <form action="{{ route('QuejasSugerencias.destroy', $quejasSugerencia->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Está seguro de eliminar esta queja o sugerencia?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-footer text-muted text-end">
                    <small>Creado: {{ $quejasSugerencia->created_at->format('d/m/Y H:i') }} |
                    Actualizado: {{ $quejasSugerencia->updated_at->format('d/m/Y H:i') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

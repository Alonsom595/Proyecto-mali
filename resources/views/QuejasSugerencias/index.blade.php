@extends('layouts.app2')

@section('title', 'Quejas y Sugerencias')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Quejas y Sugerencias</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('QuejasSugerencias.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva Queja Sugerencia
            </a>
        </div>
    </div>

    <!-- Mensajes -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabla -->
    <div class="card">
        <div class="card-body">
            @if($quejasSugerencias->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Periodo</th>
                                <th>No. Control</th>
                                <th>Título</th>
                                <th>Mensaje</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quejasSugerencias as $queja)
                                <tr>
                                    <td>{{ $queja->no }}</td>
                                    <td>{{ $queja->periodo }}</td>
                                    <td>{{ $queja->no_de_control }}</td>
                                    <td>{{ $queja->titulo }}</td>
                                    <td>{{ Str::limit($queja->mensaje, 50) }}</td>
                                    <td>{{ $queja->fecha ? $queja->fecha->format('d/m/Y') : 'N/A' }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('QuejasSugerencias.show', $queja->id) }}" 
                                               class="btn btn-sm btn-info"
                                               title="Ver detalle">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('QuejasSugerencias.edit', $queja->id) }}" 
                                               class="btn btn-sm btn-warning"
                                               title="Editar">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <form action="{{ route('QuejasSugerencias.destroy', $queja->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-danger" 
                                                        title="Eliminar"
                                                        onclick="return confirm('¿Está seguro de eliminar este registro?')">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No hay quejas o sugerencias registradas.
                    <a href="{{ route('QuejasSugerencias.create') }}">Crear la primera</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
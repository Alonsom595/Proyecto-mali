@extends('layouts.app2')

@section('title', 'Editar Queja/Sugerencia')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Queja/Sugerencia</h4>
                </div>
                <div class="card-body">
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('QuejasSugerencias.update', $quejasSugerencia) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Periodo -->
                            <div class="col-md-6 mb-3">
                                <label for="periodo" class="form-label">
                                    Periodo <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('periodo') is-invalid @enderror" 
                                    id="periodo" 
                                    name="periodo" 
                                    value="{{ old('periodo', $quejasSugerencia->periodo) }}"
                                    placeholder="Ej: 2024-1"
                                    maxlength="5"
                                    required>
                                @error('periodo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- No. de Control -->
                            <div class="col-md-6 mb-3">
                                <label for="no_de_control" class="form-label">
                                    No. de Control <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('no_de_control') is-invalid @enderror" 
                                    id="no_de_control" 
                                    name="no_de_control" 
                                    value="{{ old('no_de_control', $quejasSugerencia->no_de_control) }}"
                                    placeholder="Ej: 12345678"
                                    maxlength="10"
                                    required>
                                @error('no_de_control')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Fecha -->
                            <div class="col-md-4 mb-3">
                                <label for="fecha" class="form-label">
                                    Fecha <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="date" 
                                    class="form-control @error('fecha') is-invalid @enderror" 
                                    id="fecha" 
                                    name="fecha" 
                                    value="{{ old('fecha', $quejasSugerencia->fecha) }}"
                                    required>
                                @error('fecha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- No -->
                            <div class="col-md-4 mb-3">
                                <label for="no" class="form-label">
                                    No. <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="number" 
                                    class="form-control @error('no') is-invalid @enderror" 
                                    id="no" 
                                    name="no" 
                                    value="{{ old('no', $quejasSugerencia->no) }}"
                                    placeholder="Ej: 1"
                                    required>
                                @error('no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Clave Área -->
                            <div class="col-md-4 mb-3">
                                <label for="clave_area" class="form-label">
                                    Clave Área <span class="text-danger">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('clave_area') is-invalid @enderror" 
                                    id="clave_area" 
                                    name="clave_area" 
                                    value="{{ old('clave_area', $quejasSugerencia->clave_area) }}"
                                    placeholder="Ej: AREA01"
                                    maxlength="6"
                                    required>
                                @error('clave_area')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Título -->
                        <div class="mb-3">
                            <label for="titulo" class="form-label">
                                Título <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('titulo') is-invalid @enderror" 
                                id="titulo" 
                                name="titulo" 
                                value="{{ old('titulo', $quejasSugerencia->titulo) }}"
                                placeholder="Título de la queja o sugerencia"
                                maxlength="255"
                                required>
                            @error('titulo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mensaje -->
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">
                                Mensaje <span class="text-danger">*</span>
                            </label>
                            <textarea 
                                class="form-control @error('mensaje') is-invalid @enderror" 
                                id="mensaje" 
                                name="mensaje" 
                                rows="5"
                                placeholder="Describa la queja o sugerencia..."
                                required>{{ old('mensaje', $quejasSugerencia->mensaje) }}</textarea>
                            @error('mensaje')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Información adicional -->
                        @if(isset($quejasSugerencia->created_at))
                        <div class="alert alert-secondary">
                            <small>
                                <strong>Fecha de creación:</strong> {{ $quejasSugerencia->created_at->format('d/m/Y H:i') }}<br>
                                <strong>Última actualización:</strong> {{ $quejasSugerencia->updated_at->format('d/m/Y H:i') }}
                            </small>
                        </div>
                        @endif

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('QuejasSugerencias.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Actualizar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
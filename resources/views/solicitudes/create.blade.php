@extends('layouts.soporte')
@section('title', 'Registrar solicitud')
@section('content')
<div class="toolbar">
    <div><h1>Nueva solicitud</h1><p>Completa la información del problema que necesita atención.</p></div>
    <a class="button secondary" href="{{ route('solicitudes.index') }}">Volver al listado</a>
</div>
<section class="panel">
    <form action="{{ route('solicitudes.store') }}" method="POST">
        @csrf
        <div class="grid">
            <div class="field">
                <label for="solicitante">Solicitante *</label>
                <input id="solicitante" name="solicitante" type="text" maxlength="255" value="{{ old('solicitante') }}" required autocomplete="name">
            </div>
            <div class="field">
                <label for="departamento">Departamento *</label>
                <input id="departamento" name="departamento" type="text" maxlength="255" value="{{ old('departamento') }}" required>
            </div>
        </div>
        <div class="field">
            <label for="descripcion">Descripción del problema *</label>
            <textarea id="descripcion" name="descripcion" required maxlength="5000" placeholder="Describe qué ocurre y desde cuándo...">{{ old('descripcion') }}</textarea>
        </div>
        <div class="field">
            <label for="prioridad">Prioridad *</label>
            <select id="prioridad" name="prioridad" required>
                <option value="">Selecciona una prioridad</option>
                @foreach(['Baja', 'Media', 'Alta'] as $prioridad)
                    <option value="{{ $prioridad }}" @selected(old('prioridad') === $prioridad)>{{ $prioridad }}</option>
                @endforeach
            </select>
        </div>
        <p class="muted" style="margin-bottom:20px">El estado inicial de la solicitud será Pendiente.</p>
        <div class="actions"><button type="submit">Registrar solicitud</button><a class="button secondary" href="{{ route('solicitudes.index') }}">Cancelar</a></div>
    </form>
</section>
@endsection

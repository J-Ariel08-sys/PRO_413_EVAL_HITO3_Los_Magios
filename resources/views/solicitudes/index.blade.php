@extends('layouts.soporte')
@section('title', 'Listado de solicitudes')
@section('content')
<div class="toolbar">
    <div><h1>Solicitudes registradas</h1><p>Consulta los reportes y actualiza su estado de atención.</p></div>
    <a class="button" href="{{ route('solicitudes.create') }}">+ Nueva solicitud</a>
</div>
<section class="panel table-wrap">
    <table>
        <thead><tr><th>ID</th><th>Solicitante</th><th>Departamento</th><th>Descripción</th><th>Prioridad</th><th>Estado</th><th>Fecha</th><th>Actualizar estado</th></tr></thead>
        <tbody>
        @forelse($solicitudes as $solicitud)
            <tr>
                <td>#{{ $solicitud->id }}</td>
                <td>{{ $solicitud->solicitante }}</td>
                <td>{{ $solicitud->departamento }}</td>
                <td class="description">{{ $solicitud->descripcion }}</td>
                <td><span class="pill">{{ $solicitud->prioridad }}</span></td>
                <td>{{ $solicitud->estado }}</td>
                <td>{{ $solicitud->created_at ? $solicitud->created_at->format('d/m/Y H:i') : '—' }}</td>
                <td>
                    <form class="status-form" action="{{ route('solicitudes.estado', $solicitud->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="estado" aria-label="Estado de la solicitud {{ $solicitud->id }}" required>
                            @foreach(['Pendiente', 'En proceso', 'Resuelta'] as $estado)
                                <option value="{{ $estado }}" @selected($solicitud->estado === $estado)>{{ $estado }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Guardar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8" style="text-align:center;padding:35px">Todavía no hay solicitudes registradas.</td></tr>
        @endforelse
        </tbody>
    </table>
</section>
@endsection

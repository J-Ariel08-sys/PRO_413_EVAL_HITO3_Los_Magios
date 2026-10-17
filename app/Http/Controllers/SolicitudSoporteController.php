<?php

namespace App\Http\Controllers;

use App\Models\SolicitudSoporte;
use Illuminate\Http\Request;

class SolicitudSoporteController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'solicitante'  => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'descripcion'  => 'required|string',
            'prioridad'    => 'required|in:baja,media,alta',
        ]);

        $validated['estado'] = 'pendiente';

        SolicitudSoporte::create($validated);

        return redirect()->back()->with('success', 'Solicitud registrada correctamente.');
    }
}
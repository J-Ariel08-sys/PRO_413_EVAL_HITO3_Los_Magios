<?php

namespace App\Http\Controllers;

use App\Models\SolicitudSoporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class SolicitudSoporteController extends Controller
{
    public function sincronizar()
    {
        try {
            // 1. Probar conectividad con la BD remota
            DB::connection('mysql_remota')->getPdo();

            // 2. Obtener registros locales
            $locales = SolicitudSoporte::all();

            $sincronizados = 0;
            foreach ($locales as $item) {
                DB::connection('mysql_remota')->table('solicitudes_soporte')->upsert(
                    [
                        'id'           => $item->id,
                        'solicitante'  => $item->solicitante,
                        'departamento' => $item->departamento,
                        'descripcion'  => $item->descripcion,
                        'prioridad'    => $item->prioridad,
                        'estado'       => $item->estado,
                        'created_at'   => $item->created_at,
                        'updated_at'   => $item->updated_at,
                    ],
                    ['id'], // Clave única
                    ['solicitante', 'departamento', 'descripcion', 'prioridad', 'estado', 'updated_at']
                );
                $sincronizados++;
            }

            return redirect()->back()->with('success', "Sincronización exitosa: {$sincronizados} registros sincronizados.");
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al sincronizar con la base de datos remota: ' . $e->getMessage());
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{

    public function index(Request $request)
    {
        $query = Audit::with('user')->latest();

        // Filtrar por tipo de evento
        if ($request->filled('event')) {
            $query->where('event', $request->event);
        }

        // Filtrar por modelo/módulo
        if ($request->filled('auditable_type')) {
            $query->where('auditable_type', $request->auditable_type);
        }

        $audits = $query->paginate(20);

        // Obtener tipos únicos para el filtro
        $auditableTypes = Audit::distinct()->pluck('auditable_type');

        return view('audits.index', compact('audits', 'auditableTypes'));
    }

    public function show(Audit $audit)
    {
        $audit->load('user');
        return view('audits.show', compact('audit'));
    }
}

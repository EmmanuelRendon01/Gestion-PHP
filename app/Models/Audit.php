<?php

namespace App\Models;

use OwenIt\Auditing\Models\Audit as BaseAudit;

class Audit extends BaseAudit
{
    /**
     * Impedir la actualización de registros de auditoría
     */
    public static function boot()
    {
        parent::boot();

        // Bloquear actualizaciones
        static::updating(function ($model) {
            throw new \Exception('Los registros de auditoría no pueden ser modificados.');
        });

        // Bloquear eliminaciones
        static::deleting(function ($model) {
            throw new \Exception('Los registros de auditoría no pueden ser eliminados.');
        });
    }
}

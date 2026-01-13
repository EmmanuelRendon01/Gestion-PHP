<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Product extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;  // Esto registra automáticamente los cambios

    
    // Campos que se pueden llenar masivamente
     
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
}

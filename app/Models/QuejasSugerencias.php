<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuejasSugerencias extends Model
{
    use HasFactory;
    
    protected $table = 'quejas_sugerencias';
    
    protected $fillable = [
        'periodo',
        'no_de_control',
        'mensaje',
        'fecha',
        'no',
        'titulo',
        'clave_area',
    ];
    
    protected $casts = [
        'fecha' => 'date'  
    ];
}
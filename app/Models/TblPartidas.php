<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPartidas extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_principal',
        'tipo_adversario',
        'adversario_nao_existente',
        'adversario_existente',
        'dia',
        'horario'
    ];

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPartidas extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_principal',
        'adversario_nao_existente',
        'adversario_existente',
        'dia',
        'horario',
        'partida_importante'
    ];

    public $timestamps = false;
}

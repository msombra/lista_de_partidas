<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parte extends Model
{
    use HasFactory;

    protected $table = "push_rms_partes";

    protected $fillable = [
        'parte',
        'nao_finalizado',
        'lido'
    ];

    public $timestamps = false;
}

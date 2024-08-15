<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPartidasTimes extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'liga'];

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = ucwords($value);
    }

    public $timestamps = false;
}

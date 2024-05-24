<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cnj extends Model
{
    use HasFactory;

    protected $fillable = ['cnj'];

    public $timestamps = false;
}

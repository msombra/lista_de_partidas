<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parte;

class PushRmsController extends Controller
{
    public function index()
    {
        $registros = Parte::get();

        return view('push_rms.index', compact('registros'));
    }
}

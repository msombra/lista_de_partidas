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

    public function update($id, Request $request)
    {
        $parte = Parte::find($id);

        $checkboxValue = $request['lido'] ? 1 : 0;

        $parte->lido = $checkboxValue;
        $parte->nao_finalizado = !$checkboxValue;
        $parte->save();

        return redirect()->back();
    }
}

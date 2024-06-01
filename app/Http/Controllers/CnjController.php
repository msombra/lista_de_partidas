<?php

namespace App\Http\Controllers;

use App\Models\Cnj;
use Illuminate\Http\Request;

class CnjController extends Controller
{
    public function index()
    {
        $dados = Cnj::orderBy('id')->get();

        return view('pages.cnj.cnjs', compact('dados'));
    }

    public function store(Request $request, Cnj $cnj)
    {
        $regras = ['cnj' => 'required'];
        $mensagens = ['cnj.required' => 'Campo de preenchimento obrigatório'];

        $validar = $request->validate($regras, $mensagens);

        $cnj->create($validar);

        return redirect()->route('cnjs.index');
    }

    public function update(Request $request, Cnj $cnj)
    {
        $regras = ['cnj' => 'required'];
        $mensagens = ['cnj.required' => 'Campo de preenchimento obrigatório'];

        $validar = $request->validate($regras, $mensagens);

        $cnj->update($validar);

        return redirect()->route('cnjs.index');
    }

    public function destroy(Cnj $cnj)
    {
        $cnj->delete();

        return redirect()->route('cnjs.index');
    }
}

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

    public function store(Request $request)
    {
        $model = new Cnj();
        $model->cnj = $request['cnj'];
        $model->save();

        return response()->json(['success' => 'Cnj inserido com sucesso.']);
        // return redirect()->route('cnj.index');
    }

    public function update(Request $request, Cnj $cnj)
    {
        $cnj->update($request->all());

        return response()->json(['success' => 'Cnj atualizado com sucesso.']);
        // return redirect()->route('cnj.index');
    }

    public function delete(Cnj $cnj)
    {
        $cnj->delete();

        return response()->json(['success' => 'Cnj deletado com sucesso.']);
    }
}

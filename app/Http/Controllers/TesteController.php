<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Teste;

class TesteController extends Controller
{
    public function index()
    {
        $dados = Teste::all();
        // $item = Item::all();

        return view('pages.teste.index', compact('dados'));
    }

    public function create()
    {
        $itens = Item::all();

        return view('pages.teste.create', compact('itens'));
    }

    public function store(Request $request, Teste $teste)
    {
        $nome = $request->input('nome');
        $itens = $request->input('itens');

        $teste->nome = $nome;
        $teste->id_item = $itens;
        $teste->save();

        return redirect()->route('teste.index');
    }
}

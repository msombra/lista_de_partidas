<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TblPartidasTimes;

class TimesController extends Controller
{
    public function list()
    {
        $tbl_times = DB::table('tbl_partidas_times as pt')
            ->select('pt.id', 'pt.nome', 'pl.nome as liga')
            ->join('tbl_partidas_ligas as pl', 'pt.liga', '=', 'pl.id')
            ->orderBy('pt.liga')
            ->get();

        return view('pages.partidas.times.times_list', compact('tbl_times'));
    }

    public function create()
    {
        $ligas = DB::table('tbl_partidas_ligas')->get();

        return view('pages.partidas.times.times_insert', compact('ligas'));
    }

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|unique:tbl_partidas_times,nome|min:3',
            'liga' => 'required'
        ];

        $obrigatorio = 'Campo de preenchimento obrigatório';
        $mensagens = [
            'nome.required' => $obrigatorio,
            'liga.required' => $obrigatorio,
            'nome.unique' => 'Esse nome já existe na lista',
            'nome.min' => 'O nome do time deve conter no mínimo 3 caracteres'
        ];

        $validar = $request->validate($regras, $mensagens);

        TblPartidasTimes::create($validar);

        return redirect()->route('partidas.times_list')->with('toast_time_insert', 'Time cadastrado com sucesso!');
    }
}

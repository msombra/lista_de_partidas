<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblPartidas;
use App\Models\TblPartidasTimes;
use Illuminate\Support\Facades\DB;

class MenuPartidasController extends Controller
{
    public function index()
    {
        $partidas_sabado = DB::table('tbl_partidas as p')
            ->select('p.id', 'tp.nome as time_principal', 'adversario_nao_existente', 'ta.nome as adversario_existente', 'horario')
            ->leftJoin('tbl_partidas_times as tp', 'p.time_principal', '=', 'tp.id')
            ->leftJoin('tbl_partidas_times as ta', 'p.adversario_existente', '=', 'ta.id')
            ->where('dia', 1)
            ->orderBy('horario')
            ->get();

        $partidas_domingo = DB::table('tbl_partidas as p')
            ->select('p.id', 'tp.nome as time_principal', 'adversario_nao_existente', 'ta.nome as adversario_existente', 'horario')
            ->leftJoin('tbl_partidas_times as tp', 'p.time_principal', '=', 'tp.id')
            ->leftJoin('tbl_partidas_times as ta', 'p.adversario_existente', '=', 'ta.id')
            ->where('dia', 2)
            ->orderBy('horario')
            ->get();

        return view('pages.partidas.listagem', compact('partidas_sabado', 'partidas_domingo'));
    }

    public function create()
    {
        $times = TblPartidasTimes::all();

        return view('pages.partidas.inserir_partida', compact('times'));
    }

    public function store(Request $request)
    {
        $regras = [
            'time_principal' => 'required|unique:tbl_partidas,time_principal',
            // 'adversario_nao_existente' => 'required_if:adversario_existente,null|unique:tbl_partidas,adversario_nao_existente',
            // 'adversario_existente' => 'required_if:adversario_nao_existente,null|unique:tbl_partidas,adversario_existente',
            'tipo_adversario' => 'required',
            'adversario_nao_existente' => 'nullable',
            'adversario_existente' => 'nullable',
            'dia' => 'required',
            'horario' => 'required'
        ];

        // $msg = 'Campo de preenchimento obrigatório';
        // $msg2 = 'Valor do campo já inserido';
        // $mensagens = [
        //     'time_principal.required' => $msg,
        //     'time_principal.unique' => $msg2,
        //     'adversario_nao_existente.required' => $msg,
        //     // 'adversario_nao_existente.unique' => $msg2,
        //     'adversario_existente.required' => $msg,
        //     // 'adversario_existente.unique' => $msg2,
        //     'dia' => $msg,
        //     'horario' => $msg
        // ];

        $validar = $request->validate($regras, $mensagens);

        $partida = $request->all();

        TblPartidas::create($validar);

        return redirect()->route('partidas.index');
    }

    public function edit($id)
    {
        $partida = TblPartidas::find($id);
        $times = TblPartidasTimes::all();

        if(!$partida) {
            return redirect()->route('partidas.index');
        }

        return view('pages.partidas.editar_partida', compact('partida', 'times'));
    }

    public function update($id, Request $request)
    {
        $partida = TblPartidas::find($id);

        $validar = $request->validate([
            'time_principal' => 'required',
            // 'adversario_nao_existente' => 'required_if:adversario_existente,null|unique:tbl_partidas,adversario_nao_existente',
            // 'adversario_existente' => 'required_if:adversario_nao_existente,null|unique:tbl_partidas,adversario_existente',
            'tipo_adversario' => 'required',
            'adversario_nao_existente' => 'nullable',
            'adversario_existente' => 'nullable',
            'dia' => 'required',
            'horario' => 'required'
        ]);

        if(!$partida) {
            return redirect()->route('partidas.index');
        }

        $partida->update($validar);

        return redirect()->route('partidas.index');
    }

    public function delete()
    {
        TblPartidas::truncate();

        return redirect()->route('partidas.inserir_partida');
    }
}

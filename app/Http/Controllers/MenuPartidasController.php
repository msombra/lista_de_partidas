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
        // $partidas = TblPartidas::all();

        $partidas_sabado = DB::table('tbl_partidas as p')
            ->select('p.id', 'tp.nome as time_principal', 'adversario_nao_existente', 'ta.nome as adversario_existente', 'horario', 'partida_importante')
            ->leftJoin('tbl_partidas_times as tp', 'p.time_principal', '=', 'tp.id')
            ->leftJoin('tbl_partidas_times as ta', 'p.adversario_existente', '=', 'ta.id')
            ->where('dia', 1)
            ->orderBy('horario')
            ->get();

        $partidas_domingo = DB::table('tbl_partidas as p')
            ->select('p.id', 'tp.nome as time_principal', 'adversario_nao_existente', 'ta.nome as adversario_existente', 'horario', 'partida_importante')
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
        // $regras = [
        //     'time_principal' => 'required',
        //     'dia' => 'required',
        //     'horario' => 'required'
        // ];

        // $validar = $request->validate($regras);

        // TblPartidas::create($validar);

        $partida = $request->all();

        TblPartidas::create($partida);

        return redirect()->back();
    }

    public function delete()
    {
        TblPartidas::truncate();

        return redirect()->route('partidas.inserir_partida');
    }
}

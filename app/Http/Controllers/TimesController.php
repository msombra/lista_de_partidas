<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TblPartidasTimes;

class TimesController extends Controller
{
    private $regras;
    private $obrigatorio;
    private $mensagens;

    public function __construct()
    {
        $this->regras = [
            'nome' => 'required|unique:tbl_partidas_times,nome|min:3',
            'liga' => 'required'
        ];

        $this->obrigatorio = 'Campo de preenchimento obrigatório';

        $this->mensagens = [
            'nome.required' => $this->obrigatorio,
            'liga.required' => $this->obrigatorio,
            'nome.unique' => 'Esse nome já existe na lista',
            'nome.min' => 'O nome do time deve conter no mínimo 3 caracteres'
        ];
    }

    private function validar(Request $request)
    {
        return $request->validate($this->regras, $this->mensagens);
    }

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
        $validar = $this->validar($request);

        TblPartidasTimes::create($validar);

        return redirect()->route('partidas.times_list')->with('toast_time_insert', 'Time cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $time = TblPartidasTimes::find($id);
        $ligas = DB::table('tbl_partidas_ligas')->get();

        if(!$time) {
            return redirect()->route('partidas.times_list');
        }

        return view('pages.partidas.times.times_edit', compact('time', 'ligas'));
    }

    public function update($id, Request $request)
    {
        $time = TblPartidasTimes::find($id);

        $validar = $this->validar($request);

        $time->update($validar);

        if(!$time) {
            return redirect()->route('partidas.times_list');
        }

        return redirect()->route('partidas.times_list')->with('toast_time_update', 'Time atualizado com sucesso!');
    }

    public function delete($id)
    {
        $time = TblPartidasTimes::find($id);

        if(!$time) {
            return redirect()->route('partidas.times_list');
        }

        $time->delete();

        return redirect()->route('partidas.times_list')->with('toast_time_delete', 'Time deletado com sucesso!');
    }
}

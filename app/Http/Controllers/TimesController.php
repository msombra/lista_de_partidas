<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TblPartidasTimes;

class TimesController extends Controller
{
    // Atributos públicos
    public $nome = 'nome';
    public $liga = 'liga';
    // Atributos Privados
    private $regras;
    private $mensagens;

    // =====================================================
    // CONSTRUCT
    // =====================================================
    public function __construct()
    {
        $obrigatorio = 'Campo de preenchimento obrigatório';

        $this->regras = [
            'nome' => 'required|unique:tbl_partidas_times,nome|min:3',
            'liga' => 'required'
        ];

        $this->mensagens = [
            'nome.required' => $obrigatorio,
            'liga.required' => $obrigatorio,
            'nome.unique' => 'O time já existe na lista',
            'nome.min' => 'O nome do time deve conter no mínimo 3 caracteres'
        ];
    }

    // =====================================================
    // PRIVATE METHODS
    // =====================================================
    private function validar(Request $request)
    {
        return $request->validate($this->regras, $this->mensagens);
    }

    private function find_id($id)
    {
        return TblPartidasTimes::find($id);
    }


    // =====================================================
    // INDEX
    // =====================================================
    public function list()
    {
        $tbl_times = DB::table('tbl_partidas_times as pt')
            ->select('pt.id', 'pt.nome', 'pl.nome as liga')
            ->join('tbl_partidas_ligas as pl', 'pt.liga', '=', 'pl.id')
            ->orderBy('pt.liga')
            ->get();

        return view('pages.partidas.times.times_list', compact('tbl_times'));
    }


    // =====================================================
    // CREATE
    // =====================================================
    public function create(TimesController $t)
    {
        $ligas = DB::table('tbl_partidas_ligas')->get();

        return view('pages.partidas.times.times_insert', compact('ligas', 't'));
    }

    public function store(Request $request)
    {
        $validar = $this->validar($request);

        TblPartidasTimes::create($validar);

        return redirect()->route('partidas.times_list')->with('toast_time_insert', 'Time cadastrado com sucesso!');
    }


    // =====================================================
    // EDIT
    // =====================================================
    public function edit($id, TimesController $t)
    {
        $time = $this->find_id($id);

        $ligas = DB::table('tbl_partidas_ligas')->get();

        if (!$time) {
            return redirect()->back();
        }

        return view('pages.partidas.times.times_edit', compact('time', 'ligas', 't'));
    }

    public function update($id, Request $request)
    {
        $time = $this->find_id($id);

        $this->regras['nome'] = 'required|min:3';
        $this->mensagens['nome.unique'] = '';

        $validar = $this->validar($request);

        $time->update($validar);

        $this->not_find_redirect_index($time);

        return redirect()->route('partidas.times_list')->with('toast_time_update', 'Time atualizado com sucesso!');
    }

    // =====================================================
    // DELETE
    // =====================================================
    public function delete($id)
    {
        $time = TblPartidasTimes::find($id);

        if (!$time) {
            return redirect()->back();
        }

        $time->delete();

        return redirect()->route('partidas.times_list')->with('toast_time_delete', 'Time deletado com sucesso!');
    }
}

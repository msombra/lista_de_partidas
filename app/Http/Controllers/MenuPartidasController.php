<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblPartidas;
use App\Models\TblPartidasTimes;
use Illuminate\Support\Facades\DB;

class MenuPartidasController extends Controller
{
    public $time_principal = 'time_principal';
    public $tipo_adversario = 'tipo_adversario';
    public $time_adversario = 'time_adversario';
    public $f_dia = 'dia';
    public $horario = 'horario';
    public $liga = 'liga';
    // =====================================================
    // MÉTODOS PRIVADOS
    // =====================================================

    // Definindo Regras
    private $regras;
    private $mensagens;

    public function __construct()
    {
        $obrigatorio = 'Campo de preenchimento obrigatório';
        $unique = 'Time já inserido na listagem';

        $this->regras = [
            'time_principal'  => 'required|unique:tbl_partidas,time_principal',
            'tipo_adversario' => 'required',
            'time_adversario' => 'required|unique:tbl_partidas,time_adversario',
            'dia'             => 'required',
            'horario'         => 'required',
            'liga'            => 'required',
        ];

        $this->mensagens = [
            'time_principal.required'  => $obrigatorio,
            'time_principal.unique'    => $unique,

            'time_adversario.required' => $obrigatorio,
            'time_adversario.unique'   => $unique,

            'dia.required'             => $obrigatorio,
            'horario.required'         => $obrigatorio,
            'liga.required'            => $obrigatorio,
        ];
    }

    // Validando Regras
    private function validar(Request $request)
    {
        return $request->validate($this->regras, $this->mensagens);
    }

    // Selecionando registro para rotina de update ou delete
    private function find_id($id)
    {
        return TblPartidas::find($id);
    }


    // =====================================================
    // LISTAGEM
    // =====================================================
    private function buscarPartidasPorDia($dia)
    {
        return DB::table('tbl_partidas as p')
                 ->select('p.id', 'tp.nome as time_principal', 'time_adversario', 'horario')
                 ->leftJoin('tbl_partidas_times as tp', 'p.time_principal', '=', 'tp.id')
                 ->where('dia', $dia)
                 ->orderBy('horario')
                 ->get()
                 ->toArray();
    }

    public function index()
    {
        $partidas = TblPartidas::all();

        $partidasPorDia = [];

        for ($dia = 1; $dia <= 3; $dia++) {
            $partidasPorDia[$dia] = $this->buscarPartidasPorDia($dia);
        }

        return view('pages.partidas.listagem', compact('partidas', 'partidasPorDia'));
    }


    // =====================================================
    // CREATE
    // =====================================================
    public function create(MenuPartidasController $p)
    {
        $times = DB::table('tbl_partidas_times as t')
            ->select('t.id', 't.nome', 't.liga')
            ->leftJoin('tbl_partidas as ptp', 't.id', 'ptp.time_principal')
            ->leftJoin('tbl_partidas as pta', 't.nome', 'pta.time_adversario')
            ->whereNull('ptp.time_principal')
            ->whereNull('pta.time_principal')
            ->get();

        $ligas = DB::table('tbl_partidas_ligas')->get();

        return view('pages.partidas.inserir_partida', compact('times', 'ligas', 'p'));
    }

    public function store(Request $request)
    {
        $validar = $this->validar($request);

        TblPartidas::create($validar);

        return redirect()->route('partidas.index')->with('success', 'Partida incluída com sucesso!');
    }


    // =====================================================
    // EDIT
    // =====================================================
    public function edit($id, MenuPartidasController $p)
    {
        $partida = $this->find_id($id);

        $times = TblPartidasTimes::all();
        $ligas = DB::table('tbl_partidas_ligas')->get();

        if(!$partida) {
            return redirect()->route('partidas.index');
        }

        return view('pages.partidas.editar_partida', compact('partida', 'times', 'ligas', 'p'));
    }

    public function update($id, Request $request)
    {
        $partida = $this->find_id($id);

        $this->regras['time_principal'] = 'required';
        $this->mensagens['time_principal.unique'] = '';
        $this->regras['time_adversario'] = 'required';
        $this->mensagens['time_adversario.unique'] = '';

        $validar = $this->validar($request);

        if(!$partida) {
            return redirect()->route('partidas.index');
        }

        $partida->update($validar);

        return redirect()->route('partidas.index')->with('success', 'Partida atualizada com sucesso!');
    }


    // =====================================================
    // DELETE
    // =====================================================
    // Função que deleta um registro que for selecionado
    public function deleteOne($id)
    {
        $partida = $this->find_id($id);

        if(!$partida) {
            return redirect()->route('partidas.index');
        }

        $partida->delete();

        return redirect()->route('partidas.index')->with('success', 'Partida deletada com sucesso!');
    }

    // Função que deleta todos os registros
    public function deleteAll()
    {
        TblPartidas::truncate();

        return redirect()->route('partidas.inserir_partida')->with('success', 'Listagem limpada com sucesso!');
    }
}

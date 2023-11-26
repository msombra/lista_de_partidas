<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcordoController extends Controller
{
    public function list()
    {
        $acordos = DB::table('tbl_acordos as a')
            ->select('a.id', 'uf.sigla as uf', 'a.gcpj', 'a.valor_total', 'tp.nome as tipo_deposito', 'data_limite_pagamento', 'nome_favorecido')
            ->leftJoin('tbl_acordos_uf_aux as uf', 'a.uf', '=', 'uf.id')
            ->leftJoin('tbl_acordos_tipo_deposito_aux as tp', 'a.tipo_deposito', '=', 'tp.id')
            ->orderBy('a.id')
            ->get();

        return view('pages.acordo.acordo_list', compact('acordos'));
    }

    public function create()
    {
        $estados = DB::table('tbl_acordos_uf_aux')->get();
        $tipo_deposito = DB::table('tbl_acordos_tipo_deposito_aux')->get();
        $forma_pagamento = DB::table('tbl_acordos_forma_pagamento_aux')->get();
        $finalidades = DB::table('tbl_acordos_finalidade_aux')->get();
        $bancos = DB::table('tbl_acordos_bancos_aux')->get();

        return view('pages.acordo.acordo_insert', compact('estados', 'tipo_deposito', 'forma_pagamento', 'finalidades', 'bancos'));
    }

    public function store(Request $request)
    {
        $dados = $request->except(['_token']);

        DB::table('tbl_acordos')->insert($dados);

        return redirect()->route('acordo.list');
    }

    public function edit($id)
    {
        $acordo = DB::table('tbl_acordos')->find($id);

        $estados = DB::table('tbl_acordos_uf_aux')->get();
        $tipo_deposito = DB::table('tbl_acordos_tipo_deposito_aux')->get();
        $forma_pagamento = DB::table('tbl_acordos_forma_pagamento_aux')->get();
        $finalidades = DB::table('tbl_acordos_finalidade_aux')->get();
        $bancos = DB::table('tbl_acordos_bancos_aux')->get();

        if ($acordo) {
            // Faça o que precisa com o registro encontrado
            return view('pages.acordo.acordo_edit', compact('acordo', 'estados', 'tipo_deposito', 'forma_pagamento', 'finalidades', 'bancos'));
        } else {
            // Lide com o caso em que o registro não foi encontrado
            return abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $dados = $request->all();

        DB::table('tbl_acordos')->where('id', $id)->update($dados);

        return redirect()->route('acordo.list');
    }
}

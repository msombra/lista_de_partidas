@extends('adminlte::page')

@section('title', 'BABi - Acordo')

@section('content_header', 'Editar Acordo')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">

                <form action="{{ route('acordo.update', $acordo->id) }}" method="post" id="form">
                    @csrf
                    <div class="card-body">
                        {{-- LINHA 1 --}}
                        <div class="row">
                            {{-- UF --}}
                            <div class="form-group col-2">
                                <label for="uf">UF</label>
                                <select name="uf" id="uf" class="form-control">
                                    <option value="">Selecione</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}" @if ($estado->id == $acordo->uf) selected @endif>
                                            {{ $estado->estado }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- LINHA 2 --}}
                        <div class="row">
                            {{-- GCPJ --}}
                            <div class="form-group col-3">
                                <label for="gcpj">GCPJ</label>
                                <input type="text" name="gcpj" id="gcpj" class="form-control" value="{{ $acordo->gcpj }}">
                            </div>
                            {{-- CÓDIGO MOTIVO --}}
                            <div class="form-group col-2">
                                <label for="codigo_motivo">Cod. Motivo</label>
                                <input type="number" name="codigo_motivo" id="codigo_motivo" class="form-control" value="{{ $acordo->codigo_motivo }}" disabled>
                            </div>
                            {{-- CÓDIGO CLASSIFICAÇÃO --}}
                            <div class="form-group col-2">
                                <label for="codigo_classificacao">Cod. Classificação</label>
                                <input type="number" name="codigo_classificacao" id="codigo_classificacao" class="form-control" value="{{ $acordo->codigo_classificacao }}" disabled>
                            </div>
                            {{-- VALOR TOTAL --}}
                            <div class="form-group col-2">
                                <label for="valor_total">Valor Total/Boleto</label>
                                <input type="text" name="valor_total" id="valor_total" class="form-control" value="{{ $acordo->valor_total }}">
                            </div>
                            {{-- TIPO DEPÓSITO --}}
                            <div class="form-group col-3">
                                <label for="tipo_deposito">Tipo Depósito</label>
                                <select name="tipo_deposito" id="tipo_deposito" class="form-control">
                                    <option value="">Selecione</option>
                                    @foreach ($tipo_deposito as $tp)
                                        <option value="{{ $tp->id }}" @if ($tp->id == $acordo->tipo_deposito) selected @endif>
                                            {{ $tp->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- LINHA 3 --}}
                        <div class="row">
                            {{-- FORMA PAGAMENTO --}}
                            <div class="form-group col-3">
                                <label for="forma_pagamento">Forma Pagamento</label>
                                <select name="forma_pagamento" id="forma_pagamento" class="form-control">
                                    <option value="">Selecione</option>
                                    @foreach ($forma_pagamento as $fp)
                                        <option value="{{ $fp->id }}" @if ($fp->id == $acordo->forma_pagamento) selected @endif>
                                            {{ $fp->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- DATA VENCIMENTO --}}
                            <div class="form-group col-2">
                                <label for="data_vencimento">Data Vencimento</label>
                                <input type="date" name="data_vencimento" id="data_vencimento" class="form-control" value="{{ $acordo->data_vencimento }}">
                            </div>
                            {{-- DATA LIMITE PAGAMENTO --}}
                            <div class="form-group col-2">
                                <label for="data_limite_pagamento">Data Limite Pag.</label>
                                <input type="date" name="data_limite_pagamento" id="data_limite_pagamento" class="form-control" value="{{ $acordo->data_limite_pagamento }}">
                            </div>
                            {{-- FINALIDADE --}}
                            <div class="form-group col-3">
                                <label for="finalidade">Finalidade</label>
                                <select name="finalidade" id="finalidade" class="form-control">
                                    <option value="">Selecione</option>
                                    @foreach ($finalidades as $finalidade)
                                        <option value="{{ $finalidade->id }}" @if ($finalidade->id == $acordo->finalidade) selected @endif>
                                            {{ $finalidade->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- TIPO SOLICITAÇÃO --}}
                            <div class="form-group col-2">
                                <label for="tipo_solicitacao">Tipo Solicitação</label>
                                <select name="tipo_solicitacao" id="tipo_solicitacao" class="form-control">
                                    <option value="" @if ($acordo->tipo_solicitacao == '') selected @endif>Selecione</option>
                                    <option value="1" @if ($acordo->tipo_solicitacao == '1') selected @endif>EM ENCERRAMENTO</option>
                                    <option value="2" @if ($acordo->tipo_solicitacao == '2') selected @endif>OPÇÃO 2</option>
                                </select>
                            </div>
                        </div>

                        {{-- LINHA 4 --}}
                        <div class="row">
                            {{-- SOLICITANTE --}}
                            <div class="form-group col-3">
                                <label for="solicitante">Solicitante</label>
                                <input type="text" name="solicitante" id="solicitante" class="form-control" value="{{ $acordo->solicitante }}">
                            </div>
                            {{-- MOTIVO ENCERRAMENTO --}}
                            <div class="form-group col-3">
                                <label for="motivo_encerramento">Motivo Encerramento</label>
                                <input type="text" name="motivo_encerramento" id="motivo_encerramento" class="form-control" value="{{ $acordo->motivo_encerramento }}">
                            </div>
                            {{-- PENDÊNCIA CONTÁBIL --}}
                            <div class="form-group col-2">
                                <label for="pendencia_contabil">Pend. Contabil</label>
                                <select name="pendencia_contabil" id="pendencia_contabil" class="form-control">
                                    <option value="" @if ($acordo->pendencia_contabil == '') selected @endif>Selecione</option>
                                    <option value="1" @if ($acordo->pendencia_contabil == '0') selected @endif>NÃO</option>
                                    <option value="2" @if ($acordo->pendencia_contabil == '1') selected @endif>SIM</option>
                                </select>
                            </div>
                            {{-- DEP. CONTA BRADESCO --}}
                            <div class="form-group col-2">
                                <label for="dep_conta_bradesco">Dep. Conta Bradesco</label>
                                <select name="dep_conta_bradesco" id="dep_conta_bradesco" class="form-control">
                                    <option value="" @if ($acordo->dep_conta_bradesco == '') selected @endif>Selecione</option>
                                    <option value="1" @if ($acordo->dep_conta_bradesco == '0') selected @endif>NÃO</option>
                                    <option value="2" @if ($acordo->dep_conta_bradesco == '1') selected @endif>SIM</option>
                                </select>
                            </div>
                            {{-- NOME BANCO --}}
                            <div class="form-group col-2">
                                <label for="nome_banco">Nome Banco</label>
                                <select name="nome_banco" id="nome_banco" class="form-control">
                                    <option value="">Selecione</option>
                                    @foreach ($bancos as $banco)
                                        <option value="{{ $banco->id }}" @if ($banco->id == $acordo->nome_banco) selected @endif>
                                            {{ $banco->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- LINHA 5 --}}
                        <div class="row">
                            {{-- AGENCIA --}}
                            <div class="form-group col-1">
                                <label for="agencia">Agência</label>
                                <input type="text" name="agencia" id="agencia" class="form-control" value="{{ $acordo->agencia }}">
                            </div>
                            {{-- TIPO CONTA --}}
                            <div class="form-group col-2">
                                <label for="tipo_conta">Tipo Conta</label>
                                <select name="tipo_conta" id="tipo_conta" class="form-control">
                                    <option value="" @if ($acordo->tipo_conta == '') selected @endif>Selecione</option>
                                    <option value="1" @if ($acordo->tipo_conta == '0') selected @endif>CORRENTE</option>
                                    <option value="2" @if ($acordo->tipo_conta == '1') selected @endif>POUPANCA</option>
                                </select>
                            </div>
                            {{-- CONTA --}}
                            <div class="form-group col-2">
                                <label for="conta">Conta</label>
                                <input type="text" name="conta" id="conta" class="form-control" value="{{ $acordo->conta }}">
                            </div>
                            {{-- DIGITO --}}
                            <div class="form-group col-1">
                                <label for="digito">Digito</label>
                                <input type="number" name="digito" id="digito" class="form-control" value="{{ $acordo->digito }}">
                            </div>
                            {{-- ID PAGAMENTO --}}
                            <div class="form-group col-3">
                                <label for="id_pagamento">ID Pagamento</label>
                                <input type="text" name="id_pagamento" id="id_pagamento" class="form-control" value="{{ $acordo->id_pagamento }}">
                            </div>
                            {{-- CODIGO DE BARRAS --}}
                            <div class="form-group col-3">
                                <label for="codigo_barras">Código de Barras</label>
                                <input type="text" name="codigo_barras" id="codigo_barras" class="form-control" value="{{ $acordo->codigo_barras }}">
                            </div>
                        </div>

                        {{-- LINHA 6 --}}
                        <div class="row">
                            {{-- PRINCIPAL --}}
                            <div class="form-group col-2">
                                <label for="principal">Principal</label>
                                <input type="text" name="principal" id="principal" class="form-control" value="{{ $acordo->principal }}" disabled>
                            </div>
                            {{-- CUSTAS --}}
                            <div class="form-group col-2">
                                <label for="custas">Custas</label>
                                <input type="text" name="custas" id="custas" class="form-control" value="{{ $acordo->custas }}" disabled>
                            </div>
                            {{-- HONORARIOS SUCUMBENCIAIS --}}
                            <div class="form-group col-2">
                                <label for="honorarios_sucumbenciais">Hono. Sucumbenciais</label>
                                <input type="text" name="honorarios_sucumbenciais" id="honorarios_sucumbenciais" class="form-control" value="{{ $acordo->honorarios_sucumbenciais }}" disabled>
                            </div>
                            {{-- HONORARIOS PERICIAIS --}}
                            <div class="form-group col-2">
                                <label for="honorarios_periciais">Hono. Periciais</label>
                                <input type="text" name="honorarios_periciais" id="honorarios_periciais" class="form-control" value="{{ $acordo->honorarios_periciais }}" disabled>
                            </div>
                            {{-- Qtd ENVOLVIDOS --}}
                            <div class="form-group col-2">
                                <label for="qtd_envolvidos">Qtd. Envolvidos</label>
                                <select name="qtd_envolvidos" id="qtd_envolvidos" class="form-control">
                                    <option value="1" @if ($acordo->qtd_envolvidos == '1') selected @endif>1</option>
                                    <option value="2" @if ($acordo->qtd_envolvidos == '2') selected @endif>2</option>
                                </select>
                            </div>
                            {{-- FAVORECIDO --}}
                            <div class="form-group col-2">
                                <label for="favorecido">Favorecido</label>
                                <select name="favorecido" id="favorecido" class="form-control">
                                    <option value="" @if ($acordo->favorecido == '') selected @endif>Selecione</option>
                                    <option value="1" @if ($acordo->favorecido == '1') selected @endif>AUTOR</option>
                                    <option value="2" @if ($acordo->favorecido == '2') selected @endif>OUTROS</option>
                                </select>
                            </div>
                        </div>

                        {{-- LINHA 7 --}}
                        <div class="row">
                            {{-- NOME FAVORECIDO --}}
                            <div class="form-group col-3">
                                <label for="nome_favorecido">Nome Favorecido</label>
                                <input type="text" name="nome_favorecido" id="nome_favorecido" class="form-control" value="{{ $acordo->nome_favorecido }}">
                            </div>
                            {{-- CPF/CNPJ FAVORECIDO --}}
                            <div class="form-group col-2">
                                <label for="cpf_cnpj_favorecido">CPF/CNPJ Favorecido</label>
                                <input type="text" name="cpf_cnpj_favorecido" id="cpf_cnpj_favorecido" class="form-control" value="{{ $acordo->cpf_cnpj_favorecido }}">
                            </div>
                            {{-- FILIAL --}}
                            <div class="form-group col-1">
                                <label for="cpf_cnpj_filial">Filial</label>
                                <input type="text" name="cpf_cnpj_filial" id="cpf_cnpj_filial" class="form-control" value="{{ $acordo->cpf_cnpj_filial }}" disabled>
                            </div>
                            {{-- FILIAL --}}
                            <div class="form-group col-1">
                                <label for="cpf_cnpj_digito">Digito</label>
                                <input type="text" name="cpf_cnpj_digito" id="cpf_cnpj_digito" class="form-control" value="{{ $acordo->cpf_cnpj_digito }}" disabled>
                            </div>
                        </div>

                        {{-- LINHA 8 --}}
                        <div class="row">
                            <div class="col-6">
                                <label for="justificativa">Justificativa</label>
                                <textarea name="justificativa" id="justificativa" rows="8" class="form-control">{{ $acordo->justificativa }}</textarea>
                            </div>
                            <div class="col-6">
                                <label for="obrigacao_fazer">Obrigação de Fazer</label>
                                <textarea name="obrigacao_fazer" id="obrigacao_fazer" rows="8" class="form-control">{{ $acordo->obrigacao_fazer }}</textarea>
                            </div>
                        </div>

                        {{-- LINHA HR --}}
                        <div class="row mt-3 mb-n4">
                            <hr class="col">
                        </div>
                    </div>

                    {{-- BOTÃO SUBMIT --}}
                    <div class="card-footer text-center">
                        <a href="#" class="btn btn-warning mx-2">Voltar</a>
                        <button type="submit" class="btn btn-success">Atualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="../js/acordo.js"></script>
@stop

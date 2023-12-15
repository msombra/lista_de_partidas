@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Agenda Jogos')

@section('content_header', 'Partidas - Final de Semana')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            {{-- BOTÕES --}}
            <div class="text-right">
                {{-- INSERIR --}}
                <a href="{{ route('partidas.inserir_partida') }}" class="btn btn-success" title="Inserir partida">Inserir</a>
                @if (!$partidas->isEmpty())
                    {{-- LIMPAR --}}
                    <a href="{{ route('partidas.limpar_tudo') }}" id="limpar" class="btn btn-danger" title="Limpar listagem">Limpar</a>
                    {{-- MOSTRAR AÇÕES --}}
                    <button class="btn btn-warning" id="mostrar-acoes" title="Exibir/Esconder ações">Mostrar Ações</button>
                @endif
            </div>

            {{-- TABELA CARD --}}
            <div class="card mt-3">
                <div class="card-body table-responsive p-0">
                    {{-- inicio tabela --}}
                    <table class="table table-sm table-hover text-nowrap text-center" style="cursor: default">
                        {{-- ============================== PARTIDAS NO SÁBADO ============================== --}}

                        {{-- cabeçalho --}}
                        @include('pages.includes.cabecalho_table', ['titulo' => 'Sábado'])
                        {{-- listagem --}}
                        @foreach ($partidas_sabado as $partida)
                            @include('pages.includes.list')
                        @endforeach
                        {{-- caso não exista partidas --}}
                        @if ($partidas_sabado->isEmpty())
                            <tr>
                                <td colspan="5">Nenhuma partida cadastrada para sábado.</td>
                            </tr>
                        @endif
                        {{-- ================================================================================ --}}

                        {{-- ============================== PARTIDAS NO DOMINGO ============================== --}}

                        {{-- cabeçalho --}}
                        @include('pages.includes.cabecalho_table', ['titulo' => 'Domingo'])
                        {{-- listagem --}}
                        @foreach ($partidas_domingo as $partida)
                            @include('pages.includes.list')
                        @endforeach
                        {{-- caso não exista partidas --}}
                        @if ($partidas_domingo->isEmpty())
                            <tr>
                                <td colspan="5">Nenhuma partida cadastrada para domingo.</td>
                            </tr>
                        @endif
                        {{-- ================================================================================ --}}

                    </table>
                    {{-- final tabela --}}
                </div>
            </div>

        </div>
    </div>
@stop

@section('js')
    {{-- Carrega as regras da listagem --}}
    <script src="../js/regras_list.js"></script>
    {{-- Carrega as toasts --}}
    @include('pages.includes.toasts')
@stop

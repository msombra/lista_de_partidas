@extends('adminlte::page')

{{-- Plug-in Toasts --}}
@section('plugins.Sweetalert2', true)

{{-- Título da página --}}
@section('title', 'Agenda Jogos')

{{-- Título da tela --}}
@section('content_header', 'Partidas - Final de Semana')

{{-- Conteúdo --}}
@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            {{-- BOTÕES --}}
            <div class="text-right">
                {{-- Inserir --}}
                <a href="{{ route('partidas.inserir_partida') }}" class="btn btn-success" title="Inserir partida">Inserir</a>
                {{-- se houver partidas --}}
                @if (!$partidas->isEmpty())
                    {{-- Limpar --}}
                    <a href="{{ route('partidas.limpar_tudo') }}" class="btn btn-danger" title="Limpar listagem" onclick="return confirm('Deseja limpar a listagem?')">Limpar</a>
                    {{-- Mostrar Ações --}}
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
                        @foreach ($partidasPorDia[1] as $partida)
                            @include('pages.includes.list')
                        @endforeach
                        {{-- caso não exista partidas --}}
                        @if ($partidasPorDia[1] == null)
                            @include('pages.includes.linha_sem_partidas', ['dia' => 'sábado'])
                        @endif
                        {{-- ================================================================================ --}}

                        {{-- ============================== PARTIDAS NO DOMINGO ============================== --}}

                        {{-- cabeçalho --}}
                        @include('pages.includes.cabecalho_table', ['titulo' => 'Domingo'])
                        {{-- listagem --}}
                        @foreach ($partidasPorDia[2] as $partida)
                            @include('pages.includes.list')
                        @endforeach
                        {{-- caso não exista partidas --}}
                        @if ($partidasPorDia[2] == null)
                            @include('pages.includes.linha_sem_partidas', ['dia' => 'domingo'])
                        @endif
                        {{-- ================================================================================ --}}

                        {{-- ============================== PARTIDAS NA SEGUNDA ============================== --}}

                        {{-- Se houver partidas na segunda --}}
                        @if ($partidasPorDia[3] != null)
                            {{-- cabeçalho --}}
                            @include('pages.includes.cabecalho_table', ['titulo' => 'Segunda'])
                            {{-- listagem --}}
                            @foreach ($partidasPorDia[3] as $partida)
                                @include('pages.includes.list')
                            @endforeach
                        @endif
                        {{-- ================================================================================ --}}

                    </table>
                    {{-- final tabela --}}
                </div>
            </div>

        </div>
    </div>
@stop

{{-- Scripts --}}
@section('js')
    {{-- Carrega as regras da listagem --}}
    <script src="../js/regras_list.js"></script>
    {{-- Carrega as toasts --}}
    @include('pages.includes.toasts')
@stop

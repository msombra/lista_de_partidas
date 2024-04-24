@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Agenda Jogos')

@section('plugins.Datatables', true)

@section('content_header', 'Partidas - Lista de Times Existentes')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            {{-- BOTÕES --}}
            <div class="text-right">
                <a href="{{ route('partidas.index') }}" class="btn btn-sm btn-warning" title="Ir para listagem das partidas">Listagem partidas</a>
                <a href="{{ route('partidas.times_insert') }}" class="btn btn-sm btn-primary" title="Cadastrar um time existente">Cadastrar Time</a>
            </div>

            <div class="card mt-3 p-3">
                <div class="card-body table-responsive p-0">
                    <table class="table table-sm table-striped text-nowrap text-center" style="cursor: default">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Liga</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tbl_times as $time)
                                <tr>
                                    <td>{{ $time->nome }}</td>
                                    <td>{{ $time->liga }}</td>
                                    <td>
                                        <form action="{{ route('partidas.times_delete', $time->id) }}" class="form_delete" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('partidas.times_edit', $time->id) }}" class="btn btn-success btn-sm" title="Editar time">
                                                <i class="fas fa-fw fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm" title="Deletar time" onclick="return confirm('Deseja excluir o time?')">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    {{-- Carrega o script da Datatable --}}
    <script src="../js/datatable.js"></script>
    {{-- Carrega as toasts --}}
    @include('pages.includes.toasts')
@stop

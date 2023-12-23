@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Agenda Jogos')

@section('plugins.Datatables', true)

@section('content_header', 'Partidas - Lista de Times Existentes')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card mt-3 p-3">
                <div class="card-body table-responsive p-0">
                    <table class="table table-sm table-striped text-nowrap text-center" id="tbl_times" style="cursor: default">
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
                                        <form action="#" id="" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="#" class="btn btn-success btn-sm" title="Editar partida">
                                                <i class="fas fa-fw fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm" title="Deletar partida">
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
    <script src="../js/datatable.js"></script>
    {{-- Carrega as toasts --}}
    @include('pages.includes.toasts')
@stop

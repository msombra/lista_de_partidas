@extends('adminlte::page')

@section('title', 'Agenda Jogos')

@section('content_header', 'Partidas - Final de Semana')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            {{-- <form class="text-right" method="get" action="{{ route('agenda.delete') }}">
                @csrf
                <button type="submit" class="btn btn-primary">Limpar</button>
            </form> --}}
            <div class="text-right">
                <a href="{{ route('partidas.inserir_partida') }}" class="btn btn-success mx-2" title="Inserir partida">Inserir</a>
                <a href="{{ route('partidas.delete') }}" id="limpar" class="btn btn-danger" title="Limpar listagem">Limpar</a>
            </div>
            <div class="card mt-3">
                <div class="card-body table-responsive p-0">
                    <table class="table table-sm table-hover text-nowrap" style="cursor: default">
                        {{-- PARTIDAS NO SÁBADO --}}
                        <tr>
                            <th class="text-center bg-primary" colspan="5">
                                <h4 class="my-auto">Sábado</h4>
                            </th>
                        </tr>
                        @foreach ($partidas_sabado as $partida)
                            <tr class="{{ $partida->partida_importante == 1 ? 'bg-warning' : '' }}">
                                <td>{{ $partida->time_principal }}</td>
                                <td>vs.</td>
                                @if ($partida->adversario_nao_existente != null)
                                    <td>{{ $partida->adversario_nao_existente }}</td>
                                @else
                                    <td>{{ $partida->adversario_existente }}</td>
                                @endif
                                <td>{{ date("H\hi", strtotime($partida->horario)) }}</td>
                                {{-- AÇÕES --}}
                                <td class="text-right">
                                    <a href="#" class="btn btn-outline-primary btn-sm" title="Editar partida">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <button class="btn btn-warning btn-sm" title="Destacar partida">
                                        <i class="fas fa-fw fa-star"></i>
                                    </button>
                                    <a href="#" class="btn btn-danger btn-sm" title="Deletar partida">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @if ($partidas_sabado->isEmpty())
                            <tr>
                                <td colspan="5">Nenhuma partida cadastrada para sábado.</td>
                            </tr>
                        @endif


                        {{-- PARTIDAS NO DOMINGO --}}
                        <tr>
                            <th class="text-center bg-primary" colspan="5">
                                <h4 class="my-auto">Domingo</h4>
                            </th>
                        </tr>
                        @foreach ($partidas_domingo as $partida)
                            <tr class="{{ $partida->partida_importante == 1 ? 'bg-warning' : '' }}">
                                <td>{{ $partida->time_principal }}</td>
                                <td>vs.</td>
                                @if ($partida->adversario_nao_existente != null)
                                    <td>{{ $partida->adversario_nao_existente }}</td>
                                @else
                                    <td>{{ $partida->adversario_existente }}</td>
                                @endif
                                <td>{{ date("H\hi", strtotime($partida->horario)) }}</td>
                                {{-- AÇÕES --}}
                                <td class="text-right">
                                    <a href="#" class="btn btn-outline-primary btn-sm" title="Editar partida">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                    <button class="btn btn-warning btn-sm" title="Destacar partida">
                                        <i class="fas fa-fw fa-star"></i>
                                    </button>
                                    <a href="#" class="btn btn-danger btn-sm" title="Deletar partida">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @if ($partidas_domingo->isEmpty())
                            <tr>
                                <td colspan="4">Nenhuma partida cadastrada para domingo.</td>
                            </tr>
                        @endif
                    </table>
                </div>

            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('#limpar').click(function(e) {
            if (!confirm('Deseja limpar a listagem?')) {
                e.preventDefault(); // Impede o comportamento padrão do link
            }
        });
    </script>
@stop

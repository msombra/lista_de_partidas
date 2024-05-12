@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Push RMS')

@section('content_header', 'Push RMS - Lista das Partes')

@section('content')
    @component('components.card_box')
        @slot('tabela')

            <table class="table table-sm table-striped text-nowrap" style="cursor: default">
                <thead>
                    <tr>
                        <th>Partes</th>
                        <th class="text-center">Status</th>
                        <th>Ler</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <form action="{{ route('push_rms.update', $registro->id) }}" method="post">
                                @csrf
                                <td>{{ $registro->parte }}</td>
                                <td class="text-center">
                                    <span class="badge badge-pill {{ $registro->lido == true ? 'badge-success' : 'badge-danger' }}">
                                        {{ $registro->lido == true ? 'Lido' : 'Não lido' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input check-size" name="lido" id="lido">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-sm" {{ $registro->lido == true ? 'disabled' : '' }}>
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-sm" {{ $registro->lido == false ? 'disabled' : '' }}>
                                        <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endslot
    @endcomponent
@stop

@section('css')
    <style>
        .check-size {
            width: 1.2rem;
            height: 1.2rem;
        }
    </style>
@stop

@section('js')
    {{-- Carrega o script da Datatable --}}
    <script src="../js/datatable.js"></script>
@stop

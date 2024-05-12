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
                        <th>Ação</th>
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
                                    <input type="checkbox" class="lido form-check-input check-size" name="lido" {{ $registro->lido == true ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <button type="submit" class="confirmar btn btn-secondary btn-sm" disabled>
                                        Confirmar
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
    <script>
        $(document).ready(function() {
            $('.lido').change(function() {
                let confirm = $(this).closest('tr').find('.confirmar');

                confirm.toggleClass('btn-primary btn-secondary');
                confirm.prop('disabled', function(index, attr) {
                    return !attr;
                });
            });
        });
    </script>
@stop
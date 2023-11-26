@extends('adminlte::page')

@section('title', 'BABi - Acordo')

@section('content_header', 'Acordo Listagem')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>UF</th>
                                <th>GCPJ</th>
                                <th>Valor Total</th>
                                <th>Tipo Depósito</th>
                                <th>Data Limite Pagamento</th>
                                <th>Nome Favorecido</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acordos as $acordo)
                                <tr>
                                    <td>{{ $acordo->uf }}</td>
                                    <td>{{ $acordo->gcpj }}</td>
                                    <td>{{ $acordo->valor_total }}</td>
                                    <td>{{ $acordo->tipo_deposito }}</td>
                                    <td>{{ $acordo->data_limite_pagamento }}</td>
                                    <td>{{ $acordo->nome_favorecido }}</td>
                                    <td>
                                        <a href="{{ route('acordo.edit', $acordo->id) }}" class="btn btn-sm btn-success">
                                            <i class="nav-icon fas fa-edit"></i>
                                        </a>
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

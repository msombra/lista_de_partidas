@extends('adminlte::page')

@section('title', 'Listagem')

@section('content_header')
    <h1>Teste - Listagem</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Item</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->nome }}</td>
                            {{-- @if ($data->id_item == $item->id)
                                <td>{{ $item->item }}</td>
                            @endif --}}
                            {{-- @if ($data->item)
                                <td>{{ $data->id_item->item }}</td>
                            @endif --}}
                            <td>Item</td>
                            <td>
                                <a href="#" class="btn btn-success">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@stop

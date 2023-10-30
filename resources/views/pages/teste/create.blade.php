@extends('adminlte::page')

@section('title', 'Cadastro')

@section('content_header')
    <h1>Teste - Cadastrar</h1>
@stop

@section('content')
    <div class="card">

        <form action="{{ route('teste.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="itens">Itens</label>
                    <select class="form-control" id="itens" name="itens">
                        <option value="">Selecione</option>
                        @foreach ($itens as $data)
                            <option value="{{ $data->id }}">
                                {{ $data->item }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Incluir</button>
            </div>
        </form>
    </div>
@stop

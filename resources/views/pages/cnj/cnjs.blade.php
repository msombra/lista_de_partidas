@extends('adminlte::page')

@section('title', 'Push RMS - Cnjs')

@section('content_header', 'Lista de CNJs')

@section('content')
    <div class="row">
        <div class="col-6 mx-auto">
            {{-- BOTÕES --}}
            <div class="text-right">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalInsert">Inserir Novo CNJ</button>
            </div>

            <div class="card mt-3 p-3">
                <div class="card-body table-responsive p-0">
                    <table class="table table-sm table-striped text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>CNJ</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dados as $dado)
                                <tr>
                                    <td>{{ $dado->cnj }}</td>
                                    <td class="d-flex justify-content-center">
                                        <button class="btn btn-success btn-sm edit-btn mr-2" data-toggle="modal" data-target="#modalEdit{{ $dado->id }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <form action="{{ route('cnjs.destroy', $dado->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir o cnj?')">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @include('pages.includes.modal_edit')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @include('pages.includes.modal_insert')
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function(){
            var error = "{{ $errors->has('cnj') }}";

            if(error) {
                $('#modalInsert').modal('show');
            }
        });
    </script>
@stop

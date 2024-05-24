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
            @include('pages.includes.modal_insert')

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
                                    <td>
                                        <button class="btn btn-success btn-sm edit-btn" data-id="{{ $dado->id }}" data-cnj="{{ $dado->cnj }}" data-toggle="modal" data-target="#modalInsert">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $dado->id }}">
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>
                                        {{-- <form>
                                            @method('delete')
                                            @csrf
                                            <a class="btn btn-success btn-sm">
                                                <i class="fas fa-fw fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir o cnj?')">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form> --}}
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#modalForm').on('submit', function (e) {
                e.preventDefault();

                let id = $('#modalInsert').val();
                let url = id ? `/cnj=${id}` : '/cnjs';
                let method = id ? 'PUT' : 'POST';

                $.ajax({
                    url: url,
                    method: method,
                    data: $(this).serialize(),
                    success: function (response) {
                        location.reload();
                    }
                });
            });

            $('.edit-btn').on('click', function () {
                let id = $(this).data('id');
                let cnj = $(this).data('cnj');

                $('#cnjId').val(id);
                $('#cnj').val(cnj);
                $('#modalInsertLabel').text('Edit Task');
            });

            $('#modalForm').on('hidden.bs.modal', function () {
                $('#cnjId').val('');
                $('#cnj').val('');
                $('#modalInsertLabel').text('Add Task');
            });

            $('.delete-btn').on('click', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: `/cnj=${id}`,
                    method: 'DELETE',
                    success: function (response) {
                        location.reload();
                    }
                });
            });
        });
    </script>
@stop

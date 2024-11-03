@extends('adminlte::page')

@section('title', 'Agenda Jogos')

@section('content_header', 'Partidas - Editar Time Existente')

@section('content')
    <div class="row">
        <div class="col-4 mx-auto">
            <div class="card mt-3">
                <form action="{{ route('partidas.times_update', $time->id) }}" method="post" id="form_time">
                    @csrf
                    <div class="card-body">
                        {{-- TIME --}}
                        <div>
                            <label for="time">Time</label>
                            <input type="text" class="form-control @if ($errors->has($t->nome)) is-invalid @endif" id="time" name="{{ $t->nome }}" value="{{ old($t->nome, $time->nome) }}">
                            {{-- Mensagens de Erro --}}
                            @include('pages.includes.msg_errors', ['campo' => $t->nome])
                        </div>
                        {{-- LIGA --}}
                        <div class="my-3">
                            <label for={{ $t->liga }}>Liga</label>
                            <select class="form-control @if ($errors->has($t->liga)) border-danger @endif" name={{ $t->liga }} id={{ $t->liga }}>
                                <option value="">Selecione</option>
                                @foreach ($ligas as $liga)
                                    <option value="{{ $liga->id }}" {{ old($t->liga, $time->liga) == $liga->id ? 'selected' : '' }}>
                                        {{ $liga->nome }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- Mensagens de Erro --}}
                            @include('pages.includes.msg_errors', ['campo' => $t->liga])
                        </div>
                    </div>
                    {{-- BOTÕES --}}
                    <div class="card-footer text-center">
                        <a href="{{ route('partidas.times_list') }}" class="btn btn-outline-secondary mx-2">Voltar</a>
                        <button type="submit" class="btn btn-primary" id="atualizar" disabled>Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="../js/regras_time.js"></script>
    <script>
        $(document).ready(function() {
            const initialTime = $('#time').val();
            const initialLiga = $('#liga').val();

            $('#time, #liga').on('input change', function() {
                let changedTime = $('#time').val();
                let changedLiga = $('#liga').val();

                let state = (changedTime !== initialTime || changedLiga !== initialLiga) ? false : true;

                $('#atualizar').prop('disabled', state);
            })
        })
    </script>
@endsection

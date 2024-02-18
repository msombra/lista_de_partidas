@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Agenda Jogos')

@section('content_header', 'Editar Partida')

@section('content')
    <div class="row">
        <div class="col-5 mx-auto">
            <div class="card">

                <form action="{{ route('partidas.update', $partida->id) }}" method="post">
                    @csrf
                    <div class="card-body row">
                        {{-- Time Principal --}}
                        <div class="form-group col-12">
                            <label for="time_principal">Time principal</label>
                            <select class="form-control @if ($errors->has('time_principal')) is-invalid @endif" name="time_principal" id="time_principal">
                                <option value="">Selecione</option>
                                @foreach ($times as $time)
                                    <option value="{{ $time->id }}" {{ old('time_principal', $partida->time_principal) == $time->id ? 'selected' : '' }}>
                                        {{ $time->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @include('pages.includes.msg_errors', ['campo' => 'time_principal'])
                        </div>

                        {{-- Tipo Adversário --}}
                        <div class="form-group col-12">
                            <div>
                                <b>Time adversário é:</b>
                            </div>
                            <div class="form-check mt-2">
                                {{-- Opção 1 --}}
                                <div>
                                    <input class="form-check-input" type="radio" id="nao_existente" name="tipo_adversario" value="1" checked {{ old('tipo_adversario', $partida->tipo_adversario) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="nao_existente">Não Existente</label>
                                </div>
                                {{-- Opção 2 --}}
                                <div>
                                    <input class="form-check-input" type="radio" id="existente" name="tipo_adversario" value="2" {{ old('tipo_adversario', $partida->tipo_adversario) == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="existente">Existente</label>
                                </div>
                            </div>
                        </div>

                        {{-- Time Adversário --}}
                        <div class="form-group col-12">
                            <label>Time adversário</label>
                            {{-- Adversário Input --}}
                            <input type="text" class="form-control @if ($errors->has('time_adversario')) is-invalid @endif" id="adversario_input" name="time_adversario" value="{{ old('time_adversario', $partida->time_adversario) }}">
                            {{-- Adversário Select --}}
                            <select hidden class="form-control @if ($errors->has('time_adversario')) is-invalid @endif" name="" id="adversario_select">
                                <option value="">Selecione</option>
                                @foreach ($times as $time)
                                    <option value="{{ $time->nome }}" {{ old('time_adversario', $partida->time_adversario) == $time->nome ? 'selected' : '' }}>
                                        {{ $time->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @include('pages.includes.msg_errors', ['campo' => 'time_adversario'])
                        </div>

                        {{-- Dia da Partida --}}
                        <div class="form-group col-6">
                            <label for="dia">Dia da partida</label>
                            <select class="form-control @if ($errors->has('dia')) is-invalid @endif" name="dia" id="dia">
                                @php
                                    $dia = 'dia';
                                    $data = $partida->dia;
                                @endphp
                                <option value="">Selecione</option>
                                <option value="1" {{ old($dia, $data) == 1 ? 'selected' : '' }}>Sábado</option>
                                <option value="2" {{ old($dia, $data) == 2 ? 'selected' : '' }}>Domingo</option>
                                <option value="3" {{ old($dia, $data) == 3 ? 'selected' : '' }}>Segunda</option>
                            </select>
                            @include('pages.includes.msg_errors', ['campo' => 'dia'])
                        </div>

                        {{-- Horário do Jogo --}}
                        <div class="form-group col-6">
                            <label for="horario">Horário do Jogo</label>
                            <input type="time" class="form-control @if ($errors->has('horario')) is-invalid @endif" id="horario" name="horario" value="{{ old('horario', $partida->horario ) }}">
                            @include('pages.includes.msg_errors', ['campo' => 'horario'])
                        </div>
                    </div>

                    {{-- Botões --}}
                    <div class="card-footer text-center">
                        {{-- Voltar --}}
                        <a href="{{ route('partidas.index') }}" class="btn btn-outline-secondary mx-2">Voltar</a>
                        {{-- Inserir --}}
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

@section('js')
    {{-- <script src="../js/regras_insert.js"></script> --}}
    <script src="../js/regras_teste.js"></script>
    <script>
        $(function() {
            let time_principal = $('#time_principal').val();
            let psg = 11;

            if(time_principal == psg) {
                $('#existente').prop('disabled', true);
            }
        });
    </script>
@stop

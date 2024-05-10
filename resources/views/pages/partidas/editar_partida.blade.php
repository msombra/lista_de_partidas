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
                        {{-- Liga --}}
                        <div class="form-group col-12">
                            <label for="{{ $p->liga }}">Liga</label>
                            <select class="form-control @if ($errors->has($p->liga)) is-invalid @endif" id="{{ $p->liga }}" name="{{ $p->liga }}">
                                <option value="">Selecione a liga</option>
                                @foreach ($ligas as $liga)
                                    <option value="{{ $liga->id }}" {{ old($p->liga, $partida->liga) == $liga->id ? 'selected' : '' }}>
                                        {{ $liga->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @include('pages.includes.msg_errors', ['campo' => $p->liga])
                        </div>

                        {{-- Time Principal --}}
                        <div class="form-group col-12">
                            <label for="{{ $p->time_principal }}">Time principal</label>
                            <select class="form-control @if ($errors->has($p->time_principal)) is-invalid @endif" name="{{ $p->time_principal }}" id="{{ $p->time_principal }}">
                                <option value="">Selecione</option>
                                @foreach ($times as $time)
                                    <option value="{{ $time->id }}" data-liga="{{ $time->liga }}" {{ old($p->time_principal, $partida->time_principal) == $time->id ? 'selected' : '' }}>
                                        {{ $time->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @include('pages.includes.msg_errors', ['campo' => $p->time_principal])
                        </div>

                        {{-- Tipo Adversário --}}
                        <div class="form-group col-12">
                            <div>
                                <b>Time adversário é:</b>
                            </div>
                            <div class="form-check mt-2">
                                {{-- Opção 1 --}}
                                <div>
                                    <input class="form-check-input" type="radio" id="nao_existente" name="{{ $p->tipo_adversario }}" value="1" checked {{ old($p->tipo_adversario, $partida->tipo_adversario) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="nao_existente">Não Existente</label>
                                </div>
                                {{-- Opção 2 --}}
                                <div>
                                    <input class="form-check-input" type="radio" id="existente" name="{{ $p->tipo_adversario }}" value="2" {{ old($p->tipo_adversario, $partida->tipo_adversario) == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="existente">Existente</label>
                                </div>
                            </div>
                        </div>

                        {{-- Time Adversário --}}
                        <div class="form-group col-12">
                            <label>Time adversário</label>
                            {{-- Adversário Input --}}
                            <input type="text" class="form-control @if ($errors->has($p->time_adversario)) is-invalid @endif" id="adversario_input" name="{{ $p->time_adversario }}" value="{{ old($p->time_adversario, $partida->time_adversario) }}">
                            {{-- Adversário Select --}}
                            <select hidden class="form-control @if ($errors->has($p->time_adversario)) is-invalid @endif" name="" id="adversario_select">
                                <option value="">Selecione</option>
                                @foreach ($times as $time)
                                    <option value="{{ $time->nome }}" data-id="{{ $time->id }}" data-liga="{{ $time->liga }}" {{ old($p->time_adversario, $partida->time_adversario) == $time->nome ? 'selected' : '' }}>
                                        {{ $time->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @include('pages.includes.msg_errors', ['campo' => $p->time_adversario])
                        </div>

                        {{-- Dia da Partida --}}
                        <div class="form-group col-6">
                            <label for="{{ $p->f_dia }}">Dia da partida</label>
                            <select class="form-control @if ($errors->has($p->f_dia)) is-invalid @endif" name="{{ $p->f_dia }}" id="{{ $p->f_dia }}">
                                @php $data = $partida->dia; @endphp
                                <option value="">Selecione</option>
                                <option value="1" {{ old($p->f_dia, $data) == 1 ? 'selected' : '' }}>Sábado</option>
                                <option value="2" {{ old($p->f_dia, $data) == 2 ? 'selected' : '' }}>Domingo</option>
                                <option value="3" {{ old($p->f_dia, $data) == 3 ? 'selected' : '' }}>Segunda</option>
                            </select>
                            @include('pages.includes.msg_errors', ['campo' => $p->f_dia])
                        </div>

                        {{-- Horário do Jogo --}}
                        <div class="form-group col-6">
                            <label for="{{ $p->horario }}">Horário do Jogo</label>
                            <input type="time" class="form-control @if ($errors->has($p->horario)) is-invalid @endif" id="{{ $p->horario }}" name="{{ $p->horario }}" value="{{ old($p->horario, $partida->horario ) }}">
                            @include('pages.includes.msg_errors', ['campo' => $p->horario])
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
    <script src="../js/regras_insert.js"></script>

    <script>
        $(function() {
            let time_principal = $('#time_principal').val();
            let psg = 11;

            if(time_principal == psg) {
                $('#existente').prop('disabled', true);
            }
        });

        $(function() {
            let liga = $('#liga').val();

            $('#time_principal option').each(function() {
                let ligaTimePrincipal = $(this).data('liga');

                // (ligaTimePrincipal != liga) ? $(this).hide() : $(this).show();
                (liga == "" || ligaTimePrincipal == liga) ? $(this).show() : $(this).hide();
            });
        });

        $(function() {
            let time_principal = $('#time_principal').val();
            let liga = $('#liga').val();

            $('#adversario_select option').each(function() {
                // let time_adversario = $(this).val();
                let time_adversario = $(this).data('id');
                let ligaTimeAdversario = $(this).data('liga');
                // condições lógicas
                let comparaTimes = time_principal == time_adversario;
                let comparaLigas = liga != ligaTimeAdversario;

                (comparaTimes || comparaLigas) ? $(this).hide() : $(this).show();
            });
        });
    </script>
@stop

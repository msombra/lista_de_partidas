@extends('adminlte::page')

@section('title', 'Agenda Jogos')

@section('content_header', 'Editar Partida')

@section('content')
    <div class="row">
        <div class="col-5 mx-auto">
            <div class="card">

                <form action="{{ route('partidas.update', $partida->id) }}" method="post">
                    @csrf
                    <div class="card-body row">
                        {{-- TIME PRINCIPAL --}}
                        <div class="form-group col-12">
                            <label for="time_principal">Time principal</label>
                            <select class="form-control" name="time_principal" id="time_principal">
                                <option value="">Selecione</option>
                                @foreach ($times as $time)
                                    <option value="{{ $time->id }}" {{ $partida->time_principal == $time->id ? 'selected' : '' }}>
                                        {{ $time->nome }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- @if ($errors->has('time_principal'))
                                <small class="text-danger"><i>
                                    @foreach($errors->get('time_principal') as $error)
                                        {{ $error }}
                                    @endforeach
                                </i></small>
                            @endif --}}
                        </div>

                        {{-- TIME ADVERSARIO É: --}}
                        <div class="form-group col-12">
                            <div>
                                <b>Time adversário é:</b>
                            </div>
                            <div class="form-check mt-2">
                                {{-- NÃO EXISTENTE --}}
                                <div>
                                    <input class="form-check-input" type="radio" id="nao_existente" name="tipo_adversario" value="1" {{ $partida->tipo_adversario == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="nao_existente">Não Existente</label>
                                </div>
                                {{-- EXISTENTE --}}
                                <div>
                                    <input class="form-check-input" type="radio" id="existente" name="tipo_adversario" value="2" {{ $partida->tipo_adversario == 2 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="existente">Existente</label>
                                </div>
                            </div>
                        </div>

                        {{-- NOME TIME ADVERSÁRIO --}}
                        <div class="form-group col-12" id="adversarioNaoExistente" style="display: none;">
                            <label for="adversario_nao_existente">Nome time adversário</label>
                            <input type="text" class="form-control" id="adversario_nao_existente" name="adversario_nao_existente" value="{{ $partida->adversario_nao_existente }}">
                            {{-- @if ($errors->has('adversario_nao_existente'))
                                <small class="text-danger"><i>
                                    @foreach($errors->get('adversario_nao_existente') as $error)
                                        {{ $error }}
                                    @endforeach
                                </i></small>
                            @endif --}}
                        </div>

                        {{-- TIME ADVERSÁRIO --}}
                        <div class="form-group col-12" id="adversarioExistente" style="display: none;">
                            <label for="adversario_existente">Time adversário</label>
                            <select class="form-control" name="adversario_existente" id="adversario_existente">
                                <option value="">Selecione</option>
                                @foreach ($times as $time)
                                    <option value="{{ $time->id }}" {{ $partida->adversario_existente == $time->id ? 'selected' : '' }}>
                                        {{ $time->nome }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- @if ($errors->has('adversario_existente'))
                                <small class="text-danger"><i>
                                    @foreach($errors->get('adversario_existente') as $error)
                                        {{ $error }}
                                    @endforeach
                                </i></small>
                            @endif --}}
                        </div>

                        {{-- DIA DA PARTIDA --}}
                        <div class="form-group col-6">
                            <label for="dia">Dia da partida</label>
                            <select class="form-control" name="dia" id="dia">
                                <option value="">Selecione</option>
                                <option value="1" {{ $partida->dia == 1 ? 'selected' : '' }}>Sábado</option>
                                <option value="2" {{ $partida->dia == 2 ? 'selected' : '' }}>Domingo</option>
                                <option value="3" {{ $partida->dia == 3 ? 'selected' : '' }}>Segunda</option>
                            </select>
                            {{-- @if ($errors->has('dia'))
                                <small class="text-danger"><i>
                                    @foreach($errors->get('dia') as $error)
                                        {{ $error }}
                                    @endforeach
                                </i></small>
                            @endif --}}
                        </div>

                        {{-- HORÁRIO DO JOGO --}}
                        <div class="form-group col-6">
                            <label for="horario">Horário do Jogo</label>
                            <input type="time" class="form-control" id="horario" name="horario" value="{{ $partida->horario }}">
                            {{-- @if ($errors->has('horario'))
                                <small class="text-danger"><i>
                                    @foreach($errors->get('horario') as $error)
                                        {{ $error }}
                                    @endforeach
                                </i></small>
                            @endif --}}
                        </div>
                    </div>

                    {{-- botão para enviar os dados para a tabela/agenda --}}
                    <div class="card-footer text-center">
                        <a href="{{ route('partidas.index') }}" class="btn btn-outline-secondary mx-2">Voltar</a>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="../js/regras_insert.js"></script>
    <script src="../js/regras_edit.js"></script>
@stop

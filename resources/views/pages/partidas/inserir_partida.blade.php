@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('title', 'Agenda Jogos')

@section('content_header', 'Tela para adicionar partidas')

@section('content')
    <div class="row">
        <div class="col-5 mx-auto">
            <div class="card">

                <form action="{{ route('partidas.store') }}" method="post">
                    @csrf
                    <div class="card-body row">
                        {{-- input do time principal --}}
                        <div class="form-group col-12">
                            <label for="time_principal">Time principal</label>
                            <select class="form-control" name="time_principal" id="time_principal">
                                <option value="">Selecione</option>
                                @foreach ($times as $time)
                                    <option value="{{ $time->id }}" {{ old('time_principal') == $time->id ? 'selected' : '' }}>
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

                        {{-- radio buttons para selecionar o time adversário --}}
                        <div class="form-group col-12">
                            <div>
                                <b>Time adversário é:</b>
                            </div>
                            <div class="form-check mt-2">
                                {{-- opção que abre a caixa de texto para digitar o nome do time adversário --}}
                                <div>
                                    <input class="form-check-input" type="radio" id="nao_existente" name="tipo_adversario" value="1">
                                    <label class="form-check-label" for="nao_existente">Não Existente</label>
                                </div>
                                {{-- opção que abre outro input para selecionar o time já existente --}}
                                <div>
                                    <input class="form-check-input" type="radio" id="existente" name="tipo_adversario" value="2">
                                    <label class="form-check-label" for="existente">Existente</label>
                                </div>
                            </div>
                        </div>

                        {{-- input para digitar o nome do time adversário --}}
                        <div class="form-group col-12" id="adversarioNaoExistente" style="display: none;">
                            <label for="adversario_nao_existente">Nome time adversário</label>
                            <input type="text" class="form-control" id="adversario_nao_existente" name="adversario_nao_existente">
                            {{-- @if ($errors->has('adversario_nao_existente'))
                                <small class="text-danger"><i>
                                    @foreach($errors->get('adversario_nao_existente') as $error)
                                        {{ $error }}
                                    @endforeach
                                </i></small>
                            @endif --}}
                        </div>

                        {{-- input para selecionar o time principal --}}
                        <div class="form-group col-12" id="adversarioExistente" style="display: none;">
                            <label for="adversario_existente">Time adversário</label>
                            <select class="form-control" name="adversario_existente" id="adversario_existente">
                                <option value="">Selecione</option>
                                @foreach ($times as $time)
                                    <option value="{{ $time->id }}" {{ old('adversario_existente') == $time->id ? 'selected' : '' }}>
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

                        {{-- input para selecionar o dia da partida --}}
                        <div class="form-group col-6">
                            <label for="dia">Dia da partida</label>
                            <select class="form-control" name="dia" id="dia">
                                <option value="">Selecione</option>
                                <option value="1">Sábado</option>
                                <option value="2">Domingo</option>
                            </select>
                            {{-- @if ($errors->has('dia'))
                                <small class="text-danger"><i>
                                    @foreach($errors->get('dia') as $error)
                                        {{ $error }}
                                    @endforeach
                                </i></small>
                            @endif --}}
                        </div>

                        {{-- input para informar o horário da partida --}}
                        <div class="form-group col-6">
                            <label for="horario">Horário do Jogo</label>
                            <input type="time" class="form-control" id="horario" name="horario">
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
                        <button type="submit" class="btn btn-primary">Inserir</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="../js/regras_insert.js"></script>

    @if(session('toast_clear'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Listagem limpada com sucesso!",
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                background: '#00BFFF',
                color: '#fff',
                iconColor: '#fff',
            });
        </script>
    @endif
@stop

<tr class="destacar" title="Destacar partida">
    <td>{{ $partida->time_principal }}</td>
    <td>vs.</td>
    <td>{{ ucwords($partida->time_adversario) }}</td>
    <td>{{ date("H\hi", strtotime($partida->horario)) }}</td>
    {{-- AÇÕES --}}
    <td class="acoes text-right" style="display: none;">
        <form action="{{ route('partidas.deletar_partida', $partida->id) }}" id="delete_form" method="post">
            @csrf
            @method('delete')
            {{-- Editar --}}
            <a href="{{ route('partidas.editar_partida', $partida->id) }}" class="btn btn-outline-primary btn-sm" title="Editar partida">
                <i class="fas fa-fw fa-edit"></i>
            </a>
            {{-- Deletar --}}
            <button type="submit" class="btn btn-danger btn-sm" title="Deletar partida">
                <i class="fas fa-fw fa-trash"></i>
            </button>
        </form>
    </td>
</tr>

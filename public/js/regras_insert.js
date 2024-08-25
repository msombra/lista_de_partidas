// Regras do campo Tipo Adversário
function verificarOpcaoSelecionada() {
    let select = $('#adversario_select');
    let input = $('#adversario_input');

    if ($('#existente').is(':checked')) {
        select.removeAttr('hidden');
        select.attr('name', 'time_adversario');
        input.prop('hidden', true);
        input.removeAttr('name');
        input.val('');
    } else {
        input.removeAttr('hidden');
        input.attr('name', 'time_adversario');
        select.prop('hidden', true);
        select.removeAttr('name');
        select.val('');
    }
}

// Função que limpa os selects do Time Principal e Adversário
function limpaSelectsTimes() {
    $('#time_principal').val('');
    $('#adversario_select').val('');
}

// DOCUMENT READY
$(document).ready(function() {

    // Change Select Liga
    $(function() {
        $('#liga').change(function() {
            let liga = $(this).val();
            limpaSelectsTimes();

            $('#time_principal option').each(function() {
                let ligaTimePrincipal = $(this).data('liga');

                // (ligaTimePrincipal != liga) ? $(this).hide() : $(this).show();
                (liga == "" || ligaTimePrincipal == liga) ? $(this).show() : $(this).hide();
            });
        });
    });

    // Change Select Time Principal
    $(function() {
        $('#time_principal').change(function() {
            let time_principal = $(this).val();
            let liga = $('#liga').val();
            $('#adversario_select').val('');

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
    });

    // Opção Não Existente
    $(function() {
        $('#nao_existente').click(function() {
            verificarOpcaoSelecionada();
            $('#adversario_input').focus();
        });
    });

    // Opção Existente
    $(function() {
        $('#existente').click(function() {
            verificarOpcaoSelecionada();
        });
    });

    // Função que aplica o foco no Horário logo após selecionar o Dia
    $(function() {
        $("#dia").change(function(){
            $('#horario').focus();
        });
    });

    verificarOpcaoSelecionada();

    $(function() {
        $('#time_principal').change(function() {
            let time_principal = $(this).val();
            let psg = 16;
            let existente = $('#existente');

            if(time_principal == psg) {
                existente.prop('disabled', true);
                $('#adversario_input').focus();
            }
            else {
                existente.prop('disabled', false);
            }
        });
    });
});

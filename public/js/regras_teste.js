// função que verifica qual opção está selecionada
function verificarOpcaoSelecionada() {
    if ($('#existente').is(':checked')) {
        $('#adversario_select').removeAttr('hidden');
        $('#adversario_select').attr('name', 'time_adversario');
        $('#adversario_input').prop('hidden', true);
        $('#adversario_input').removeAttr('name');
        $('#adversario_input').val('');
    } else {
        $('#adversario_input').removeAttr('hidden');
        $('#adversario_input').attr('name', 'time_adversario');
        $('#adversario_select').prop('hidden', true);
        $('#adversario_select').removeAttr('name');
        $('#adversario_select').val('');
    }
}

// Opção Não Existente
$('#nao_existente').click(function() {
    verificarOpcaoSelecionada();
    $('#adversario_input').focus();
});

// Opção Existente
$('#existente').click(function() {
    verificarOpcaoSelecionada();
});

$(window).on("load", function() {
    verificarOpcaoSelecionada();
});

// função que aplica o foco no Horário logo após selecionar o Dia
$("#dia").change(function(){
    $('#horario').focus();
});

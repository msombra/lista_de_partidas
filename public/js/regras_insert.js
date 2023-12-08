$('#nao_existente').click(function() {
    // alterando display dos elementos
    $('#adversarioNaoExistente').css('display', 'block');
    $('#adversarioExistente').css('display', 'none');
    // limpando campo
    $('#adversario_existente').val('');
    // aplica foco no input
    $('#adversario_nao_existente').focus();
});

$('#existente').click(function() {
    // alterando display dos elementos
    $('#adversarioExistente').css('display', 'block');
    $('#adversarioNaoExistente').css('display', 'none');
    // limpando campo
    $('#adversario_nao_existente').val('');
});

// função que aplica o foco no Horário logo após selecionar o Dia
$("#dia").change(function(){
    $('#horario').focus();
});

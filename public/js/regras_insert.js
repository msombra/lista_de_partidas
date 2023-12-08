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

// função que seleciona automaticamente a opção Não Existente caso o time principal seja o PSG
$('#time_principal').change(function() {
    var time_principal = $('#time_principal').val();
    var psg = 11;

    if(time_principal == psg) {
        $('#nao_existente').prop('checked', true);
        $('#existente').prop('disabled', true);
        $('#adversarioNaoExistente').css('display', 'block');
        $('#adversario_nao_existente').focus();
    }
    else {
        $('#nao_existente').prop('checked', false);
        $('#adversarioNaoExistente').css('display', 'none');
    }
});

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
    var al_nassr = 15;
    const PL = [1, 2, 3, 4, 5, 6, 7];
    const LA_LIGA = [8, 9, 17];
    const bundesliga = [10, 16, 18, 20];
    const ITA = [12, 13, 14, 19];

    $('#adversario_existente').val('');

    if(time_principal == psg || time_principal == al_nassr) {
        $('#nao_existente').prop('checked', true);
        $('#existente').prop('disabled', true);
        $('#adversarioNaoExistente').css('display', 'block');
        if($('#adversarioExistente').css('display') == 'block') {
            $('#adversarioExistente').css('display', 'none');
        }
        $('#adversario_nao_existente').focus();
    }
    else {
        $('#nao_existente').prop('checked', false);
        $('#adversarioNaoExistente').css('display', 'none');
        $('#existente').prop('disabled', false);
    }

    // regras para times da mesma liga
    if(PL.includes(Number(time_principal))) {
        PL.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").show();
        });
        LA_LIGA.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        bundesliga.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        ITA.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        $("#adversario_existente option[value="+time_principal+"]").hide();
    }
    else if(LA_LIGA.includes(Number(time_principal))) {
        PL.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        LA_LIGA.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").show();
        });
        bundesliga.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        ITA.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        $("#adversario_existente option[value="+time_principal+"]").hide();
    }
    else if(bundesliga.includes(Number(time_principal))) {
        PL.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        LA_LIGA.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        bundesliga.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").show();
        });
        ITA.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        $("#adversario_existente option[value="+time_principal+"]").hide();
    }
    else if(ITA.includes(Number(time_principal))) {
        PL.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        LA_LIGA.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        bundesliga.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").hide();
        });
        ITA.forEach(function(times) {
            $("#adversario_existente option[value="+times+"]").show();
        });
        $("#adversario_existente option[value="+time_principal+"]").hide();
    }
    else {
        $('#adversario_existente').find('option').hide();
    }
});

$('#adversario_existente').find('option').hide();

// $('#time_principal').click(function() {
//     var input = $('#time_principal');

//     if(input.hasClass('is-invalid')) {
//         input.removeClass('is-invalid');
//     }
// });

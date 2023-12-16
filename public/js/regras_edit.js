$(document).ready(function() {
    var time_principal = $('#time_principal').val();

    if ($('#nao_existente').prop('checked')) {
        $('#adversarioNaoExistente').css('display', 'block');
    }
    else {
        $('#adversarioExistente').css('display', 'block');
    }

    if(time_principal == 11 || time_principal == 15) {
        $('#existente').prop('disabled', true);
    }

    const PL = [1, 2, 3, 4, 5, 6, 7];
    const LA_LIGA = [8, 9, 17];
    const bundesliga = [10, 16, 18, 20];
    const ITA = [12, 13, 14, 19];

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

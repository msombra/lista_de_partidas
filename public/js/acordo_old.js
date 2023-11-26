const estados_cheque = [14, 24, 26];

function bloquearCampos() {
    $('#data_vencimento').prop('disabled', true);
    $('#tipo_solicitacao').prop('disabled', true);
    $('#solicitante').prop('disabled', true);
    $('#motivo_encerramento').prop('disabled', true);
    $('#pendencia_contabil').prop('disabled', true);
    $('#dep_conta_bradesco').prop('disabled', true);
    $('#nome_banco').prop('disabled', true);
    $('#agencia').prop('disabled', true);
    $('#tipo_conta').prop('disabled', true);
    $('#conta').prop('disabled', true);
    $('#digito').prop('disabled', true);
    $('#id_pagamento').prop('disabled', true);
    $('#codigo_barras').prop('disabled', true);
    $('#data_limite_pagamento').val('');
    $('#tipo_solicitacao').val('');
    $('#solicitante').val('');
    $('#motivo_encerramento').val('');
    $('#pendencia_contabil').val('');
    $('#dep_conta_bradesco').val('');
    $('#nome_banco').val('');
    $('#agencia').val('');
    $('#tipo_conta').val('');
    $('#conta').val('');
    $('#digito').val('');
    $('#id_pagamento').val('');
    $('#codigo_barras').val('');
}

function liberarCamposCheque() {
    $('#tipo_deposito').prop('disabled', true);
    $('#tipo_deposito').val(3);
    $('#forma_pagamento').prop('disabled', true);
    $('#forma_pagamento').val(3);
    $('#data_vencimento').prop('disabled', false);
    $('#tipo_solicitacao').val(1);
    $('#tipo_solicitacao').prop('disabled', true);
    $('#solicitante').prop('disabled', false);
    $('#motivo_encerramento').prop('disabled', false);
    $('#pendencia_contabil').prop('disabled', false);
    $('#dep_conta_bradesco').prop('disabled', false);
    $('#nome_banco').prop('disabled', false);
    $('#agencia').prop('disabled', false);
    $('#tipo_conta').prop('disabled', false);
    $('#conta').prop('disabled', false);
    $('#digito').prop('disabled', false);
    $('#codigo_barras').prop('disabled', false);
    $('#id_pagamento').prop('disabled', true);
    $('#id_pagamento').val('');
}

function liberarCamposJudicial() {
    $('#data_vencimento').prop('disabled', true);
    $('#tipo_solicitacao').prop('disabled', true);
    $('#solicitante').prop('disabled', true);
    $('#dep_conta_bradesco').prop('disabled', true);
    $('#nome_banco').prop('disabled', true);
    $('#agencia').prop('disabled', true);
    $('#tipo_conta').prop('disabled', true);
    $('#conta').prop('disabled', true);
    $('#digito').prop('disabled', true);
    $('#id_pagamento').prop('disabled', false);
    $('#data_vencimento').val('');
    $('#tipo_solicitacao').val('');
    $('#dep_conta_bradesco').val('');
    $('#nome_banco').val('');
    $('#agencia').val('');
    $('#tipo_conta').val('');
    $('#conta').val('');
    $('#digito').val('');
}

function liberarCamposCredConta() {
    $('#data_vencimento').prop('disabled', false);
    $('#tipo_solicitacao').prop('disabled', false);
    $('#solicitante').prop('disabled', true);
    $('#dep_conta_bradesco').prop('disabled', false);
    $('#nome_banco').prop('disabled', false);
    $('#agencia').prop('disabled', false);
    $('#tipo_conta').prop('disabled', false);
    $('#conta').prop('disabled', false);
    $('#digito').prop('disabled', false);
    $('#id_pagamento').prop('disabled', true);
    $('#id_pagamento').val('');
}

$(document).ready(function() {
    bloquearCampos();
});

$('#uf').change(function() {
    var uf = $('#uf').val();
    var valor = 3;

    if(uf != '') {
        $('#gcpj').focus();
    }

    if(!estados_cheque.includes(Number(uf))) {
        // bloquearCampos();
        $('#tipo_deposito').prop('disabled', false);
        $('#tipo_deposito').val('');
        $('#forma_pagamento').prop('disabled', false);
        $('#forma_pagamento').val('');
        $('#tipo_solicitacao').val('');
        $("#tipo_deposito option[value=3]").hide();
        $("#forma_pagamento option[value=3]").hide();
    }
    else {
        liberarCamposCheque();
        $("#tipo_deposito option[value=3]").show();
        $("#forma_pagamento option[value=3]").show();
    }
    // if(estados_cheque.includes(Number(uf))) {
    //     liberarCamposCheque();
    // }
    // else {
    //     bloquearCampos();
    //     $('#tipo_deposito').prop('disabled', false);
    //     $('#tipo_deposito').val('');
    //     $('#forma_pagamento').prop('disabled', false);
    //     $('#forma_pagamento').val('');
    //     $('#tipo_solicitacao').val('');
    // }
});

$('#tipo_deposito').change(function() {
    var tipo_deposito = $('#tipo_deposito').val();

    if(tipo_deposito == 3) {
        alert('Esse estado não pode ser CHEQUE');
        $('#uf').focus();
        $('#tipo_deposito').val('');
        $('#forma_pagamento').val('');
        bloquearCampos();
    }
    else if(tipo_deposito == 1) {
        $('#forma_pagamento').val(1);
        liberarCamposCredConta();
    }
    else if(tipo_deposito == 2) {
        $('#forma_pagamento').val(2);
        liberarCamposJudicial();
    }
});

$('#forma_pagamento').change(function() {
    var forma_pagamento = $('#forma_pagamento').val();

    if(forma_pagamento == 3) {
        alert('Esse estado não pode ser CHEQUE');
        $('#uf').focus();
        $('#forma_pagamento').val('');
        $('#tipo_deposito').val('');
        bloquearCampos();
    }
    else if(forma_pagamento == 1) {
        $('#tipo_deposito').val(1);
        liberarCamposCredConta();
    }
    else if(forma_pagamento == 2) {
        $('#tipo_deposito').val(2);
        liberarCamposJudicial();
    }
});

$('#dep_conta_bradesco').change(function() {
    var bradesco = $('#dep_conta_bradesco').val();

    if(bradesco == 1) {
        $('#nome_banco').val(3);
    }
    else {
        $('#nome_banco').val('');
    }
});

$('#nome_banco').change(function() {
    var banco = $('#nome_banco').val();

    if(banco == 3) {
        $('#dep_conta_bradesco').val(1);
    }
    else {
        $('#dep_conta_bradesco').val(0);
    }
});

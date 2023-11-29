// função que desabilita todos os disableds dos inputs ao salvar
$("#form").submit(function(){
    $(this).find(":input").prop("disabled", false);
});

// function regraSolicitante() {
//     if (!$('#solicitante').prop('disabled')) {
//         $('#solicitante').prop('disabled', true);
//         $('#solicitante').val('');
//     }
//     else {
//         $('#solicitante').prop('disabled', false);
//     }
// }

const estados_cheque = [14, 24, 26]; // ID's dos estados em CHEQUE

$(document).ready(function() {
    // UF
    $('#uf').change(function() {
        let uf = $('#uf').val();

        if(estados_cheque.includes(Number(uf))) {
            // seleciona a opção CHEQUE
            $('#tipo_deposito').val(3);
            $('#forma_pagamento').val(3);

            // bloqueia os campos
            $('#tipo_deposito').prop('disabled', true);
            $('#forma_pagamento').prop('disabled', true);

            // mostra a opção CHEQUE
            $("#tipo_deposito option[value=3]").show();
            $("#forma_pagamento option[value=3]").show();

            // bloqueia finalidade em ACORDOS
            $('#finalidade').prop('disabled', true);
            $('#finalidade').val(3);

            // seleciona a opção EM ENCERRAMENTOS
            $('#tipo_solicitacao').val(1);

            // regras para opção CHEQUE
            // $('#data_vencimento').prop('disabled', false);
            $('#motivo_encerramento').prop('disabled', false);
            $('#pendencia_contabil').prop('disabled', false);
            $('#dep_conta_bradesco').prop('disabled', false);
            $('#nome_banco').prop('disabled', false);
            $('#agencia').prop('disabled', false);
            $('#tipo_conta').prop('disabled', false);
            $('#conta').prop('disabled', false);
            $('#digito').prop('disabled', false);
            // $('#codigo_barras').prop('disabled', false);

            if ($('#data_vencimento').prop('disabled')) {
                $('#data_vencimento').prop('disabled', false);
            }
            if (!$('#solicitante').prop('disabled')) {
                $('#solicitante').prop('disabled', true);
                $('#solicitante').val('');
            }
            if ($('#codigo_barras').prop('disabled')) {
                $('#codigo_barras').prop('disabled', false);
            }
        }
        else {
            // limpa campos
            $('#tipo_deposito').val('');
            $('#forma_pagamento').val('');

            // habilita campos
            $('#tipo_deposito').prop('disabled', false);
            $('#forma_pagamento').prop('disabled', false);

            // esconde a opção CHEQUE
            $("#tipo_deposito option[value=3]").hide();
            $("#forma_pagamento option[value=3]").hide();

            // desbloqueia e limpa finalidade
            $('#finalidade').prop('disabled', false);
            $('#finalidade').val('');
            $('#tipo_solicitacao').val(''); // também limpa tipo solicitação
            $('#data_vencimento').val('');

            // remove as regras
            $('#data_vencimento').prop('disabled', true);
            $('#motivo_encerramento').prop('disabled', true);
            $('#pendencia_contabil').prop('disabled', true);
            $('#dep_conta_bradesco').prop('disabled', true);
            $('#nome_banco').prop('disabled', true);
            $('#agencia').prop('disabled', true);
            $('#tipo_conta').prop('disabled', true);
            $('#conta').prop('disabled', true);
            $('#digito').prop('disabled', true);
            $('#codigo_barras').prop('disabled', true);
        }
    });

    // TIPO DEPÓSITO
    $('#tipo_deposito').change(function() {
        let tipo_deposito = $('#tipo_deposito').val();

        if(tipo_deposito == 1) {
            if ($('#data_vencimento').prop('disabled')) {
                $('#data_vencimento').prop('disabled', false);
            }
            if ($('#solicitante').prop('disabled')) {
                $('#solicitante').prop('disabled', false);
            }
            if (!$('#codigo_barras').prop('disabled')) {
                $('#codigo_barras').prop('disabled', true);
            }
        }
        if(tipo_deposito == 2) {
            if (!$('#data_vencimento').prop('disabled')) {
                $('#data_vencimento').prop('disabled', true);
                $('#data_vencimento').val('');
            }
            if (!$('#solicitante').prop('disabled')) {
                $('#solicitante').prop('disabled', true);
                $('#solicitante').val('');
            }
            if (!$('#codigo_barras').prop('disabled')) {
                $('#codigo_barras').prop('disabled', true);
            }
        }
    });
});

// Função para esconder a mensagem de erro relacionada ao campo de texto
function hideMsgErrorTime() {
    // Adiciona a classe 'd-none' para esconder a mensagem de erro
    $('#error_time').addClass('d-none');
}

// Função para limpar estilos de erro nos inputs
function limparEstiloErro(elemento, classe) {
    if($(elemento).hasClass(classe)) {
        $(elemento).removeClass(classe);
    }
}

// Evento clique no campo Time
$('#time').click(function() {
    limparEstiloErro(this, 'is-invalid');
    hideMsgErrorTime();
});

// Manipulador de evento de entrada para o campo Time
$('#time').on('input', function() {
    $(this).removeClass('is-invalid');
    hideMsgErrorTime();
})

// Evento clique no campo Liga
$('#liga').click(function() {
    limparEstiloErro(this, 'border-danger');
    // Adiciona a classe 'd-none' para esconder a mensagem de erro
    $('#error_liga').addClass('d-none');
});

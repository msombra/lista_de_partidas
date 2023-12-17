// Função que exibe um confirm ao clique no botão Limpar
$('#limpar').click(function(e) {
    if (!confirm('Deseja limpar a listagem?')) {
        e.preventDefault(); // Impede o comportamento padrão do link
    }
});

$('#delete_form').submit(function(e) {
    if (!confirm('Deseja excluir partida?')) {
        e.preventDefault(); // Impede o comportamento padrão do link
    }
});

// Função que destaca partida ao clique
$('.destacar').click(function() {
    $(this).toggleClass('bg-warning');
});

// Função que exibe os botões de ações na listagem
$('#mostrar-acoes').click(function() {
    $('.acoes').toggle();
    // alterna o texto do botão Mostrar/Esconder Ações
    $(this).text(function(i, text){
        return text === "Mostrar Ações" ? "Esconder Ações" : "Mostrar Ações";
    });
})

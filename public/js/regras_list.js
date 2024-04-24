$(document).ready(function() {
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
});

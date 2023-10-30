// função para abrir a caixa de texto do time adversário
function mostrarCampoTexto() {
    let principal = document.getElementById("adversarioExistente")
    let secundario = document.getElementById("adversarioNaoExistente")

    principal.style.display = "none"
    secundario.style.display = "block"
}

// função para abrir o input select do time principal
function mostrarSelect() {
    let principal = document.getElementById("adversarioExistente")
    let secundario = document.getElementById("adversarioNaoExistente")

    principal.style.display = "block"
    secundario.style.display = "none"
}

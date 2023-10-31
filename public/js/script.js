// função para abrir a caixa de texto do time adversário
function mostrarCampoTexto() {
    let principal = document.getElementById("adversarioExistente")
    let secundario = document.getElementById("adversarioNaoExistente")

    principal.style.display = "none"
    secundario.style.display = "block"

    document.getElementById('adversario_nao_existente').required = true
    document.getElementById('adversario_existente').required = false
}

// função para abrir o input select do time principal
function mostrarSelect() {
    let principal = document.getElementById("adversarioExistente")
    let secundario = document.getElementById("adversarioNaoExistente")

    principal.style.display = "block"
    secundario.style.display = "none"

    document.getElementById('adversario_existente').required = true
    document.getElementById('adversario_nao_existente').required = false
}

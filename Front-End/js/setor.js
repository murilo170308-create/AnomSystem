function selecionarSetor(id, nome) {
    document.getElementById("Setor").value = id;
    document.getElementById("SetorNome").value = nome;

    var modal = bootstrap.Modal.getInstance(document.getElementById("modalSetor"));
    modal.hide();
}

function selecionarGrau(id, nome) {
    document.getElementById("Grau").value = id;
    document.getElementById("GrauNome").value = nome;

    var modal = bootstrap.Modal.getInstance(document.getElementById("modalGrau"));
    modal.hide();
}

function selecionarPrazo(id, nome) {
    document.getElementById("Prazo").value = id;
    document.getElementById("PrazoNome").value = nome;

    var modal = bootstrap.Modal.getInstance(document.getElementById("modalPrazo"));
    modal.hide();
}
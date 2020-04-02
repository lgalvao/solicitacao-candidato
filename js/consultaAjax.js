carregarMunicipios();

function carregarMunicipios() {
    // var selectMunicipio = document.getElementById('select-municipio');
    var selectMunicipioDestino = document.getElementById('select-municipio-destino');
    $.ajax({
        url: "/solicitacao-candidato/database/municipio.php",
        success: function(result) {
            result.forEach(mun => {
                // selectMunicipio.innerHTML += `<option value="${mun.COD_OBJETO}">${mun.NOM_LOCALIDADE}</option>`;
                selectMunicipioDestino.innerHTML += `<option value="${mun.COD_OBJETO}">${mun.NOM_LOCALIDADE}</option>`;
            });
        }
    });
}

function carregarLocalVotacao() {
    var formulario = document.getElementById('formulario');
    var selectLocalVotacao = document.getElementById('select-local-votacao');

    selectLocalVotacao.innerHTML = '<option value="" selected>Escolha...</option>';

    $.ajax({
        url: "/solicitacao-candidato/database/local_votacao.php?cod="+formulario.municipioDestino.value,
        success: function(result) {
            result.forEach(local => {
                selectLocalVotacao.innerHTML += `<option value="${local.NOM_LOCAL}">${local.NOM_LOCAL}</option>`;
            });
        }
    });
}
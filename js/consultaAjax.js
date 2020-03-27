carregarMunicipios();
carregarPartidos();

function carregarMunicipios() {
    var selectMunicipio = document.getElementById('select-municipio');
    $.ajax({
        url: "/solicitacao-candidato/database/municipio.php",
        success: function(result) {
            result.forEach(mun => {
                selectMunicipio.innerHTML += `<option value="${mun.COD_OBJETO}">${mun.NOM_LOCALIDADE}</option>`;
            });
        }
    });
}

function carregarPartidos() {
    var selectPartido = document.getElementById('select-partido');
    $.ajax({
        url: "/solicitacao-candidato/database/partido.php",
        success: function(result) {
            result.forEach(par => {
                selectPartido.innerHTML += `<option value="${par.SGL_PARTIDO}">${par.SGL_PARTIDO} - ${par.NOM_PARTIDO}</option>`;
            });
        }
    });
}

function carregarLocalVotacao() {
    var formulario = document.getElementById('formulario');
    var selectLocalVotacao = document.getElementById('select-local-votacao');

    $.ajax({
        url: "/solicitacao-candidato/database/local_votacao.php?cod="+formulario.municipio.value,
        success: function(result) {
            result.forEach(local => {
                selectLocalVotacao.innerHTML += `<option value="${local.NOM_LOCAL}">${local.NOM_LOCAL}</option>`;
            });
        }
    });
}
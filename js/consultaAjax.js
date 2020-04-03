carregarMunicipios();

function carregarMunicipios() {
    var selectMunicipioDestino = document.getElementById('select-municipio-destino');
    $.ajax({
        url: "/solicitacao-candidato/database/municipio.php",
        success: function(result) {
            result.forEach(mun => {
                selectMunicipioDestino.innerHTML += `<option value="${mun.COD_OBJETO}">${mun.NOM_LOCALIDADE}</option>`;
            });
        }
    });
}

function buscarMunicipio(cod) {
    console.log(cod);
    var selectMunicipioDestino = document.getElementById('select-municipio-destino');
    $.ajax({
        url: "/solicitacao-candidato/database/municipio.php",
        success: function(result) {
            result.forEach(mun => {
                if (cod == mun.COD_OBJETO) {
                    selectMunicipioDestino.innerHTML += `<option selected value="${mun.COD_OBJETO}">${mun.NOM_LOCALIDADE}</option>`;
                } else {
                    selectMunicipioDestino.innerHTML += `<option value="${mun.COD_OBJETO}">${mun.NOM_LOCALIDADE}</option>`;
                }
            });
        }
    });
}
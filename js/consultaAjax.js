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
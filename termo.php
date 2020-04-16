<?php
session_start();
// CONFIG METADADOS DO FORMULARIO:
$_SESSION['meta_keywords'] = "Formul�rio, Form";
$_SESSION['meta_description'] = "Formul�rio de Regulariza��o";

// CONFIG CAMINHO DO WS DO FORMULARIO:
$path_servico = "ws_formulario.php";
// CONFIG CHAVE DA ACAO DO FORMULARIO:
$chave_acao = "cadastro_regular";

?>

<!DOCTYPE html>
<html>
<head>
    <title>TRE-TO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="img/tre-to.png" width="370" height="80" class="d-inline-block align-top" alt="tre-to">
    </a>
</nav>
<h3 class="text-center mt-3">Regulariza��o Eleitoral</h3>
<div class="container mt-4">
    <form id="formulario" method="GET" action="formulario.php">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Termo de Responsabilidade</h5>
                <p>1. O teor e a integridade dos documentos digitalizados e enviados para Justi�a Eleitoral por meio do Formul�rio Eletr�nico s�o de responsabilidade do requerente, que responder� nos termos da legisla��o civil, penal e administrativa por eventuais fraudes.</p>
                <p>2. Os documentos digitalizados enviados por meio do Formul�rio Eletr�nico ter�o valor de c�pia simples.</p>
                <p>3. Ser� indeferido o protocolo de documento ileg�vel, em branco ou que impossibilite o encaminhamento da demanda internamente, bem como que contenha conte�do injurioso, amea�ador, ofensivo � moral ou contr�rio � ordem p�blica e aos interesses do Pa�s.</p>
                <p>4. Ciente que a Justi�a Eleitoral poder� solicitar complementa��o de documentos e/ou agendar o comparecimento pessoal, para o saneamento de inconsist�ncia identificada durante a an�lise preliminar do requerimento. Sendo que o n�o atendimento, no prazo estipulado, implicar� o indeferimento do Requerimento de Alistamento Eleitoral pelo Ju�zo Eleitoral competente.</p>
                <p>5. A Justi�a Eleitoral poder� exigir, a seu crit�rio, a exibi��o do documento original para o esclarecimento de d�vida sobre o seu conte�do ou verifica��o de integridade e de autenticidade, at� que decaia o seu direito de rever os atos praticados no processo.</p>
                <p>6. Falsidade Ideol�gica: <strong>Omitir, em documento p�blico ou particular, declara��o que dele devia constar, ou nele inserir ou fazer inserir declara��o falsa ou diversa da que devia ser escrita, para fins eleitorais</strong>: Pena - reclus�o at� cinco anos e pagamento de 5 a 15 dias-multa, se o documento � p�blico, e reclus�o at� tr�s anos e pagamento de 3 a 10 dias-multa, se o documento � particular (Art. 350 do C�digo Eleitoral).</p>
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="aceito" type="checkbox" id="check-aceito" onclick="aceitarTermo()" value="true">
            <label class="form-check-label" for="check-aceito">
                Aceito os termos
            </label>
        </div>
        <div class="text-right">
            <button id="button-avancar" class="btn btn-primary" disabled>Avan�ar</button>
        </div>
    </form>
</div>
</body>
<script>
    function aceitarTermo() {
    var butaoAvancar = document.getElementById('button-avancar');

    var checkAceito = document.getElementById('check-aceito');

    if (checkAceito.checked) {
        butaoAvancar.removeAttribute('disabled')
    } else {
        butaoAvancar.setAttribute('disabled', 'true')
    }
    }
</script>
</html>
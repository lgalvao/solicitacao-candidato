<?php
session_start();
// CONFIG METADADOS DO FORMULARIO:
$_SESSION['meta_keywords'] = "Formulário, Form";
$_SESSION['meta_description'] = "Formulário de Regularização";

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
<h3 class="text-center mt-3">Regularização Eleitoral</h3>
<div class="container mt-4">
    <form id="formulario" method="GET" action="formulario.php">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Termo de Responsabilidade</h5>
                <p>1. O teor e a integridade dos documentos digitalizados e enviados para Justiça Eleitoral por meio do Formulário Eletrônico são de responsabilidade do requerente, que responderá nos termos da legislação civil, penal e administrativa por eventuais fraudes.</p>
                <p>2. Os documentos digitalizados enviados por meio do Formulário Eletrônico terão valor de cópia simples.</p>
                <p>3. Será indeferido o protocolo de documento ilegível, em branco ou que impossibilite o encaminhamento da demanda internamente, bem como que contenha conteúdo injurioso, ameaçador, ofensivo à moral ou contrário à ordem pública e aos interesses do País.</p>
                <p>4. Ciente que a Justiça Eleitoral poderá solicitar complementação de documentos e/ou agendar o comparecimento pessoal, para o saneamento de inconsistência identificada durante a análise preliminar do requerimento. Sendo que o não atendimento, no prazo estipulado, implicará o indeferimento do Requerimento de Alistamento Eleitoral pelo Juízo Eleitoral competente.</p>
                <p>5. A Justiça Eleitoral poderá exigir, a seu critério, a exibição do documento original para o esclarecimento de dúvida sobre o seu conteúdo ou verificação de integridade e de autenticidade, até que decaia o seu direito de rever os atos praticados no processo.</p>
                <p>6. Falsidade Ideológica: <strong>Omitir, em documento público ou particular, declaração que dele devia constar, ou nele inserir ou fazer inserir declaração falsa ou diversa da que devia ser escrita, para fins eleitorais</strong>: Pena - reclusão até cinco anos e pagamento de 5 a 15 dias-multa, se o documento é público, e reclusão até três anos e pagamento de 3 a 10 dias-multa, se o documento é particular (Art. 350 do Código Eleitoral).</p>
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="aceito" type="checkbox" id="check-aceito" onclick="aceitarTermo()" value="true">
            <label class="form-check-label" for="check-aceito">
                Aceito os termos
            </label>
        </div>
        <div class="text-right">
            <button id="button-avancar" class="btn btn-primary" disabled>Avançar</button>
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
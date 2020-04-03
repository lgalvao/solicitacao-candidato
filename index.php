<?php
session_start();
$_SESSION['error'] = [];
$_SESSION['data'] = [];

?>
<!DOCTYPE html>
<html>
<head>
    <title>TRE-TO :: Regulariza��o</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/startbootstrap.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
</head>
<body>
<header class="container">
    <img src="img/tre-to.png">
</header>
<div class="divisor-header"></div>
<header class="sb-page-header">
    <div class="container">
        <h1>Alistamento, Transfer�ncia e Revis�o de Dados Eleitorais</h1>
        <p>Esta op��o destina-se � regulariza��o de urg�ncias do eleitor ou de pretenso candidato nas Elei��es Municipais de 2020.</p>
    </div>
</header>
<div class="row">
    <div class="col-lg-4 info-block" style="display: table;margin: 0 auto">
        <div class="vertical-center" style="height: 230px">
            <h1 style="font-size: 60px"><span class="glyphicon glyphicon-info-sign"></span></h1>
            <h1>Siga os seguintes passos:</h1>
        </div>
    </div>
    <div class="col-lg-8 description-block">
        <div class="description-item">
            <div class="row">
                <div class="col-lg-1"><h1>1</h1></div>
                <div class="col-lg-11"><div class="vertical-center">Primeiro fa�a a solicita��o no T�tulo Net, <a href="http://www.tse.jus.br/eleitor/titulo-de-eleitor/pre-atendimento-eleitoral-titulo-net/titulo-net" target="_blank">clicando aqui</a>. Aten��o: anote o n�mero do protocolo gerado.</div></div>
            </div>
        </div>
        <div class="description-item">
            <div class="row">
                <div class="col-lg-1"><h1>2</h1></div>
                <div class="col-lg-11"><div class="vertical-center">Acesse o formul�rio de Regulariza��o Eleitoral <a href="termo.php">clicando aqui</a>.</div></div>
            </div>
        </div>
        <div class="description-item">
            <div class="row">
                <div class="col-lg-1"><h1>3</h1></div>
                <div class="col-lg-11"><div class="vertical-center">Informe o protocolo gerado no T�tulo Net, al�m dos demais campos, conforme as instru��es.</div></div>
            </div>
        </div>
    </div>
</div>
<div class="footer-block text-center" style="margin-top: 40px">
    <h4>D�vidas, problemas no acesso ou pedidos de altera��o de senha, encaminhar por e-mail: <a href="mailto:cre@tre-to.jus.br">cre@tre-to.jus.br</a></h4>
</div>
<hr>
<div class="text-center">
    Tribunal Regional Eleitoral do Tocantins
</div>
</body>
</html>
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
    <title>TRE-PE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="img/tre-pe.png" width="370" height="80" class="d-inline-block align-top" alt="tre-pe">
    </a>
</nav>
<h3 class="text-center mt-3">Formul�rio de Regulariza��o</h3>
<div class="container mt-4">
    <form id="formulario" method="POST" action="ws_formulario.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dados Cadastrais</h5>
                        <div class="form-group">
                            <label class="font-weight-bold" for="input-titulo">T�tulo Eleitoral</label>
                            <input class=" form-control form-control-sm" type="text" name="titulo" id="input-titulo">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="input-titulo">Protocolo do T�tulo Net</label>
                            <input class=" form-control form-control-sm" type="text" name="titulo" id="input-titulo">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="input-nome">Nome</label>
                            <input class=" form-control form-control-sm" type="text" name="nome" id="input-nome">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="input-telefone">Telefone</label>
                            <input class=" form-control form-control-sm" type="text" name="telefone" id="input-telefone">
                            <div class="form-check">
                                <input class="form-check-input" name="whatsapp" type="checkbox" id="check-whatszapp" value="true">
                                <label class="form-check-label" for="check-whatszapp">
                                    WhatsApp
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="input-email">E-mail</label>
                            <input class=" form-control form-control-sm" type="email" name="email" id="input-email">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">C�pias</h5>
                        <div class="form-group">
                            <label class="font-weight-bold w-100" for="input-file-rg">
                                C�pia digitalizada do RG
                                <input class=" form-control form-control-sm" type="file" name="comprovanteRg" id="input-file-rg" style="height: 37px">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold w-100" for="input-file-cpf">
                                C�pia digitalizada do CPF
                                <input class=" form-control form-control-sm" type="file" name="comprovanteCpf" id="input-file-cpf" style="height: 37px">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold w-100" for="input-file-titulo">
                                C�pia digitalizada do T�tulo de Eleitor
                                <input class=" form-control form-control-sm" type="file" name="comprovanteTitulo" id="input-file-titulo" style="height: 37px">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold w-100" for="input-file-titulo">
                                C�pia digitalizada Comprovante de Endere�o
                                <input class=" form-control form-control-sm" type="file" name="comprovanteTitulo" id="input-file-titulo" style="height: 37px">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold w-100" for="input-file-selfie">

                                <div class="row">
                                    <div class="col-6">
                                        Uma foto sua (selfie)
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-info mb-1" style="padding: 1px 10px; margin-top: -10px" data-toggle="modal" data-target="#exampleFoto">?</button>
                                    </div>
                                </div>
                                <input class=" form-control form-control-sm" type="file" name="comprovanteSelfie" id="input-file-selfie" style="height: 37px">
                            </label>
                        </div>

                        <div class="modal fade" id="exampleFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-primary" role="alert">
                                            Para garantir que � voc� mesmo que est� solicitando, favor enviar
                                            uma foto do seu rosto. A foto deve conter tamb�m um documento de identifica��o
                                            com foto, conforme modelo abaixo:
                                        </div>
                                        <img src="img/selfie.jpeg" class="img-fluid" alt="selfie exemplo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-right mt-4 mb-5">
                    <button class="btn btn-primary" id="button-submit" type="submit">
                        Enviar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
<script src="js/jquey.js"></script>
<script src="js/bootstrap.js"></script>
</html>
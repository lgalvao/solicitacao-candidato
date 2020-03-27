<?php
session_start();
// CONFIG METADADOS DO FORMULARIO:
$_SESSION['meta_keywords'] = "Formulário, Form";
$_SESSION['meta_description'] = "Cadastro de usuario SIEL";

// CONFIG CAMINHO DO WS DO FORMULARIO:
$path_servico = "ws_formulario_siel.php";
// CONFIG CHAVE DA ACAO DO FORMULARIO:
$chave_acao = "cadastro_siel";

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
    <h3 class="text-center mt-3">Formulário de Regularização</h3>
    <div class="container mt-4">
        <form onsubmit="return validar()" id="formulario" method="POST" action="ws_formulario.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Dados Cadastrais</h5>
                            <div class="form-group">
                                <div class="form-check">
                                    <input onclick="aplicarRegra()" class="form-check-input" checked name="comunicacao" type="checkbox" value="true" id="check-comunicacao">
                                    <label class="form-check-label font-weight-bold" for="check-comunicacao">
                                        Comunicação de Desfiliação Partidária
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input onclick="aplicarRegra()" class="form-check-input" name="transferencia" type="checkbox" value="true" id="check-transferencia">
                                    <label class="form-check-label font-weight-bold" for="check-transferencia">
                                        Transferência de Domicilio Eleitoral
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-titulo">Título Eleitoral</label>
                                <input class=" form-control form-control-sm" type="text" name="titulo" id="input-titulo">
                                <p class="error" id="erro-titulo"></p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-nome">Nome</label>
                                <input class=" form-control form-control-sm" type="text" name="nome" id="input-nome">
                                <p class="error" id="erro-nome"></p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="select-municipio">Município de origem</label>
                                <select id="select-municipio" class=" form-control form-control-sm" name="municipio" onchange="carregarLocalVotacao()">
                                    <option value="" selected>Escolha...</option>
                                </select>
                                <p class="error" id="erro-municipio"></p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-telefone">Telefone</label>
                                <input class=" form-control form-control-sm" type="text" name="telefone" id="input-telefone">
                                <p class="error" id="erro-telefone"></p>
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
                                <p class="error" id="erro-email"></p>
                            </div>
                            <div class="form-group comunicacao">
                                <label class="font-weight-bold" for="select-partido">Partido</label>
                                <select id="select-partido" class=" form-control form-control-sm" name="partido">
                                    <option value="" selected>Escolha...</option>
                                </select>
                                <p class="error" id="erro-partido"></p>
                            </div>
                            <label class="font-weight-bold comunicacao">Comuniquei ao partido minha desfiliação?</label>
                            <div class="form-check comunicacao">
                                <input class="form-check-input" onclick="desfiliacaoRegra()" type="radio" name="desfiliacao" id="radio-desfiliacao1" value="sim" checked>
                                <label class="form-check-label" for="radio-desfiliacao1">
                                    Sim
                                </label>
                            </div>
                            <div class="form-check comunicacao">
                                <input class="form-check-input" onclick="desfiliacaoRegra()" type="radio" name="desfiliacao" id="radio-desfiliacao2" value="nao">
                                <label class="form-check-label" for="radio-desfiliacao2">
                                    Não
                                </label>
                            </div>
                            <div class="form-check comunicacao">
                                <input class="form-check-input" onclick="desfiliacaoRegra()" type="radio" name="desfiliacao" id="radio-desfiliacao3" value="nao-existe">
                                <label class="form-check-label" for="radio-desfiliacao3">
                                    Não existe diretório no município
                                </label>
                            </div>
                            <div class="form-group mt-3 transferencia">
                                <label class="font-weight-bold" for="select-local-votacao">Local de Votação</label>
                                <select id="select-local-votacao" class=" form-control form-control-sm" name="localVotacao">
                                    <option value="" selected>Escolha...</option>
                                </select>
                                <p class="error" id="erro-local-votacao"></p>
                            </div>
                            <div class="form-group transferencia">
                                <div class="form-check">
                                    <input class="form-check-input" name="necessidadeEspecial" type="checkbox" value="true" id="check-necessidade-especial">
                                    <label class="form-check-label font-weight-bold" for="check-necessidade-especial">
                                        Necessita Atendimento Especial
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Comprovantes</h5>
                            <label class="font-weight-bold" for="file-rg">Comprovante RG</label>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="button-file">Upload</button>
                                </div>
                                <input type="file" id="file-rg" class=" form-control form-control-sm" name="comprovanteRg" placeholder="" accept=".pdf,.jpg,.png">
                            </div>
                            <p class="error" id="erro-comprante-rg"></p>
                            <label class="font-weight-bold" for="file-cpf">Comprovante CPF</label>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="button-file">Upload</button>
                                </div>
                                <input type="file" id="file-cpf" class=" form-control form-control-sm" name="comprovanteCpf" placeholder="" accept=".pdf,.jpg,.png">
                            </div>
                            <p class="error" id="erro-comprante-cpf"></p>
                            <label class="font-weight-bold" for="file-titulo">Comprovante Título</label>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="button-file">Upload</button>
                                </div>
                                <input type="file" id="file-titulo" class=" form-control form-control-sm" name="comprovanteTitulo" placeholder="" accept=".pdf,.jpg,.png">
                            </div>
                            <p class="error" id="erro-comprante-titulo"></p>
                            <label class="font-weight-bold" for="file-seilfie">Comprovante Selfie</label>
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="button-file">Upload</button>
                                </div>
                                <input type="file" id="file-selfie" class=" form-control form-control-sm" name="comprovanteSelfie" placeholder="" accept=".pdf,.jpg,.png">
                            </div>
                            <p class="error" id="erro-comprante-selfie"></p>
                            <label class="font-weight-bold comunicacao desfiliacao" for="file-seilfie">Comprovante Desfiliação</label>
                            <div class="input-group input-group-sm mb-3 comunicacao desfiliacao">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="button-file">Upload</button>
                                </div>
                                <input type="file" id="file-desfiliacao" class=" form-control form-control-sm" name="comprovanteDesfiliacao" placeholder="" accept=".pdf,.jpg,.png">
                            </div>
                            <p class="error" id="erro-comprante-desfiliacao"></p>
                            <label class="font-weight-bold transferencia" for="file-seilfie">Comprovante Endereço</label>
                            <div class="input-group input-group-sm mb-3 transferencia">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" id="button-file">Upload</button>
                                </div>
                                <input type="file" id="file-endereco" class=" form-control form-control-sm" name="comprovanteEndereco" placeholder="" accept=".pdf,.jpg,.png">
                            </div>
                            <p class="error" id="erro-comprante-endereco"></p>
                            <p class="help-block">Formatos aceitos: JPG, PNG e PDF</p>
                        </div>
                    </div>
                    <div class="card mt-2 transferencia">
                        <div class="card-body">
                            <h5 class="card-title">Dados Endereço</h5>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="input-endereco">Endereço</label>
                                        <input class=" form-control form-control-sm" type="text" name="endereco" id="input-endereco">
                                        <p class="error" id="erro-endereco"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="input-numero">Número</label>
                                        <input class=" form-control form-control-sm" type="text" name="numero" id="input-numero">
                                        <p class="error" id="erro-numero"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-bairro">Bairro</label>
                                <input class=" form-control form-control-sm" type="text" name="bairro" id="input-bairro">
                                <p class="error" id="erro-bairro"></p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-cep">CEP</label>
                                <input class=" form-control form-control-sm" type="text" name="cep" id="input-cep">
                                <p class="error" id="erro-cep"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-right mt-4 mb-5">
                    <button class="btn btn-primary" id="button-submit" type="submit" onclick="loader()">
                        Enviar
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="js/jquey.js"></script>
<script src="js/regra-formulario.js"></script>
<script src="js/consultaAjax.js"></script>
</html>
<?php
session_start();
// CONFIG METADADOS DO FORMULARIO:
$_SESSION['meta_keywords'] = "Formulário, Form";
$_SESSION['meta_description'] = "Formulário de Regularização";

// CONFIG CAMINHO DO WS DO FORMULARIO:
$path_servico = "ws_formulario.php";
// CONFIG CHAVE DA ACAO DO FORMULARIO:
$chave_acao = "cadastro_regular";

if (isset($_GET['aceito']) && $_GET['aceito'] == 'true') {
    $_SESSION['error'] = [];
    $_SESSION['data'] = [];
}

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
        <a class="navbar-brand" href="index.php">
            <img src="img/tre-to.png" width="370" height="80" class="d-inline-block align-top" alt="tre-to">
        </a>
    </nav>
    <h3 class="text-center mt-3">Regularização Eleitoral</h3>
    <div class="container mt-4">
        <form onsubmit="return validar()" id="formulario" method="POST" action="ws_formulario.php" enctype="multipart/form-data">
            <div class="row">
                <?php
                if (isset($_SESSION['error']['campo'])) {
                    if ($_SESSION['error']['campo'] == 'comprovanteRg'
                        || $_SESSION['error']['campo'] == 'comprovanteCpf'
                        || $_SESSION['error']['campo'] == 'comprovanteTitulo'
                        || $_SESSION['error']['campo'] == 'comprovanteEndereco'
                        || $_SESSION['error']['campo'] == 'comprovanteSelfie') {
                    ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                Verifique se todos os Comprovantes foram anexados.
                            </div>
                        </div>
                <?php } }?>
                <div class="col-md-6">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Dados Cadastrais</h5>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-titulo-net">Protocolo Título Net</label>
                                <input class=" form-control form-control-sm" type="text" name="tituloNet" id="input-titulo-net"
                                    <?php echo isset($_SESSION['data']['tituloNet']) ? 'value="'.$_SESSION['data']['tituloNet'].'"' : ''; ?>>
                                <p class="error" id="erro-titulo-net">
                                    <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['campo'] == "tituloNet" ? "Campo obrigatório" : ""; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-titulo">Título Eleitoral</label>
                                <input class=" form-control form-control-sm" type="text" name="titulo" id="input-titulo"
                                    <?php echo isset($_SESSION['data']['titulo']) ? 'value="'.$_SESSION['data']['titulo'].'"' : ''; ?>>
                                <p class="error" id="erro-titulo">
                                    <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['campo'] == "titulo" ? "Campo obrigatório" : ""; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-nome">Nome</label>
                                <input class=" form-control form-control-sm" type="text" name="nome" id="input-nome"
                                    <?php echo isset($_SESSION['data']['nome']) ? 'value="'.$_SESSION['data']['nome'].'"' : ''; ?>>
                                <p class="error" id="erro-nome">
                                    <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['campo'] == "nome" ? "Campo obrigatório" : ""; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="select-municipio-destino">Município destino</label>
                                <select id="select-municipio-destino" class=" form-control form-control-sm" name="municipioDestino">
                                    <option value="" selected>Escolha...</option>
                                </select>
                                <p class="error" id="erro-municipio-destino">
                                    <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['municipioDestino'] == "nome" ? "Campo obrigatório" : ""; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-telefone">Telefone</label>
                                <input class=" form-control form-control-sm" type="text" name="telefone" id="input-telefone"
                                    <?php echo isset($_SESSION['data']['telefone']) ? 'value="'.$_SESSION['data']['telefone'].'"' : ''; ?>>
                                <p class="error" id="erro-telefone">
                                    <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['campo'] == "telefone" ? "Campo obrigatório" : ""; ?>
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" name="whatsapp" type="checkbox" id="check-whatszapp" value="true"
                                        <?php echo isset($_SESSION['data']['whatsapp']) && $_SESSION['data']['whatsapp'] == 'sim' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="check-whatszapp">
                                        O telefone é WhatsApp?
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-email">E-mail</label>
                                <input class=" form-control form-control-sm" type="email" name="email" id="input-email"
                                    <?php echo isset($_SESSION['data']['email']) ? 'value="'.$_SESSION['data']['email'].'"' : ''; ?>>
                                <p class="error" id="erro-email"></p>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="necessidadeEspecial" type="checkbox" value="true" id="check-necessidade-especial"
                                        <?php echo isset($_SESSION['data']['necessidadeEspecial']) && $_SESSION['data']['necessidadeEspecial'] == 'sim' ? 'checked' : ''; ?>>
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
                            <div class="form-group">
                                <label class="font-weight-bold w-100" for="file-rg">
                                    Cópia digitalizada do RG
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteRg" id="file-rg" accept=".pdf,.jpg,.png" style="height: 37px"
                                        <?php echo isset($_SESSION['data']['email']) ? 'value="'.$_SESSION['data']['compravanteRg']['tmp_name'].'"' : ''; ?>>
                                </label>
                            </div>
                            <p class="error" id="erro-comprante-rg"></p>
                            <div class="form-group">
                                <label class="font-weight-bold w-100" for="file-cpf">
                                    Cópia digitalizada do CPF
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteCpf" id="file-cpf"  accept=".pdf,.jpg,.png" style="height: 37px">
                                </label>
                            </div>
                            <p class="error" id="erro-comprante-cpf"></p>
                            <div class="form-group">
                                <label class="font-weight-bold w-100" for="file-titulo">
                                    Cópia digitalizada do Título de Eleitor
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteTitulo" id="file-titulo" style="height: 37px"  accept=".pdf,.jpg,.png">
                                </label>
                            </div>
                            <p class="error" id="erro-comprante-titulo"></p>
                            <div class="form-group">
                                <label class="font-weight-bold w-100" for="file-endereco">
                                    Cópia digitalizada Comprovante de Endereço
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteEndereco" id="file-endereco" style="height: 37px"  accept=".pdf,.jpg,.png">
                                </label>
                            </div>
                            <p class="error" id="erro-comprante-endereco"></p>
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
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteSelfie" id="input-file-selfie" style="height: 37px" placeholder="" accept=".pdf,.jpg,.png">
                                </label>
                            </div>
                            <p class="error" id="erro-comprante-selfie"></p>
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
                                                Para garantir que é você mesmo que está solicitando, favor enviar
                                                uma foto do seu rosto. A foto deve conter também um documento de identificação
                                                com foto, conforme modelo abaixo:
                                            </div>
                                            <img src="img/selfie.jpeg" class="img-fluid" alt="selfie exemplo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="help-block">Formatos aceitos: JPG, PNG e PDF</p>
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
<script src="js/bootstrap.js"></script>
<script src="js/regra-formulario.js"></script>
<script src="js/consultaAjax.js"></script>
<script>
    <?php
    if (isset($_SESSION['data']['municipioDestino'])) {
        echo 'buscarMunicipio('.$_SESSION['data']['municipioDestino'].')';
    }
    ?>

    function buscarMunicipio(cod) {
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
</script>
</html>
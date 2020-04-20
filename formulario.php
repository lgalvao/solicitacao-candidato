<?php
session_start();
// CONFIG METADADOS DO FORMULARIO:
$_SESSION['meta_keywords'] = "Formul�rio, Form";
$_SESSION['meta_description'] = "Formul�rio de Regulariza��o";

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
    <title>TRE-PE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="img/tre-pe.png" width="370" height="80" class="d-inline-block align-top" alt="tre-pe">
        </a>
    </nav>
    <h3 class="text-center mt-3">Regulariza��o Eleitoral</h3>
    <div class="container mt-4">
        <form onsubmit="return validar()" id="formulario" method="POST" action="ws_formulario.php" enctype="multipart/form-data">
            <div class="row">
                <?php
                if (isset($_SESSION['error']['campo'])) {
                    if ($_SESSION['error']['campo'] == 'comprovanteRg'
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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipoServico" id="servicoAlistamento" value="alistamento" onclick="habilitarAlistamento()" checked>
                                <label class="form-check-label" for="servicoAlistamento">
                                    Alistamento
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipoServico" id="servicoTransferencia" value="transferencia" onclick="habilitarAlistamento()">
                                <label class="form-check-label" for="servicoTransferencia">
                                    Transfer�ncia
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipoServico" id="servicoRevisao" value="revisao" onclick="habilitarAlistamento()">
                                <label class="form-check-label" for="servicoRevisao">
                                    Revis�o / Restabelecimento de T�tulo Cancelado
                                </label>
                            </div>
                            <br/>
                            <div class="form-group" id="divTituloNet">
                                <label class="font-weight-bold" for="input-titulo-net">Protocolo do T�tulo Net <span style="color: red;">*</span></label>
                                <input class=" form-control form-control-sm" type="text" name="tituloNet" id="input-titulo-net"
                                    <?php echo isset($_SESSION['data']['tituloNet']) ? 'value="'.$_SESSION['data']['tituloNet'].'"' : ''; ?>>
                                <p class="error" id="erro-titulo-net">
                                    <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['campo'] == "tituloNet" ? "Campo obrigat�rio" : ""; ?>
                                </p>
                            </div>
                            <div class="form-group" id="divTituloEleitoral" style="display: none;">
                                <label class="font-weight-bold" for="input-titulo">T�tulo Eleitoral <span style="color: red;">*</span></label>
                                <input class=" form-control form-control-sm" type="text" name="titulo" id="input-titulo"
                                    <?php echo isset($_SESSION['data']['titulo']) ? 'value="'.$_SESSION['data']['titulo'].'"' : ''; ?>>
                                <p class="error" id="erro-titulo">
                                    <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['campo'] == "titulo" ? "Campo obrigat�rio" : ""; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-nome">Nome <span style="color: red;">*</span></label>
                                <input class=" form-control form-control-sm" type="text" name="nome" id="input-nome"
                                    <?php echo isset($_SESSION['data']['nome']) ? 'value="'.$_SESSION['data']['nome'].'"' : ''; ?>>
                                <p class="error" id="erro-nome">
                                    <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['campo'] == "nome" ? "Campo obrigat�rio" : ""; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="select-municipio-destino">Munic�pio de destino <span style="color: red;">*</span></label>
                                <select id="select-municipio-destino" class=" form-control form-control-sm" name="municipioDestino">
                                    <option value="" selected>Escolha...</option>
                                    <option value="227">ABREU E LIMA</option>
                                    <option value="173">AFOGADOS DA INGAZEIRA</option>
                                    <option value="215">AFR�NIO</option>
                                    <option value="194">AGRESTINA</option>
                                    <option value="145">�GUA PRETA</option>
                                    <option value="171">�GUAS BELAS</option>
                                    <option value="228">ALAGOINHA</option>
                                    <option value="233">ALIAN�A</option>
                                    <option value="155">ALTINHO</option>
                                    <option value="138">AMARAJI</option>
                                    <option value="224">ANGELIM</option>
                                    <option value="193">ARA�OIABA</option>
                                    <option value="192">ARARIPINA</option>
                                    <option value="164">ARCOVERDE</option>
                                    <option value="146">BARRA DE GUABIRABA</option>
                                    <option value="149">BARREIROS</option>
                                    <option value="150">BEL�M DE MARIA</option>
                                    <option value="180">BEL�M DO S�O FRANCISCO</option>
                                    <option value="152">BELO JARDIM</option>
                                    <option value="216">BET�NIA</option>
                                    <option value="142">BEZERROS</option>
                                    <option value="187">BODOC�</option>
                                    <option value="168">BOM CONSELHO</option>
                                    <option value="140">BOM JARDIM</option>
                                    <option value="146">BONITO</option>
                                    <option value="200">BREJ�O</option>
                                    <option value="207">BREJINHO</option>
                                    <option value="161">BREJO DA MADRE DE DEUS</option>
                                    <option value="130">BUENOS AIRES</option>
                                    <option value="167">BU�QUE</option>
                                    <option value="110000917">CABO DE SANTO AGOSTINHO</option>
                                    <option value="184">CABROB�</option>
                                    <option value="151">CACHOEIRINHA</option>
                                    <option value="238">CAET�S</option>
                                    <option value="202">CAL�ADO</option>
                                    <option value="216">CALUMBI</option>
                                    <option value="110000918">CAMARAGIBE</option>
                                    <option value="240">CAMOCIM DE S�O F�LIX</option>
                                    <option value="134">CAMUTANGA</option>
                                    <option value="224">CANHOTINHO</option>
                                    <option value="238">CAPOEIRAS</option>
                                    <option value="206">CARNA�BA</option>
                                    <option value="176">CARNAUBEIRA DA PENHA</option>
                                    <option value="127">CARPINA</option>
                                    <option value="443">CARUARU</option>
                                    <option value="141">CASINHAS</option>
                                    <option value="150">CATENDE</option>
                                    <option value="183">CEDRO</option>
                                    <option value="128">CH� DE ALEGRIA</option>
                                    <option value="138">CH� GRANDE</option>
                                    <option value="233">CONDADO</option>
                                    <option value="166">CORRENTES</option>
                                    <option value="135">CORT�S</option>
                                    <option value="199">CUMARU</option>
                                    <option value="194">CUPIRA</option>
                                    <option value="172">CUST�DIA</option>
                                    <option value="215">DORMENTES</option>
                                    <option value="126">ESCADA</option>
                                    <option value="186">EXU</option>
                                    <option value="243">FEIRA NOVA</option>
                                    <option value="310">FERNANDO DE NORONHA</option>
                                    <option value="134">FERREIROS</option>
                                    <option value="174">FLORES</option>
                                    <option value="179">FLORESTA</option>
                                    <option value="153">FREI MIGUELINHO</option>
                                    <option value="135">GAMELEIRA</option>
                                    <option value="444">GARANHUNS</option>
                                    <option value="128">GL�RIA DO GOIT�</option>
                                    <option value="132">GOIANA</option>
                                    <option value="187">GRANITO</option>
                                    <option value="137">GRAVAT�</option>
                                    <option value="244">IATI</option>
                                    <option value="236">IBIMIRIM</option>
                                    <option value="155">IBIRAJUBA</option>
                                    <option value="193">IGARASSU</option>
                                    <option value="173">IGUARACY</option>
                                    <option value="239">ILHA DE ITAMARAC�</option>
                                    <option value="170">INAJ�</option>
                                    <option value="157">INGAZEIRA</option>
                                    <option value="123">IPOJUCA</option>
                                    <option value="241">IPUBI</option>
                                    <option value="180">ITACURUBA</option>
                                    <option value="251">ITA�BA</option>
                                    <option value="134">ITAMB�</option>
                                    <option value="207">ITAPETIM</option>
                                    <option value="239">ITAPISSUMA</option>
                                    <option value="233">ITAQUITINGA</option>
                                    <option value="376">JABOAT�O DOS GUARARAPES</option>
                                    <option value="150">JAQUEIRA</option>
                                    <option value="161">JATA�BA</option>
                                    <option value="197">JATOB�</option>
                                    <option value="196">JO�O ALFREDO</option>
                                    <option value="145">JOAQUIM NABUCO</option>
                                    <option value="200">JUCATI</option>
                                    <option value="200">JUPI</option>
                                    <option value="202">JUREMA</option>
                                    <option value="243">LAGOA DE ITAENGA</option>
                                    <option value="127">LAGOA DO CARRO</option>
                                    <option value="166">LAGOA DO OURO</option>
                                    <option value="194">LAGOA DOS GATOS</option>
                                    <option value="245">LAGOA GRANDE</option>
                                    <option value="202">LAJEDO</option>
                                    <option value="131">LIMOEIRO</option>
                                    <option value="198">MACAPARANA</option>
                                    <option value="196">MACHADOS</option>
                                    <option value="170">MANARI</option>
                                    <option value="150">MARAIAL</option>
                                    <option value="176">MIRANDIBA</option>
                                    <option value="186">MOREIL�NDIA</option>
                                    <option value="121">MORENO</option>
                                    <option value="130">NAZAR� DA MATA</option>
                                    <option value="377">OLINDA</option>
                                    <option value="140">OROB�</option>
                                    <option value="184">OROC�</option>
                                    <option value="190">OURICURI</option>
                                    <option value="144">PALMARES</option>
                                    <option value="166">PALMEIRINA</option>
                                    <option value="154">PANELAS</option>
                                    <option value="200">PARANATAMA</option>
                                    <option value="185">PARNAMIRIM</option>
                                    <option value="199">PASSIRA</option>
                                    <option value="124">PAUDALHO</option>
                                    <option value="482">PAULISTA</option>
                                    <option value="165">PEDRA</option>
                                    <option value="162">PESQUEIRA</option>
                                    <option value="177">PETROL�NDIA</option>
                                    <option value="445">PETROLINA</option>
                                    <option value="162">PO��O</option>
                                    <option value="210">POMBOS</option>
                                    <option value="138">PRIMAVERA</option>
                                    <option value="154">QUIPAP�</option>
                                    <option value="206">QUIXABA</option>
                                    <option value="310">RECIFE</option>
                                    <option value="443">RIACHO DAS ALMAS</option>
                                    <option value="135">RIBEIR�O</option>
                                    <option value="133">RIO FORMOSO</option>
                                    <option value="240">SAIR�</option>
                                    <option value="196">SALGADINHO</option>
                                    <option value="182">SALGUEIRO</option>
                                    <option value="244">SALO�</option>
                                    <option value="152">SANHAR�</option>
                                    <option value="190">SANTA CRUZ</option>
                                    <option value="178">SANTA CRUZ DA BAIXA VERDE</option>
                                    <option value="217">SANTA CRUZ DO CAPIBARIBE</option>
                                    <option value="190">SANTA FILOMENA</option>
                                    <option value="188">SANTA MARIA DA BOA VISTA</option>
                                    <option value="153">SANTA MARIA DO CAMBUC�</option>
                                    <option value="207">SANTA TEREZINHA</option>
                                    <option value="154">S�O BENEDITO DO SUL</option>
                                    <option value="159">S�O BENTO DO UNA</option>
                                    <option value="151">S�O CAITANO</option>
                                    <option value="224">S�O JO�O</option>
                                    <option value="240">S�O JOAQUIM DO MONTE</option>
                                    <option value="149">S�O JOS� DA COROA GRANDE</option>
                                    <option value="181">S�O JOS� DO BELMONTE</option>
                                    <option value="175">S�O JOS� DO EGITO</option>
                                    <option value="120">S�O LOUREN�O DA MATA</option>
                                    <option value="198">S�O VICENTE F�RRER</option>
                                    <option value="178">SERRA TALHADA</option>
                                    <option value="183">SERRITA</option>
                                    <option value="169">SERT�NIA</option>
                                    <option value="133">SIRINHA�M</option>
                                    <option value="206">SOLID�O</option>
                                    <option value="141">SURUBIM</option>
                                    <option value="157">TABIRA</option>
                                    <option value="151">TACAIMB�</option>
                                    <option value="197">TACARATU</option>
                                    <option value="133">TAMANDAR�</option>
                                    <option value="158">TAQUARITINGA DO NORTE</option>
                                    <option value="168">TEREZINHA</option>
                                    <option value="185">TERRA NOVA</option>
                                    <option value="143">TIMBA�BA</option>
                                    <option value="220">TORITAMA</option>
                                    <option value="130">TRACUNHA�M</option>
                                    <option value="241">TRINDADE</option>
                                    <option value="174">TRIUNFO</option>
                                    <option value="251">TUPANATINGA</option>
                                    <option value="175">TUPARETAMA</option>
                                    <option value="228">VENTUROSA</option>
                                    <option value="182">VERDEJANTE</option>
                                    <option value="141">VERTENTE DO L�RIO</option>
                                    <option value="153">VERTENTES</option>
                                    <option value="198">VIC�NCIA</option>
                                    <option value="110000916">VIT�RIA DE SANTO ANT�O</option>
                                    <option value="145">XEX�U</option>
                                </select>
                                <p class="error" id="erro-municipio-destino">
                                    <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['campo'] == "municipioDestino" ? "Campo obrigat�rio" : ""; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-telefone">Telefone <span style="color: red;">*</span></label>
                                <input class=" form-control form-control-sm" type="text" name="telefone" id="input-telefone"
                                    <?php echo isset($_SESSION['data']['telefone']) ? 'value="'.$_SESSION['data']['telefone'].'"' : ''; ?>>
                                <p class="error" id="erro-telefone">
                                    <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['campo'] == "telefone" ? "Campo obrigat�rio" : ""; ?>
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" name="whatsapp" type="checkbox" id="check-whatszapp" value="true"
                                        <?php echo isset($_SESSION['data']['whatsapp']) && $_SESSION['data']['whatsapp'] == 'sim' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="check-whatszapp">
                                        O telefone � WhatsApp?
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-email">E-mail <span style="color: red;">*</span></label>
                                <input class=" form-control form-control-sm" type="email" name="email" id="input-email"
                                    <?php echo isset($_SESSION['data']['email']) ? 'value="'.$_SESSION['data']['email'].'"' : ''; ?>>
                                <p class="error" id="erro-email"></p>
                            </div>
                            <div class="form-group" id="divNecessidade">
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
                                    C�pia digitalizada do RG <span style="color: red;">*</span>
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteRg" id="file-rg" accept=".pdf,.jpg,.png" style="height: 37px"
                                        <?php echo isset($_SESSION['data']['email']) ? 'value="'.$_SESSION['data']['compravanteRg']['tmp_name'].'' : ''; ?>>
                                </label>
                            </div>
                            <p class="error" id="erro-comprante-rg"></p>
                            <div class="form-group">
                                <label class="font-weight-bold w-100" for="file-cpf">
                                    C�pia digitalizada do CPF
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteCpf" id="file-cpf"  accept=".pdf,.jpg,.png" style="height: 37px">
                                </label>
                            </div>
                            <div class="form-group" id="divComprovanteTitulo" style="display: none;">
                                <label class="font-weight-bold w-100" for="file-titulo">
                                    C�pia digitalizada do T�tulo de Eleitor <span style="color: red;">*</span>
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteTitulo" id="file-titulo" style="height: 37px"  accept=".pdf,.jpg,.png">
                                </label>
                            </div>
                            <p class="error" id="erro-comprante-titulo"></p>
                            <div class="form-group">
                                <label class="font-weight-bold w-100" for="file-endereco">
                                    C�pia digitalizada Comprovante de Endere�o <span style="color: red;">*</span>
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteEndereco" id="file-endereco" style="height: 37px"  accept=".pdf,.jpg,.png">
                                </label>
                            </div>
                            <p class="error" id="erro-comprante-endereco"></p>
                            <div class="form-group" id="divAlistamento">
                                <label class="font-weight-bold w-100" for="input-file-alistamento">
                                    C�pia digitalizada do Alistamento Militar
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteAlistamento" id="input-file-alistamento" style="height: 37px" placeholder="" accept=".pdf,.jpg,.png">
                                </label>
                            </div>
                            <p class="error" id="erro-comprante-alistamento"></p>
                            <div class="form-group">
                                <label class="font-weight-bold w-100" for="input-file-selfie">

                                    <div class="row">
                                        <div class="col-6">
                                        Foto do rosto ao lado de um documento de identifica��o com foto. <span style="color: red;">*</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="button" class="btn btn-info mb-1" style="padding: 1px 10px; margin-top: -10px" data-toggle="modal" data-target="#exampleFoto">?</button>
                                        </div>
                                    </div>
                                    <input class=" form-control form-control-sm" type="file" name="comprovanteSelfie" id="input-file-selfie" style="height: 37px" placeholder="" accept=".pdf,.jpg,.png" data-toggle="modal" data-target="#exampleFoto">
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
                                            <img src="img/selfie.jpeg" class="img-fluid" alt="selfie exemplo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="help-block">Formatos aceitos: JPG, PNG e PDF</p>
                            <div class="form-group">
                                <label class="font-weight-bold" for="input-justificativa">Justificativa do atendimento <span style="color: red;">*</span></label>
                                <textarea class="form-control" name="justificativa" id="input-justificativa" rows="4" maxlength="1500"><?php echo isset($_SESSION['data']['justificativa']) ? $_SESSION['data']['justificativa'] : ''; ?></textarea>
                            </div>
                            <p class="error" id="erro-justificativa">
                                <?php echo isset($_SESSION['error']['campo']) && $_SESSION['error']['campo'] == "justificativa" ? "Campo obrigat�rio" : ""; ?>
                            </p>
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
<script>
    <?php
   /* if (isset($_SESSION['data']['municipioDestino'])) {
        echo 'buscarMunicipio('.$_SESSION['data']['municipioDestino'].')';
    }*/
    ?>

    function buscarMunicipio(cod) {
     /*   var selectMunicipioDestino = document.getElementById('select-municipio-destino');
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
    }*/
</script>
</html>

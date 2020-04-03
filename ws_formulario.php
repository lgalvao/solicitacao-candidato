<?php
session_start();
    $acao = 'cadastro_regular';
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $tituloNet = isset($_POST['tituloNet']) ? $_POST['tituloNet'] : '';
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $municipioDestino = isset($_POST['municipioDestino']) ? $_POST['municipioDestino'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $whatsapp = isset($_POST['whatsapp']) ? 'sim' : 'não';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $necessidadeEspecial = isset($_POST['necessidadeEspecial']) ? 'sim' : 'não';
    $comprovanteRg = isset($_FILES['comprovanteRg']) ? $_FILES['comprovanteRg'] : '';
    $comprovanteCpf = isset($_FILES['comprovanteCpf']) ? $_FILES['comprovanteCpf'] : '';
    $comprovanteTitulo = isset($_FILES['comprovanteTitulo']) ? $_FILES['comprovanteTitulo'] : '';
    $comprovanteEndereco = isset($_FILES['comprovanteEndereco']) ? $_FILES['comprovanteEndereco'] : '';
    $comprovanteSelfie = isset($_FILES['comprovanteSelfie']) ? $_FILES['comprovanteSelfie'] : '';

    $data = [
        'titulo' => $titulo,
        'tituloNet' => $tituloNet,
        'nome' => $nome,
        'municipioDestino' => $municipioDestino,
        'telefone' => $telefone,
        'whatsapp' => $whatsapp,
        'email' => $email,
        'necessidadeEspecial' => $necessidadeEspecial,
        'compravanteRg' => $comprovanteRg,
        'compravanteCpf' => $comprovanteCpf,
        'comprovanteTitulo' => $comprovanteTitulo,
        'comprovanteEndereco' => $comprovanteEndereco,
        'comprovanteSelfie' => $comprovanteSelfie,
    ];

    if ($titulo === '') {
        $erro = 'Preencha o campo Título';
        header("Location:formulario.php?data=".$data."&erro=".$erro);
    }

    if ($tituloNet === '') {
        $erro = 'Preencha o campo Título Net';
        header("Location:formulario.php?data=".$data."&erro=".$erro);
    }

    if ($nome === '') {
        $erro = 'Preencha o campo Nome';
        header("Location:formulario.php?data=".$data."&erro=".$erro);
    }

    if ($municipioDestino === '') {
        $erro = 'Escolha um Município de destino';
        header("Location:formulario.php?data=".$data."&erro=".$erro);
    }
    if ($telefone === '') {
        $erro = 'Preencha o campo Telefone';
        header("Location:formulario.php?data=".$data."&erro=".$erro);
    }
    if ($comprovanteRg === '') {
        $erro = 'Preencha o campo Comprovante de Rg';
        header("Location:formulario.php?data=".$data."&erro=".$erro);
    }
    if ($comprovanteCpf === '') {
        $erro = 'Preencha o campo Comprovante de CPF';
        header("Location:formulario.php?data=".$data."&erro=".$erro);
    }
    if ($comprovanteTitulo === '') {
        $erro = 'Preencha o campo Comprovante de Título';
        header("Location:formulario.php?data=".$data."&erro=".$erro);
    }

    if ($comprovanteEndereco === '') {
        $erro = 'Preencha o campo Comprovante de Endereço';
        header("Location:formulario.php?data=".$data."&erro=".$erro);
    }
    if ($comprovanteSelfie === '') {
        $erro = 'Preencha o campo Comprovante de Selfie';
        header("Location:formulario.php?data=".$data."&erro=".$erro);
    }

    function getAmbiente(){
        $municipioDestino = isset($_POST['municipioDestino']) ? $_POST['municipioDestino'] : '';
        require_once "database/oracle.php";

        $con = DBOracle::Conecta('ADM');
        $sql = "SELECT * from ADMCADTO.MUNICIPIO_ZONA MZ
        INNER JOIN ADMCADTO.ZONA Z
            ON Z.COD_OBJETO = MZ.COD_ZONA
        WHERE COD_MUNICIPIO = ".$municipioDestino;
        $stmt = OCIParse($con, $sql);
        $numeroZona = array();

        if(oci_execute($stmt)) {
            oci_fetch_all($stmt, $numeroZona, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
        }

        $con = DBOracle::Conecta('ADM');
        $sql = "SELECT ID_UNIDADE, DESCRICAO from UNIDADE WHERE SIGLA LIKE concat(".$numeroZona[0]['NUM_ZONA'].",'%') ORDER BY SIGLA ASC";
        $stmt = OCIParse($con, $sql);
        $idIunidade = array();

        if(oci_execute($stmt)) {
            oci_fetch_all($stmt, $idIunidade, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
        }

        $con = DBOracle::Conecta('ADM');
        $sql = "SELECT * from ADMCADTO.MUNICIPIO WHERE COD_OBJETO = '".$municipioDestino."'";
        $stmt = OCIParse($con, $sql);
        $descricaoMunicipio = array();

        if(oci_execute($stmt)) {
            oci_fetch_all($stmt, $descricaoMunicipio, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
        }

        $numIdUnidade = $idIunidade[0]['ID_UNIDADE'];

        if ($_SERVER['SERVER_NAME'] == 'sei-des1.tre-to.jus.br') {
            return array(
                "idTipoProcedimento"=>100000899,
                "idSerie"=>50189,
                "idSerie2"=>293,
                "idSerie3"=>295,
                "numIdUnidade"=>$numIdUnidade,
                "zonaDescricao"=>mb_convert_encoding($descricaoMunicipio[0]['NOM_LOCALIDADE'], 'ISO-8859-1', 'UTF-8'),
                "strWSDL"=>"https://sei-des1.tre-to.jus.br/sei/controlador_ws.php?servico=sei"
            );
        }

        if ($_SERVER['SERVER_NAME'] == 'sei-hom.tre-to.jus.br') {
            return array(
                "idTipoProcedimento"=>100000749,
                "idSerie"=>50108,
                "idSerie2"=>293,
                "idSerie3"=>295,
                "numIdUnidade"=>$numIdUnidade,
                "zonaDescricao"=>mb_convert_encoding($descricaoMunicipio[0]['NOM_LOCALIDADE'], 'ISO-8859-1', 'UTF-8'),
                "strWSDL"=>"https://sei-hom.tre-to.jus.br/sei/controlador_ws.php?servico=sei"
            );
        }

        if ($_SERVER['SERVER_NAME'] == 'sei.tre-to.jus.br') {
            return array(
                "idTipoProcedimento"=>100000749,
                "idSerie"=>50105,
                "idSerie2"=>293,
                "idSerie3"=>295,
                "numIdUnidade"=>$numIdUnidade,
                "zonaDescricao"=>mb_convert_encoding($descricaoMunicipio[0]['NOM_LOCALIDADE'], 'ISO-8859-1', 'UTF-8'),
                "strWSDL"=>"https://sei.tre-to.jus.br/sei/controlador_ws.php?servico=sei"
            );
        }
    }

    //-- Config do WS para este formulrio (ALTERAR)
    $SEISistema = 'Regular';
    $SEIForm = 'formRegularizacaoExterno';
    $IdTipoProcedimento = getAmbiente()["idTipoProcedimento"];

    $IdSerie =  getAmbiente()["idSerie"];
    $IdSerie2 =  getAmbiente()["idSerie2"];
    $IdSerie3 =  getAmbiente()["idSerie3"];
    $Descricao = 'Formulrio de Regularizao.';

    $numIdUnidade =  getAmbiente()["numIdUnidade"];
    $UnidadesEnvio = array();

    date_default_timezone_set("Brazil/East"); //Definindo timezone padro

    if($comprovanteRg['name'] !== '') {
        $ext = '.'.strtolower(pathinfo($comprovanteRg['name'], PATHINFO_EXTENSION)); //Pegando extenso do arquivo
        $comprovante_rg_name = "comprovate_rg".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretrio para uploads

        move_uploaded_file($comprovanteRg['tmp_name'], $dir.$comprovante_rg_name); //Fazer upload do arquivo
    }

    if($comprovanteCpf['name'] !== '') {
        $ext = '.'.strtolower(pathinfo($comprovanteCpf['name'], PATHINFO_EXTENSION)); //Pegando extenso do arquivo
        $comprovante_cpf_name = "comprovate_cpf".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretrio para uploads

        move_uploaded_file($comprovanteCpf['tmp_name'], $dir.$comprovante_cpf_name); //Fazer upload do arquivo
    }

    if($comprovanteTitulo['name'] !== '') {
        $ext = '.'.strtolower(pathinfo($comprovanteTitulo['name'], PATHINFO_EXTENSION)); //Pegando extenso do arquivo
        $comprovante_titulo_name = "comprovate_titulo".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretrio para uploads

        move_uploaded_file($comprovanteTitulo['tmp_name'], $dir.$comprovante_titulo_name); //Fazer upload do arquivo
    }

    if($comprovanteSelfie['name'] !== '') {
        $ext = '.'.strtolower(pathinfo($comprovanteSelfie['name'], PATHINFO_EXTENSION)); //Pegando extenso do arquivo
        $comprovante_selfie_name = "comprovate_selfie".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretrio para uploads

        move_uploaded_file($comprovanteSelfie['tmp_name'], $dir.$comprovante_selfie_name); //Fazer upload do arquivo
    }

    if($comprovanteEndereco['name'] !== '') {
        $ext = '.'.strtolower(pathinfo($comprovanteEndereco['name'], PATHINFO_EXTENSION)); //Pegando extenso do arquivo
        $comprovante_endereco_name = "comprovate_endereco".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretrio para uploads

        move_uploaded_file($comprovanteEndereco['tmp_name'], $dir.$comprovante_endereco_name); //Fazer upload do arquivo
    }

    if ($acao=='cadastro_regular') {// chave da acao
        include_once("ws_geraSEI.inc.php");
    } else {
        throw new InfraException("Erro gerando {$_SESSION['meta_description']}");
    }
?>
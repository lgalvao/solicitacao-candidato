<?php
session_start();
    $acao = 'cadastro_siel';
    $comunicacao = isset($_POST['comunicacao']) ? true : false;
    $transferencia = isset($_POST['transferencia']) ? true : false;
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $municipio = isset($_POST['municipio']) ? $_POST['municipio'] : '';
    $whatsapp = isset($_POST['whatsapp']) ? 'sim' : 'nгo';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $partido = isset($_POST['partido']) ? $_POST['partido'] : '';
    $desfiliacao = isset($_POST['desfiliacao']) ? $_POST['desfiliacao'] : '';
    $localVotacao = isset($_POST['localVotacao']) ? $_POST['localVotacao'] : '';
    $necessidadeEspecial = isset($_POST['necessidadeEspecial']) ? 'sim' : 'nгo';
    $comprovanteRg = isset($_FILES['comprovanteRg']) ? $_FILES['comprovanteRg'] : '';
    $comprovanteCpf = isset($_FILES['comprovanteCpf']) ? $_FILES['comprovanteCpf'] : '';
    $comprovanteTitulo = isset($_FILES['comprovanteTitulo']) ? $_FILES['comprovanteTitulo'] : '';
    $comprovanteSelfie = isset($_FILES['comprovanteSelfie']) ? $_FILES['comprovanteSelfie'] : '';
    $comprovanteDesfiliacao = isset($_FILES['comprovanteDesfiliacao']) ? $_FILES['comprovanteDesfiliacao'] : '';
    $comprovanteEndereco = isset($_FILES['comprovanteEndereco']) ? $_FILES['comprovanteEndereco'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
    $cep = isset($_POST['cep']) ? $_POST['cep'] : '';

    function getAmbiente(){
        return array("idTipoProcedimento"=>100000899,"idSerie"=>50188,"idSerie2"=>50189,"idSerie3"=>290,"numIdUnidade"=>226,"strWSDL"=>"https://sei-des1.tre-to.jus.br/sei/controlador_ws.php?servico=sei");
    }

    //-- Config do WS para este formulбrio (ALTERAR)
    $SEISistema = 'SIEL';
    $SEIForm = 'FormCadastroUsuarioSiel';
    $IdTipoProcedimento = getAmbiente()["idTipoProcedimento"];

    $IdSerie =  getAmbiente()["idSerie"];
    $IdSerie2 =  getAmbiente()["idSerie2"];
    $IdSerie3 =  getAmbiente()["idSerie3"];
    $Descricao = 'Formulбrio de Solicitaзгo de cadastro no sistema SIEL.';

    $numIdUnidade =  getAmbiente()["numIdUnidade"];
    $UnidadesEnvio = array();

    date_default_timezone_set("Brazil/East"); //Definindo timezone padrгo

    if($comprovanteRg) {
        $ext = '.'.strtolower(pathinfo($comprovanteRg['name'], PATHINFO_EXTENSION)); //Pegando extensгo do arquivo
        $comprovante_rg_name = "comprovate_rg".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretуrio para uploads

        move_uploaded_file($comprovanteRg['tmp_name'], $dir.$comprovante_rg_name); //Fazer upload do arquivo
    }

    if($comprovanteCpf) {
        $ext = '.'.strtolower(pathinfo($comprovanteCpf['name'], PATHINFO_EXTENSION)); //Pegando extensгo do arquivo
        $comprovante_cpf_name = "comprovate_cpf".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretуrio para uploads

        move_uploaded_file($comprovanteCpf['tmp_name'], $dir.$comprovante_cpf_name); //Fazer upload do arquivo
    }

    if($comprovanteTitulo) {
        $ext = '.'.strtolower(pathinfo($comprovanteTitulo['name'], PATHINFO_EXTENSION)); //Pegando extensгo do arquivo
        $comprovante_titulo_name = "comprovate_titulo".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretуrio para uploads

        move_uploaded_file($comprovanteTitulo['tmp_name'], $dir.$comprovante_titulo_name); //Fazer upload do arquivo
    }

    if($comprovanteSelfie) {
        $ext = '.'.strtolower(pathinfo($comprovanteSelfie['name'], PATHINFO_EXTENSION)); //Pegando extensгo do arquivo
        $comprovante_selfie_name = "comprovate_selfie".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretуrio para uploads

        move_uploaded_file($comprovanteSelfie['tmp_name'], $dir.$comprovante_selfie_name); //Fazer upload do arquivo
    }

    if($comprovanteDesfiliacao) {
        $ext = '.'.strtolower(pathinfo($comprovanteDesfiliacao['name'], PATHINFO_EXTENSION)); //Pegando extensгo do arquivo
        $comprovante_desfiliacao_name = "comprovate_desfiliacao".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretуrio para uploads

        move_uploaded_file($comprovanteDesfiliacao['tmp_name'], $dir.$comprovante_desfiliacao_name); //Fazer upload do arquivo
    }

    if($comprovanteEndereco) {
        $ext = '.'.strtolower(pathinfo($comprovanteEndereco['name'], PATHINFO_EXTENSION)); //Pegando extensгo do arquivo
        $comprovante_endereco_name = "comprovate_endereco".date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
        $dir = 'uploads/'; //Diretуrio para uploads

        move_uploaded_file($comprovanteEndereco['tmp_name'], $dir.$comprovante_endereco_name); //Fazer upload do arquivo
    }

    if ($acao=='cadastro_siel') {// chave da acao
        include_once("ws_geraSEI.inc.php");
    } else {
        throw new InfraException("Erro gerando {$_SESSION['meta_description']}");
    }
?>
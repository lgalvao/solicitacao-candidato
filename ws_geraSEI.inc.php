<?php
require_once('documento.php');

$strWSDL = getAmbiente()["strWSDL"];

if(!@file_get_contents($strWSDL)) {
	throw new InfraException('Arquivo WSDL '.$strWSDL.' não encontrado.');
}
try{
	$objWS = new SoapClient($strWSDL, array('encoding'=>'WINDOWS-1252'));
}catch(Exception $e){
	throw new InfraException('Erro acessando serviço.',$e);
}

//Procedimento (Processo)
$Procedimento = array();
$Procedimento['IdTipoProcedimento'] = $IdTipoProcedimento;

// Espeificação do procedimento
$Procedimento['Especificacao'] = $_SESSION['meta_description'];

$arrAssuntos = array();
$arrAssuntos[] = array('CodigoEstruturado'=>'500-2.02');
$Procedimento['Assuntos'] = $arrAssuntos;

//array da autoridade
$autoridade = array('Sigla' => $email, 'Nome' => $nome);

$arrInteressados = array();
$arrInteressados[] = array('Sigla' => '', 'Nome' => $municipio);
$arrInteressados[] = $autoridade;

$Procedimento['Interessados'] = $arrInteressados;

//Observaçoes para o Procedimento
$Procedimento['Observacao'] = null;
$Procedimento['NivelAcesso'] = null;

$documentos = [];
$documentosTransferecia = [];

//Documento interno Comunicacao
if ($conteudoComunicacao !== '') {
	$DocumentoGerado = array();
	$DocumentoGerado['Tipo'] = 'G';
	$DocumentoGerado['IdProcedimento'] = null;
	$DocumentoGerado['IdSerie'] = $IdSerie;

	$DocumentoGerado['Numero'] = null;
	$DocumentoGerado['Data'] = null;
	$DocumentoGerado['Descricao'] = $Descricao;
	$DocumentoGerado['Remetente'] = null;

	//Mantem o array Interessados ja criado acima

	$arrInteressados = array();
	$DocumentoGerado['Interessados'] = $arrInteressados;

	//Usado somente em alguns tipos, mas necessário para o webservice
	$arrDestinatarios = array();
	$DocumentoGerado['Destinatarios'] = $arrDestinatarios;

	//Observaçoes para o Documento gerado
	$DocumentoGerado['Observacao'] = 'observação teste';

	$DocumentoGerado['NomeArquivo'] = null;
	$DocumentoGerado['Conteudo'] = base64_encode(utf8_encode ($conteudoComunicacao));
	$DocumentoGerado['NivelAcesso'] = null;

	array_push($documentos, $DocumentoGerado);
}

//Documento interno Transferencia
if ($conteudoTransferencia !== '') {
	//Documento Gerado
	$DocumentoGerado2 = array();
	$DocumentoGerado2['Tipo'] = 'G';
	$DocumentoGerado2['IdProcedimento'] = null;
	$DocumentoGerado2['IdSerie'] = $IdSerie2;

	$DocumentoGerado2['Numero'] = null;
	$DocumentoGerado2['Data'] = null;
	$DocumentoGerado2['Descricao'] = $Descricao;
	$DocumentoGerado2['Remetente'] = null;

	//Mantem o array Interessados ja criado acima

	$arrInteressados = array();
	$DocumentoGerado2['Interessados'] = $arrInteressados;

	//Usado somente em alguns tipos, mas necessário para o webservice
	$arrDestinatarios = array();
	$DocumentoGerado2['Destinatarios'] = $arrDestinatarios;

	//Observaçoes para o Documento gerado
	$DocumentoGerado2['Observacao'] = 'observação teste';

	$DocumentoGerado2['NomeArquivo'] = null;
	$DocumentoGerado2['Conteudo'] = base64_encode(utf8_encode ($conteudoTransferencia));
	$DocumentoGerado2['NivelAcesso'] = null;

	array_push($documentosTransferecia, $DocumentoGerado2);
}

if (isset($comprovante_rg_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie3;
	$DocumentoRecebido['Numero'] = '1000';
	$DocumentoRecebido['Data'] = date("d/m/Y");;
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

	$arrInteressados = array();
	$arrInteressados[] = array('Sigla'=>'rub', 'Nome' => 'Roberto');
	$arrInteressados[] = array('Sigla'=>'nay', 'Nome' => 'Nadir');

	$DocumentoRecebido['Interessados'] = $arrInteressados;
	$DocumentoRecebido['Destinatarios'] = null;
	$DocumentoRecebido['Observacao'] = 'comprovante rg';
	$DocumentoRecebido['NomeArquivo'] = $comprovante_rg_name;
	$DocumentoRecebido['Conteudo'] = base64_encode(file_get_contents(dirname(__FILE__) . '/uploads/' . $comprovante_rg_name));
	$documento['NivelAcesso'] = null;

	array_push($documentos, $DocumentoRecebido);
    array_push($documentosTransferecia, $DocumentoRecebido);
}

if (isset($comprovante_cpf_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie3;
	$DocumentoRecebido['Numero'] = '1000';
	$DocumentoRecebido['Data'] = date("d/m/Y");;
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

	$arrInteressados = array();
	$arrInteressados[] = array('Sigla'=>'rub', 'Nome' => 'Roberto');
	$arrInteressados[] = array('Sigla'=>'nay', 'Nome' => 'Nadir');

	$DocumentoRecebido['Interessados'] = $arrInteressados;
	$DocumentoRecebido['Destinatarios'] = null;
	$DocumentoRecebido['Observacao'] = 'compravente cpf';
	$DocumentoRecebido['NomeArquivo'] = $comprovante_cpf_name;
	$DocumentoRecebido['Conteudo'] = base64_encode(file_get_contents(dirname(__FILE__) . '/uploads/' . $comprovante_cpf_name));
	$documento['NivelAcesso'] = null;

	array_push($documentos, $DocumentoRecebido);
    array_push($documentosTransferecia, $DocumentoRecebido);
}

if (isset($comprovante_titulo_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie3;
	$DocumentoRecebido['Numero'] = '1000';
	$DocumentoRecebido['Data'] = date("d/m/Y");;
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

	$arrInteressados = array();
	$arrInteressados[] = array('Sigla'=>'rub', 'Nome' => 'Roberto');
	$arrInteressados[] = array('Sigla'=>'nay', 'Nome' => 'Nadir');

	$DocumentoRecebido['Interessados'] = $arrInteressados;
	$DocumentoRecebido['Destinatarios'] = null;
	$DocumentoRecebido['Observacao'] = 'compravente titulo';
	$DocumentoRecebido['NomeArquivo'] = $comprovante_titulo_name;
	$DocumentoRecebido['Conteudo'] = base64_encode(file_get_contents(dirname(__FILE__) . '/uploads/' . $comprovante_titulo_name));
	$documento['NivelAcesso'] = null;

	array_push($documentos, $DocumentoRecebido);
    array_push($documentosTransferecia, $DocumentoRecebido);
}

if (isset($comprovante_selfie_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie3;
	$DocumentoRecebido['Numero'] = '1000';
	$DocumentoRecebido['Data'] = date("d/m/Y");;
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

	$arrInteressados = array();
	$arrInteressados[] = array('Sigla'=>'rub', 'Nome' => 'Roberto');
	$arrInteressados[] = array('Sigla'=>'nay', 'Nome' => 'Nadir');

	$DocumentoRecebido['Interessados'] = $arrInteressados;
	$DocumentoRecebido['Destinatarios'] = null;
	$DocumentoRecebido['Observacao'] = 'compravente selfie';
	$DocumentoRecebido['NomeArquivo'] = $comprovante_selfie_name;
	$DocumentoRecebido['Conteudo'] = base64_encode(file_get_contents(dirname(__FILE__) . '/uploads/' . $comprovante_selfie_name));
	$documento['NivelAcesso'] = null;

	array_push($documentos, $DocumentoRecebido);
    array_push($documentosTransferecia, $DocumentoRecebido);
}

if (isset($comprovante_desfiliacao_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie3;
	$DocumentoRecebido['Numero'] = '1000';
	$DocumentoRecebido['Data'] = date("d/m/Y");;
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

	$arrInteressados = array();
	$arrInteressados[] = array('Sigla'=>'rub', 'Nome' => 'Roberto');
	$arrInteressados[] = array('Sigla'=>'nay', 'Nome' => 'Nadir');

	$DocumentoRecebido['Interessados'] = $arrInteressados;
	$DocumentoRecebido['Destinatarios'] = null;
	$DocumentoRecebido['Observacao'] = 'compravente cpf';
	$DocumentoRecebido['NomeArquivo'] = $comprovante_desfiliacao_name;
	$DocumentoRecebido['Conteudo'] = base64_encode(file_get_contents(dirname(__FILE__) . '/uploads/' . $comprovante_desfiliacao_name));
	$documento['NivelAcesso'] = null;

	array_push($documentos, $DocumentoRecebido);
}

if (isset($comprovante_endereco_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie3;
	$DocumentoRecebido['Numero'] = '1000';
	$DocumentoRecebido['Data'] = date("d/m/Y");;
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

	$arrInteressados = array();
	$arrInteressados[] = array('Sigla'=>'rub', 'Nome' => 'Roberto');
	$arrInteressados[] = array('Sigla'=>'nay', 'Nome' => 'Nadir');

	$DocumentoRecebido['Interessados'] = $arrInteressados;
	$DocumentoRecebido['Destinatarios'] = null;
	$DocumentoRecebido['Observacao'] = 'compravente cpf';
	$DocumentoRecebido['NomeArquivo'] = $comprovante_endereco_name;
	$DocumentoRecebido['Conteudo'] = base64_encode(file_get_contents(dirname(__FILE__) . '/uploads/' . $comprovante_endereco_name));
	$documento['NivelAcesso'] = null;

	array_push($documentosTransferecia, $DocumentoRecebido);
}

if ($comunicacao) {
    $ret = $objWS->gerarProcedimento($SEISistema, $SEIForm, $numIdUnidade, $Procedimento, $documentos, array(), $UnidadesEnvio);
}

if ($transferencia) {
    $ret2 = $objWS->gerarProcedimento($SEISistema, $SEIForm, $numIdUnidadeDestino, $Procedimento, $documentosTransferecia, array(), $UnidadesEnvio);
}


$url  = 'http://dudol.tre-to.gov.br:8080/dudol/email/enviar';
$data = ['key' => 'value'];
$ch   = curl_init();
$message = '';
$message .= $comunicacao ? utf8_encode("Processo Comunicação de Desfiliação Partidária: ".$ret->LinkAcesso) : ' ';
$message .= $transferencia ? utf8_encode("Processo Transferência de Domicilio Eleitoral: ".$ret2->LinkAcesso) : ' ';

$data = array(
    'from' => 'no-reply2@tre-to.jus.br',
    'fromname' => 'TRE - TO',
    'to'=> $email,
    'subject'=> utf8_encode('Formulário de Regularização'),
    'message'=> $message
);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$result = curl_exec($ch);

curl_close($ch);

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

    <?php if ($comunicacao) { ?>
        <div class="alert alert-success" role="alert">
                <a href="<?= $ret->LinkAcesso; ?>">
                    Processo gerado: <?= $ret->ProcedimentoFormatado; ?>
                </a>
        </div>
    <? } ?>

    <?php if ($transferencia) { ?>
        <div class="alert alert-success" role="alert">
            <a href="<?= $ret2->LinkAcesso; ?>">
                Processo gerado: <?= $ret2->ProcedimentoFormatado; ?>
            </a>
        </div>
    <? } ?>

</div>
</body>
<script src="js/jquey.js"></script>
<script src="js/regra-formulario.js"></script>
</html>
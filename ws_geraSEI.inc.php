<?php
require_once('documento.php');
require_once('requerimento.php');

$strWSDL = getAmbiente()["strWSDL"];

if(!@file_get_contents($strWSDL)) {
	throw new InfraException('Arquivo WSDL '.$strWSDL.' n�o encontrado.');
}
try{
	$objWS = new SoapClient($strWSDL, array('encoding'=>'WINDOWS-1252'));
}catch(Exception $e){
	throw new InfraException('Erro acessando servi�o.',$e);
}

//Procedimento (Processo)
$Procedimento = array();
$Procedimento['IdTipoProcedimento'] = $IdTipoProcedimento;

// Espeifica��o do procedimento
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

//Observa�oes para o Procedimento
$Procedimento['Observacao'] = null;
$Procedimento['NivelAcesso'] = null;

$documentos = [];

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

//Usado somente em alguns tipos, mas necess�rio para o webservice
$arrDestinatarios = array();
$DocumentoGerado['Destinatarios'] = $arrDestinatarios;

//Observa�oes para o Documento gerado
$DocumentoGerado['Observacao'] = 'observa��o teste';

$DocumentoGerado['NomeArquivo'] = null;
$DocumentoGerado['Conteudo'] = base64_encode(utf8_encode($conteudo));
$DocumentoGerado['NivelAcesso'] = null;

array_push($documentos, $DocumentoGerado);

$DocumentoGerado2 = array();
$DocumentoGerado2['Tipo'] = 'G';
$DocumentoGerado2['IdProcedimento'] = null;
$DocumentoGerado2['IdSerie'] = $IdSerie3;

$DocumentoGerado2['Numero'] = null;
$DocumentoGerado2['Data'] = null;
$DocumentoGerado2['Descricao'] = $Descricao;
$DocumentoGerado2['Remetente'] = null;

//Mantem o array Interessados ja criado acima

$arrInteressados = array();
$DocumentoGerado2['Interessados'] = $arrInteressados;

//Usado somente em alguns tipos, mas necess�rio para o webservice
$arrDestinatarios = array();
$DocumentoGerado2['Destinatarios'] = $arrDestinatarios;

//Observa�oes para o Documento gerado
$DocumentoGerado2['Observacao'] = 'observa��o teste';

$DocumentoGerado2['NomeArquivo'] = null;
$DocumentoGerado2['Conteudo'] = base64_encode(utf8_encode($conteudoRequerimento));
$DocumentoGerado2['NivelAcesso'] = null;

array_push($documentos, $DocumentoGerado2);


if (isset($comprovante_rg_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie2;
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
}

if (isset($comprovante_cpf_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie2;
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
}

if (isset($comprovante_titulo_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie2;
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
}

if (isset($comprovante_selfie_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie2;
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
}

if (isset($comprovante_endereco_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie2;
	$DocumentoRecebido['Numero'] = '1000';
	$DocumentoRecebido['Data'] = date("d/m/Y");
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

	array_push($documentos, $DocumentoRecebido);
}

    $ret = $objWS->gerarProcedimento($SEISistema, $SEIForm, $numIdUnidade, $Procedimento, $documentos, array(), $UnidadesEnvio);


if ($email != '') {
    $url  = 'http://dudol.tre-to.gov.br:8080/dudol/email/enviar';
    $data = ['key' => 'value'];
    $ch   = curl_init();
    $message = '';
    $message .= 'Prezado '.$nome.',<br>';
    $message .= 'O TRE-TO recebeu a sua solicita��o de Transfer�ncia de Domicilio Eleitoral.<br>';
    $message .= "O n�mero do processo, para fins de acompanhamento, � <a href='".$ret->LinkAcesso."'>".$ret->ProcedimentoFormatado."</a><br>";
    $message .= 'Ap�s a an�lise pela zona eleitoral competente, Vossa Senhoria ser� comunicado(a) sobre o andamento da solicita��o.<br>';
    $message .= 'Tribunal Regional Eleitoral do Tocantins<br>';

    $data = array(
        'from' => 'no-reply2@tre-to.jus.br',
        'fromname' => 'TRE - TO',
        'to'=> $email,
        'subject'=> utf8_encode('Formul�rio de Regulariza��o'),
        'message'=> utf8_encode($message),
        'html' => true
    );

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    curl_exec($ch);

    curl_close($ch);
}

header("Location:resposta.php?link=".$ret->LinkAcesso."&numero=".$ret->ProcedimentoFormatado);

?>
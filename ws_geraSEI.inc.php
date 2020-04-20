<?php

switch ($tipoServico) {
    case 'alistamento':
        $tipoServico = 'ALISTAMENTO';
        break;
    case 'transferencia':
        $tipoServico = 'TRANSFERÊNCIA';
        break;
    case 'revisao':
        $tipoServico = 'REVISÃO / RESTABELECIMENTO DE TÍTULO CANCELADO';
        break;
    case 'outros':
        $tipoServico = 'OUTROS';
        break;
}

$dados = [
    'tipoServico' => $tipoServico,
    'tituloFormulario' => $titulo != '' ? 'Título: '.$titulo : '',
    'tituloRequerimento' => $titulo != '' ? ', portador do título eleitoral nº: '.$titulo : '',
    'tituloNetRequerimento' => $tituloNet != '' ? $tituloNet : '',
    'tituloNetFormulario' => $tituloNet != '' ? 'Protocolo de pré-atendimento: '.$tituloNet : '',
    'nome' => $nome,
    'telefone' => $telefone,
    'whatsapp' => $whatsapp,
    'email' => $email,
    'necessidadeEspecial' => $necessidadeEspecial != '' ? 'Necessita Atendimento Especial: '.$necessidadeEspecial : '',
    'compravanteRg' => $comprovanteRg,
    'compravanteCpf' => $comprovanteCpf,
    'comprovanteTitulo' => $comprovanteTitulo,
    'comprovanteEndereco' => $comprovanteEndereco,
    'comprovanteSelfie' => $comprovanteSelfie,
    'municipioDestino' => getAmbiente()["zonaDescricao"],
    'zonaEndereco' => getAmbiente()['zonaEndereco'],
    'dataCriacao' => date("d/m/Y H:i:s"),
    'justificativa' => $justificativa,
    'logo' => 'https://'.$_SERVER['SERVER_NAME'].'/solicitacao-eleitor/img/logo-tre.png'
];

$strWSDL = getAmbiente()["strWSDL"];

if(!@file_get_contents($strWSDL)) {
    echo 'Arquivo WSDL '.$strWSDL.' não encontrado.';
    die();
}
try{
	$objWS = new SoapClient($strWSDL, array('encoding'=>'WINDOWS-1252'));
}catch(Exception $e){
	 echo 'Erro acessando serviço.'.$e;
	 die();
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
$arrInteressados[] = $autoridade;

$Procedimento['Interessados'] = $arrInteressados;

//Observaçoes para o Procedimento
$Procedimento['Observacao'] = null;
$Procedimento['NivelAcesso'] = null;

$documentos = [];
$DocumentoGerado2 = array();
$DocumentoGerado2['Tipo'] = 'R';
$DocumentoGerado2['IdProcedimento'] = null;
$DocumentoGerado2['IdSerie'] = $IdSerie3;

$DocumentoGerado2['Numero'] = null;
$DocumentoGerado2['Data'] = date("d/m/Y");
$DocumentoGerado2['Descricao'] = $Descricao;
$DocumentoGerado2['Remetente'] = null;

//Mantem o array Interessados ja criado acima
$DocumentoGerado2['Interessados'] = $arrInteressados;

//Usado somente em alguns tipos, mas necessário para o webservice
$arrDestinatarios = array();
$DocumentoGerado2['Destinatarios'] = $arrDestinatarios;

//Observaçoes para o Documento gerado
$DocumentoGerado2['Observacao'] = 'observação teste';

$DocumentoGerado2['NomeArquivo'] = 'requerimento.html';

$mustache = new Mustache_Engine(array('charset' => 'WINDOWS-1252'));
$conteudoRequerimento = $mustache->render(file_get_contents('_requerimento.html'), $dados);

$DocumentoGerado2['Conteudo'] = base64_encode($conteudoRequerimento);
$DocumentoGerado2['NivelAcesso'] = null;

array_push($documentos, $DocumentoGerado2);

$DocumentoGerado = array();
$DocumentoGerado['Tipo'] = 'R';
$DocumentoGerado['IdProcedimento'] = null;
$DocumentoGerado['IdSerie'] = $IdSerie;

$DocumentoGerado['Numero'] = null;
$DocumentoGerado['Data'] = date("d/m/Y");
$DocumentoGerado['Descricao'] = $Descricao;
$DocumentoGerado['Remetente'] = null;

//Mantem o array Interessados ja criado acima

$DocumentoGerado['Interessados'] = $arrInteressados;

//Usado somente em alguns tipos, mas necessário para o webservice
$arrDestinatarios = array();
$DocumentoGerado['Destinatarios'] = $arrDestinatarios;

//Observaçoes para o Documento gerado
$DocumentoGerado['Observacao'] = 'observação teste';

$DocumentoGerado['NomeArquivo'] = 'formulario.html';

$mustache = new Mustache_Engine(array('charset' => 'WINDOWS-1252'));
$conteudoRequerimento = $mustache->render(file_get_contents('_documento.html'), $dados);
$DocumentoGerado['Conteudo'] = base64_encode($conteudoRequerimento);
$DocumentoGerado['NivelAcesso'] = null;

array_push($documentos, $DocumentoGerado);

$DocumentoGerado3 = array();
$DocumentoGerado3['Tipo'] = 'R';
$DocumentoGerado3['IdProcedimento'] = null;
$DocumentoGerado3['IdSerie'] = $IdSerie4;

$DocumentoGerado3['Numero'] = null;
$DocumentoGerado3['Data'] = date("d/m/Y");
$DocumentoGerado3['Descricao'] = $Descricao;
$DocumentoGerado3['Remetente'] = null;

//Mantem o array Interessados ja criado acima
$DocumentoGerado3['Interessados'] = $arrInteressados;

//Usado somente em alguns tipos, mas necessário para o webservice
$arrDestinatarios = array();
$DocumentoGerado3['Destinatarios'] = $arrDestinatarios;

//Observaçoes para o Documento gerado
$DocumentoGerado3['Observacao'] = 'observação teste';

$DocumentoGerado3['NomeArquivo'] = 'termos.html';

$mustache = new Mustache_Engine(array('charset' => 'WINDOWS-1252'));
$conteudoTermos = $mustache->render(file_get_contents('_termos.html'), $dados);

$DocumentoGerado3['Conteudo'] = base64_encode($conteudoTermos);
$DocumentoGerado3['NivelAcesso'] = null;

array_push($documentos, $DocumentoGerado3);

if (isset($comprovante_rg_name)) {
	//Documento Recebido
	$DocumentoRecebido = array();
	$DocumentoRecebido['Tipo'] = 'R';
	$DocumentoRecebido['IdProcedimento'] = null;
	$DocumentoRecebido['IdSerie'] = $IdSerie2;
	$DocumentoRecebido['Numero'] = '';
	$DocumentoRecebido['Data'] = date("d/m/Y");;
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

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
	$DocumentoRecebido['Numero'] = '';
	$DocumentoRecebido['Data'] = date("d/m/Y");;
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

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
	$DocumentoRecebido['Numero'] = '';
	$DocumentoRecebido['Data'] = date("d/m/Y");;
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

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
	$DocumentoRecebido['Numero'] = '';
	$DocumentoRecebido['Data'] = date("d/m/Y");;
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

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
	$DocumentoRecebido['Numero'] = '';
	$DocumentoRecebido['Data'] = date("d/m/Y");
	$DocumentoRecebido['Descricao'] = 'Comprovante RG';
	$DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

	$DocumentoRecebido['Interessados'] = $arrInteressados;
	$DocumentoRecebido['Destinatarios'] = null;
	$DocumentoRecebido['Observacao'] = 'compravente endereco';
	$DocumentoRecebido['NomeArquivo'] = $comprovante_endereco_name;
	$DocumentoRecebido['Conteudo'] = base64_encode(file_get_contents(dirname(__FILE__) . '/uploads/' . $comprovante_endereco_name));
	$documento['NivelAcesso'] = null;

	array_push($documentos, $DocumentoRecebido);
}

if (isset($comprovante_alistamento_name)) {
    //Documento Recebido
    $DocumentoRecebido = array();
    $DocumentoRecebido['Tipo'] = 'R';
    $DocumentoRecebido['IdProcedimento'] = null;
    $DocumentoRecebido['IdSerie'] = $IdSerie2;
    $DocumentoRecebido['Numero'] = '';
    $DocumentoRecebido['Data'] = date("d/m/Y");
    $DocumentoRecebido['Descricao'] = 'Comprovante Alistamento';
    $DocumentoRecebido['Remetente'] = array('Sigla'=>'lmr','Nome'=>'Luiza');

    $DocumentoRecebido['Interessados'] = $arrInteressados;
    $DocumentoRecebido['Destinatarios'] = null;
    $DocumentoRecebido['Observacao'] = 'compravente Alistamento';
    $DocumentoRecebido['NomeArquivo'] = $comprovante_alistamento_name;
    $DocumentoRecebido['Conteudo'] = base64_encode(file_get_contents(dirname(__FILE__) . '/uploads/' . $comprovante_alistamento_name));
    $documento['NivelAcesso'] = null;

    array_push($documentos, $DocumentoRecebido);
}

    $ret = $objWS->gerarProcedimento($SEISistema, $SEIForm, getAmbiente()["numIdUnidade"], $Procedimento, $documentos, array(), $UnidadesEnvio);


if ($email != '') {
    $url  = 'http://dudol:8080/dudol/email/enviar';
    $data = ['key' => 'value'];
    $ch   = curl_init();
    $message = '';
    $message .= 'Prezado '.$nome.',<br>';
    $message .= 'O TRE-PE recebeu a sua solicitação.<br>';
    $message .= "O número do processo, para fins de acompanhamento, é <a href='".$ret->LinkAcesso."'>".$ret->ProcedimentoFormatado."</a><br>";
    $message .= 'Após a análise pela zona eleitoral competente, Vossa Senhoria será comunicado(a) sobre o andamento da solicitação.<br>';
    $message .= 'Tribunal Regional Eleitoral de Pernambuco<br>';

    $data = array(
        'from' => 'naoresponda@tre-pe.jus.br',
        'fromname' => 'TRE-PE',
        'to'=> $email,
        'subject'=> utf8_encode('Formulário de Regularização'),
        'message'=> utf8_encode($message),
        'html' => true
    );

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    curl_exec($ch);

    curl_close($ch);
}

session_destroy();
header("Location:resposta.php?link=".$ret->LinkAcesso."&numero=".$ret->ProcedimentoFormatado);

?>

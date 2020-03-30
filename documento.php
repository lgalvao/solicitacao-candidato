<?php
$conteudoComunicacao = "";
$conteudoTransferencia = "";

if ($comunicacao) {
    $conteudoComunicacao .= "<p>T�tulo: ".$titulo."</p>";
    $conteudoComunicacao .= "<p>Nome: ".$nome."</p>";
    $conteudoComunicacao .= "<p>Munic�pio da Inscri��o Eleitoral: ".getAmbiente()["zonaDescricao"]."</p>";
    $conteudoComunicacao .= "<p>Telefone: ".$telefone."</p>";
    $conteudoComunicacao .= "<p>Whatsapp : ".$whatsapp."</p>";
    $conteudoComunicacao .= "<p>E-mail: ".$email."</p>";
    $conteudoComunicacao .= "<p>Partido: ".$partido."</p>";
    $conteudoComunicacao .= "<p>Comuniquei ao partido minha desfilia��o: ".$desfiliacao."</p>";
}

if ($transferencia) {
    $conteudoTransferencia .= "<p>T�tulo: ".$titulo."</p>";
    $conteudoTransferencia .= "<p>Nome: ".$nome."</p>";
    $conteudoTransferencia .= "<p>Munic�pio de origem: ".getAmbiente()["zonaDescricao"]."</p>";
    $conteudoTransferencia .= "<p>Munic�pio de Destino: ".getAmbiente()["zonaDescricaoDestino"]."</p>";
    $conteudoTransferencia .= "<p>Telefone: ".$telefone."</p>";
    $conteudoTransferencia .= "<p>Whatsapp : ".$whatsapp."</p>";
    $conteudoTransferencia .= "<p>E-mail: ".$email."</p>";
    $conteudoTransferencia .= "<p>Local de Vota��o: ".$localVotacao."</p>";
    $conteudoTransferencia .= "<p>Necessita Atendimento Especial: ".$necessidadeEspecial."</p>";
    $conteudoTransferencia .= "<p>Endere�o: ".$endereco."</p>";
    $conteudoTransferencia .= "<p>N�mero: ".$numero."</p>";
    $conteudoTransferencia .= "<p>Bairro: ".$bairro."</p>";
    $conteudoTransferencia .= "<p>CEP: ".$cep."</p>";
}
?>


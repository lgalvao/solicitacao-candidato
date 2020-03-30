<?php
$conteudoComunicacao = "";
$conteudoTransferencia = "";

if ($comunicacao) {
    $conteudoComunicacao .= "<p>Título: ".$titulo."</p>";
    $conteudoComunicacao .= "<p>Nome: ".$nome."</p>";
    $conteudoComunicacao .= "<p>Município da Inscrição Eleitoral: ".getAmbiente()["zonaDescricao"]."</p>";
    $conteudoComunicacao .= "<p>Telefone: ".$telefone."</p>";
    $conteudoComunicacao .= "<p>Whatsapp : ".$whatsapp."</p>";
    $conteudoComunicacao .= "<p>E-mail: ".$email."</p>";
    $conteudoComunicacao .= "<p>Partido: ".$partido."</p>";
    $conteudoComunicacao .= "<p>Comuniquei ao partido minha desfiliação: ".$desfiliacao."</p>";
}

if ($transferencia) {
    $conteudoTransferencia .= "<p>Título: ".$titulo."</p>";
    $conteudoTransferencia .= "<p>Nome: ".$nome."</p>";
    $conteudoTransferencia .= "<p>Município de origem: ".getAmbiente()["zonaDescricao"]."</p>";
    $conteudoTransferencia .= "<p>Município de Destino: ".getAmbiente()["zonaDescricaoDestino"]."</p>";
    $conteudoTransferencia .= "<p>Telefone: ".$telefone."</p>";
    $conteudoTransferencia .= "<p>Whatsapp : ".$whatsapp."</p>";
    $conteudoTransferencia .= "<p>E-mail: ".$email."</p>";
    $conteudoTransferencia .= "<p>Local de Votação: ".$localVotacao."</p>";
    $conteudoTransferencia .= "<p>Necessita Atendimento Especial: ".$necessidadeEspecial."</p>";
    $conteudoTransferencia .= "<p>Endereço: ".$endereco."</p>";
    $conteudoTransferencia .= "<p>Número: ".$numero."</p>";
    $conteudoTransferencia .= "<p>Bairro: ".$bairro."</p>";
    $conteudoTransferencia .= "<p>CEP: ".$cep."</p>";
}
?>


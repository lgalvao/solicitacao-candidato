<?php
$conteudo = "";

$conteudo .= "<p>T�tulo: ".$titulo."</p>";
$conteudo .= "<p>Nome: ".$nome."</p>";
$conteudo .= "<p>Munic�pio da Inscri��o Eleitoral: ".getAmbiente()["municipioOrigem"]."</p>";
$conteudo .= "<p>Munic�pio de Destino ".getAmbiente()["zonaDescricao"]."</p>";
$conteudo .= "<p>Telefone: ".$telefone."</p>";
$conteudo .= "<p>Whatsapp : ".$whatsapp."</p>";
$conteudo .= "<p>E-mail: ".$email."</p>";
$conteudo .= "<p>Local de Vota��o: ".$localVotacao."</p>";
$conteudo .= "<p>Necessita Atendimento Especial: ".$necessidadeEspecial."</p>";
$conteudo .= "<p>Endere�o: ".$endereco."</p>";
$conteudo .= "<p>N�mero: ".$numero."</p>";
$conteudo .= "<p>Bairro: ".$bairro."</p>";
?>


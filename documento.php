<?php
$conteudo = "";

$conteudo .= "<p>T�tulo: ".$titulo."</p>";
$conteudo .= "<p>Nome: ".$nome."</p>";
$conteudo .= "<p>Munic�pio da Inscri��o Eleitoral: ".getAmbiente()["municipioOrigem"]."</p>";
$conteudo .= "<p>Munic�pio de Destino ".getAmbiente()["zonaDescricao"]."</p>";
$conteudo .= "<p>Telefone: ".$telefone."</p>";
$conteudo .= "<p>Whatsapp : ".$whatsapp."</p>";
$conteudo .= "<p>E-mail: ".$email."</p>";
$conteudo .= "<p>Protocolo de pr�-atendimento: ".$tituloNet."</p>";
$conteudo .= "<p>Necessita Atendimento Especial: ".$necessidadeEspecial."</p>";
?>


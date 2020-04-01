<?php
$conteudo = "";

$conteudo .= "<p>Título: ".$titulo."</p>";
$conteudo .= "<p>Nome: ".$nome."</p>";
$conteudo .= "<p>Município da Inscrição Eleitoral: ".getAmbiente()["municipioOrigem"]."</p>";
$conteudo .= "<p>Município de Destino ".getAmbiente()["zonaDescricao"]."</p>";
$conteudo .= "<p>Telefone: ".$telefone."</p>";
$conteudo .= "<p>Whatsapp : ".$whatsapp."</p>";
$conteudo .= "<p>E-mail: ".$email."</p>";
$conteudo .= "<p>Protocolo de pré-atendimento: ".$tituloNet."</p>";
$conteudo .= "<p>Necessita Atendimento Especial: ".$necessidadeEspecial."</p>";
?>


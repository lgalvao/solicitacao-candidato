<?php
$conteudoRequerimento = "";

$conteudoRequerimento .= "<p>".$nome.", portador do título eleitoral nº ".$titulo.", devidamente qualificado no formulário de pré-atendimento ".$tituloNet.", solicito o processamento do pedido.</p>";
$conteudoRequerimento .= "<p>Para tanto, junto os documentos necessários para comprovar o alegado.</p>";
$conteudoRequerimento .= "<p>Outrossim, informa que se trata de demanda urgente.</p>";
$conteudoRequerimento .= "<p>Pede e espera deferimento.</p>";
$conteudoRequerimento .= "<p>".getAmbiente()["zonaDescricao"].", ".date("d/m/Y h:i:s").".</p>";
?>e
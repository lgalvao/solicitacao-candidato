<?php
$conteudoRequerimento = "";

$conteudoRequerimento .= "<p>".$nome.", portador do t�tulo eleitoral n� ".$titulo.", devidamente qualificado no formul�rio de pr�-atendimento ".$tituloNet.", solicito o processamento do pedido.</p>";
$conteudoRequerimento .= "<p>Para tanto, junto os documentos necess�rios para comprovar o alegado.</p>";
$conteudoRequerimento .= "<p>Outrossim, informa que se trata de demanda urgente.</p>";
$conteudoRequerimento .= "<p>Pede e espera deferimento.</p>";
$conteudoRequerimento .= "<p>".getAmbiente()["zonaDescricao"].", ".date("d/m/Y H:i:s").".</p>";
?>e
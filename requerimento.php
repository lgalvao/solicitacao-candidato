<?php
$conteudoRequerimento = "";

$conteudoRequerimento .= "<p>".$nome.", portador do t�tulo eleitoral n� ".$titulo.", devidamente qualificado no formul�rio de pr�-atendimento ".$tituloNet.", solicito o processamento do pedido.</p>";
$conteudoRequerimento .= "<p>Para tanto, junto os documentos necess�rios para comprovar o alegado.</p>";
$conteudoRequerimento .= "<p>Outrossim, informa que se trata de demanda urgente, em raz�o do prazo de domic�lio para registro de candidatura.</p>";
$conteudoRequerimento .= "<p>Pede e espera deferimento.</p>";
$conteudoRequerimento .= "<p>".getAmbiente()["zonaDescricao"].", ".date("d/m/Y h:i:s").".</p>";
?>e
<?php
$conteudoRequerimento = "";

$conteudoRequerimento .= "<p>".$nome.", portador do título eleitoral nº ".$titulo.", residente e domiciliado em ".$endereco.", ".$numero.", ".$bairro.", ".getAmbiente()["zonaDescricao"].", vem requerer a Vossa Excelência a transferência do seu título de ".getAmbiente()["municipioOrigem"]." para ".getAmbiente()["zonaDescricao"].", local onde reside atualmente.</p>";
$conteudoRequerimento .= "<p>Para tanto, junto os documentos necessários para comprovar o alegado.</p>";
$conteudoRequerimento .= "<p>Outrossim, informa que se trata de demanda urgente, em razão do prazo de domicílio para registro de candidatura.</p>";
$conteudoRequerimento .= "<p>Pede e espera deferimento.</p>";
$conteudoRequerimento .= "<p>".getAmbiente()["zonaDescricao"].", ".date("d/m/Y h:i:s").".</p>";
?>
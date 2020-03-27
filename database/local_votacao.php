<?php
header('Content-type: application/json');

require_once "oracle.php";

$con = DBOracle::Conecta('ADM');
$sql = "SELECT NOM_LOCAL FROM ADMCADTO.LOCAL_VOTACAO WHERE COD_OBJETO_LOCALIDADE = ".$_GET['cod']." ORDER BY NOM_LOCAL ASC";
$stmt = OCIParse($con, $sql);
$localVotacao = array();

if(oci_execute($stmt)) {
    oci_fetch_all($stmt, $localVotacao, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
}
echo json_encode($localVotacao);
?>
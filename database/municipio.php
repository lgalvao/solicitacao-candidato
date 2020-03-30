<?php
header('Content-type: application/json');

require_once "oracle.php";

$con = DBOracle::Conecta('ADM');
$sql = "SELECT NOM_LOCALIDADE, COD_OBJETO FROM ADMCADTO.MUNICIPIO WHERE COD_OBJETO_UF = 27 AND SITUACAO = 1 ORDER BY NOM_LOCALIDADE ASC";
$stmt = OCIParse($con, $sql);
$municipios = array();

if(oci_execute($stmt)) {
    oci_fetch_all($stmt, $municipios, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
}

echo json_encode($municipios);
?>
<?php
header('Content-type: application/json');

require_once "oracle.php";

$con = DBOracle::Conecta('ADM');
$sql = "SELECT SGL_PARTIDO, NOM_PARTIDO FROM ADMCADTO.PARTIDO ORDER BY SGL_PARTIDO ASC";
$stmt = OCIParse($con, $sql);
$partidos = array();

if(oci_execute($stmt)) {
    oci_fetch_all($stmt, $partidos, null, null, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);
}
echo json_encode($partidos);
?>
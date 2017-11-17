<?php
session_name('hpmedical');
session_start();
$serverName = "PSC-NVASQUEZ\NILDS";
$connection = array("Database"=>"ticket","UID"=>"yo","PWD"=>"123","CharacterSet"=>"UTF-8",'ReturnDatesAsStrings'=>true);
$con = sqlsrv_connect($serverName,$connection);
$sql="SELECT top 1 a.id as id,v.caja as caja,c.numero as numero from atendido a, cola c, vendedor v 
where a.id_cola=c.id and a.id_vendedor=v.id and
a.llama=1 and a.estado=1 order by a.id asc";
$stmt = sqlsrv_query( $con, $sql, array(), array("Scrollable" => 'static'));
if (sqlsrv_num_rows($stmt) > 0) {
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $id = $row["id"];
    $caja = $row["caja"];
    $numero = $row["numero"];
    $respuesta['caja'] = $caja;
    $respuesta['numero'] = $numero;
    echo json_encode($respuesta);
    $sql = "UPDATE atendido set llama=0 where id=" . $id;
    $stmt = sqlsrv_query($con, $sql);
}
sqlsrv_close( $con);
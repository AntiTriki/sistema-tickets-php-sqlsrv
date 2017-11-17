<?php
session_name('hpmedical');
session_start();
$serverName = "PSC-NVASQUEZ\NILDS";
$connection = array("Database"=>"ticket","UID"=>"yo","PWD"=>"123","CharacterSet"=>"UTF-8",'ReturnDatesAsStrings'=>true);
$con = sqlsrv_connect($serverName,$connection);
if(isset($_POST['dato'])){
    $sql = "UPDATE atendido set llama=1 where id_cola=" . $_POST['dato'] . " and estado=1 and id_vendedor=" . $_SESSION['id_cajero'];
        $stmt = sqlsrv_query($con, $sql);

}else {
//    $sql = "select count(*) as conteo from atendido where id_vendedor=" . $_SESSION['id_cajero'] . " and estado=1 ";
//    $stmt = sqlsrv_query($con, $sql, array(), array("Scrollable" => 'static'));
//    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
//    if ($row['conteo'] == 0) {

        $sql = "SELECT top 1 * 
from cola  where  id_servicio=" . $_SESSION['id_servicio'] . " and estado = 1  order by id asc";

        $stmt = sqlsrv_query($con, $sql, array(), array("Scrollable" => 'static'));


        if (sqlsrv_num_rows($stmt) > 0) {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            $id_cola = $row["id"];
            $numero = $row["numero"];
            $estado_cola = $row["estado"];
            $sql = "UPDATE cola set estado=0 where id=" . $id_cola;
            $stmt = sqlsrv_query($con, $sql);
            $sql = "insert into atendido(id_cola,estado,fecha_atencion,id_vendedor,llama)
                  values (" . $id_cola . ",1,'" . date("Y-m-d H:i:s") . "'," . $_SESSION['id_cajero'] . ",1)
                 ";
            $stmt = sqlsrv_query($con, $sql);
            $respuesta['id_cola'] = $id_cola;
            $respuesta['numero'] = $numero;
            echo json_encode($respuesta);
        }
//    } else {
//    if($row['conteo']==1){
//
//        $sql = "SELECT top 1 *
//
//
//from cola  where  id_servicio=".$_SESSION['id_servicio']." and estado = 1  order by id asc";
//
//        $stmt = sqlsrv_query($con, $sql, array(), array("Scrollable" => 'static'));
//
//
//        if (sqlsrv_num_rows($stmt) > 0) {
//            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
//            $id_cola = $row["id"];
//            $numero = $row["numero"];
//            $estado_cola = $row["estado"];
//            $respuesta['id_cola']=$id_cola;
//            $respuesta['numero']=$numero;
//            $sql = "UPDATE cola set estado=0 where id=" . $id_cola;
//            $stmt = sqlsrv_query($con, $sql);
//            $sql = "UPDATE atendido set llama=1 where id_cola=" . $id_cola . " and estado=1 and id_vendedor=" . $_SESSION['id_cajero'];
//            $stmt = sqlsrv_query($con, $sql);
//            echo json_encode($respuesta);
//        }
//    }


   // }
}

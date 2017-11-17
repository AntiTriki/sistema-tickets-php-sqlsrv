<?php
session_name('hpmedical');
session_start();
$serverName = "PSC-NVASQUEZ\NILDS";
$connection = array("Database"=>"ticket","UID"=>"yo","PWD"=>"123","CharacterSet"=>"UTF-8",'ReturnDatesAsStrings'=>true);
$con = sqlsrv_connect($serverName,$connection);
//    $sql = "select top 1 * from atendido where id_vendedor=1 and estado=1 order by id asc";
    $sql = "select top 1 * from atendido where id_vendedor=".$_SESSION['id_cajero']." and estado=1 order by id asc";
    $stmt = sqlsrv_query($con, $sql, array(), array("Scrollable" => 'static'));
        if (sqlsrv_num_rows($stmt) > 0) {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            $id_cola =$row["id_cola"];
            $sql = "select * from cola where id=". $id_cola;
            $stmt = sqlsrv_query($con, $sql);
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            $numero=$row["numero"];
            $respuesta['id_cola']=$id_cola;
            $respuesta['numero']=$numero;
            echo json_encode($respuesta);
        }

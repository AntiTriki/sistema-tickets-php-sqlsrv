<?php
session_name('hpmedical');
session_start();
$cola=$_POST['dato'];
//$cola=41;
$serverName = "PSC-NVASQUEZ\NILDS";
$connection = array("Database"=>"ticket","UID"=>"yo","PWD"=>"123","CharacterSet"=>"UTF-8",'ReturnDatesAsStrings'=>true);
$con = sqlsrv_connect($serverName,$connection);
        $sql = "UPDATE atendido set estado=0 where id_cola=". $cola;
        $stmt = sqlsrv_query($con, $sql);
        echo 'ok';
sqlsrv_free_stmt( $stmt);
sqlsrv_close( $con);



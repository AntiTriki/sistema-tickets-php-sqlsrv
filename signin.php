<?php
session_name('hpmedical');
session_start();
$serverName = "PSC-NVASQUEZ\NILDS";
$connection = array("Database"=>"ticket","UID"=>"yo","PWD"=>"123","CharacterSet"=>"UTF-8",'ReturnDatesAsStrings'=>true);
$con = sqlsrv_connect($serverName,$connection);
date_default_timezone_set('America/La_Paz');
$sigla=$_POST['sigla'];
$password=$_POST['password'];

$sql="SELECT *

						 FROM
             vendedor 
 						 WHERE
						 sigla='".$sigla."'
						 AND password ='".$password."'

						 ";
$stmt = sqlsrv_query( $con, $sql,array(), array( "Scrollable" => 'static' ));


    if (sqlsrv_num_rows($stmt) > 0) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        $_SESSION["id_cajero"] = $row["id"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["sigla"] = $row["sigla"];
        $_SESSION["id_servicio"] = $row["id_servicio"];
        $_SESSION["caja"] = $row["caja"];
        $_SESSION["nombre"] = utf8_decode($row["nombre"]);
        $_SESSION["apellido"] = utf8_decode($row["apellido"]);
        header("Location:cajero_ventana.php");

//echo $row["id"];
        //echo $row['user_id'].", ".date_format($row['fecha_hora'], 'Y-m-d')."<br />";
    }else{
        header("Location:cajero.php");

    }


sqlsrv_free_stmt( $stmt);
sqlsrv_close( $con);
?>

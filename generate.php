<?php
include_once ('conexion.php');
/**
 * Created by PhpStorm.
 * User: nvasquez
 * Date: 10/11/2017
 * Time: 16:09
 */
$sql="SELECT top 1 * from cola order by id desc";
$stmt = sqlsrv_query( $con, $sql);
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}else {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $id = $row["id"];
    $secuencia = $row["secuencia"];
    $fecha = $row["fecha_registro"];
$area='A';
    $estado = $row["estado"];
    if(date("Y-m-d") > $fecha ){
        $secuencia=1;

        if($estado == 1){
            $sql="UPDATE cola set estado=0 where estado=1 and fecha_registro < '".date("Y-m-d")."'";
            $stmt = sqlsrv_query( $con, $sql);
        }else{
        }
        $sql="insert into cola(secuencia,estado,fecha_registro,numero,id_servicio)
                  values (1,1,'".date("Y-m-d H:i:s")."','".$secuencia.$area."',1)
                 ";
        $stmt = sqlsrv_query( $con, $sql);
    }else{
        $secuencia =$secuencia+1;
        $sql="insert into cola(secuencia,estado,fecha_registro,numero,id_servicio)
                  values (".$secuencia.",1,'".date("Y-m-d H:i:s")."','".$secuencia.$area."',1)
                 ";
        $stmt = sqlsrv_query( $con, $sql);

    }
    echo $secuencia.$area;
}
//$phpdate = strtotime( $mysqldate );
//$mysqldate = date( 'Y-m-d H:i:s', $phpdate );



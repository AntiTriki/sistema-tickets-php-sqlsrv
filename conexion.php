<?php
session_name('hpmedical');
session_start();
$serverName = "PSC-NVASQUEZ\NILDS";
$connection = array("Database"=>"ticket","UID"=>"yo","PWD"=>"123","CharacterSet"=>"UTF-8",'ReturnDatesAsStrings'=>true);
$con = sqlsrv_connect($serverName,$connection);

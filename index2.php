<?php
session_name('hpmedical');
session_start();
$_SESSION["isLoggedIn"] = true;
$_SESSION["isLoggedIn"] = true;
$_SESSION['visitorLanguage']  = "en" ;


if ($_SESSION["isLoggedIn"]  == true ){
    print "<p> Log in successful. </p>";
echo $_SESSION['id_servicio'];
}

?>
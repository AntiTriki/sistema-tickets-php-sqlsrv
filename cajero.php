<?php
session_name('hpmedical');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="mobile-web-app-capable" content="yes">
    <title>Fexpo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<style>
    @font-face {
        font-family: "Varela Round";
        src: url(varela.otf);
        font-weight: bold;
    }
    body{
        font-family: "Varela Round";
        src: url(varela.otf);
        font-weight: bold;
    }
input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 30px white inset;

}
</style>
</head>
<body>
<div class="container" >
<div class="row" >

<div class="col-md-4"></div>
<div class="col-md-4 text-center">
<br>
<h1>HP Medical</h1>

    <div class="text-center" style="padding:50px 0">
        <div class="logo">Inicio</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" action="signin.php" method="POST">
                <div class="login-form-main-message"></div>
                <div class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="lg_username" class="sr-only">Usuario</label>
                            <input type="text" class="form-control" id="lg_username" name="sigla" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label for="lg_password" class="sr-only">Contrasena</label>
                            <input type="password" class="form-control" id="lg_password" name="password" placeholder="Password">
                        </div>
                        <div class="etc-login-form">


                        </div>
                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>

            </form>
        </div>
        <!-- end:Main Form -->
    </div>
  </div>
  </ul>
  </div>
  <script src="js/jquery.js" charset="utf-8"></script>
  <script src="js/main.js" charset="utf-8"></script>
  <script src="js/bootstrap.min.js" charset="utf-8"></script>
  <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>


</body>
</html>

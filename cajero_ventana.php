<?php
include_once('conexion.php');
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
.borde {
    border: 2px solid #a1a1a1;
    padding: 10px 40px;
    border-radius: 3px;


}
.module-2 {
    font-size: 42px;
    line-height: 36px;
}
    .letra{
        font-size: 800%;
    }
</style>
</head>
<body>
<div class="container" >
<div class="row" >

<div class="col-sm-3 col-md-4"></div>
<div class="col-sm-6 col-md-4 text-center">
<br>
    <div style="height: 19em; background-color: #ffffff" class="row borde"  >

        <div style="font-size: 150%" class="row text-left " >
            <p>caja <?php echo $_SESSION['caja'];?></p>
        </div>
    <div id="numero" class="row " style="height: 9em;" >
        <p class="letra"></p>
        <input id="numero" type="hidden" value="">
    </div>



<div class="row" >
<!--    <div class="col-xs-1 col-sm-2"></div>-->
<!--    <div class="col-xs-10 col-sm-8"> <p><button type="button" id="nuevo_com" class="btn btn-primary " >Llamar</button></p></div>-->
    <div class="btn-group-horizontal" style="position: relative;">

        <button type="button" id="llamado" class="btn btn-primary">Llamar</button>
        <button type="button" id="atendido" class="btn btn-success">Se atendió</button>
    </div>
    </div>

  </div>
  </div>
  <script src="js/jquery.min.js" charset="utf-8"></script>

  <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script>
        var respuesta;
        $(document).ready(function () {

            $.ajax({
                type: 'POST',
                url: 'actual.php',
                dataType: "json",
                cache: false,
                success: function(data) {
                    $('.letra').empty();
                    $('.letra').text(data['numero']);
                    $('#numero').val(data['id_cola']);

                    respuesta=data['id_cola'];
                    console.log(data['numero']);
                },
                error:function() {

                }
            });

            $('#llamado').on('click', function () {
                var id;
                id=$('#numero').val();
                if(!respuesta) {
                    $.ajax({
                        type: 'POST',
                        url: 'llamar.php',
                        //url: 'pantalla_llamar.php',
                        dataType: "json",
                        cache: false,
                        success: function (data) {
                            $('.letra').empty();
                            $('.letra').text(data['numero']);
                            $('#numero').val(data['id_cola']);
                            respuesta=data['id_cola'];
                            console.log(data['numero']);
                        }
                    });
                }else{
                    $.ajax({
                        type: 'POST',
                        url: 'llamar.php',
                        data: 'dato='+respuesta,
                        dataType: "json",
                        cache: false,
                        success: function (data) {

                        }
                    });

                }
            });

            $('#atendido').on('click', function () {
                var id;
                id=$('#numero').val();
                $.ajax({

                    type:'POST',
                    url:  'atendido.php',
                    data: 'dato='+id,
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                       $('.letra').empty();
                       respuesta ='';

                    },
                    error:function () {
                        $('.letra').empty();
                        respuesta ='';

                    }
                });
            });
        })

    </script>


</body>
</html>

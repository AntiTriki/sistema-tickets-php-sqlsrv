

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
    <link rel="stylesheet" href="css/alertify.min.css">
    <link rel="stylesheet" href="css/default.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font.css">
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
.alertify-notifier{
    font-size: 250%;
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

<ul class="list-group">

  
  
   <li id="generate1" class="list-group-item" ><a id="gen" style="width:100%; " class="btn btn-primary btn-lg">Ventas Rápidas</a></li>

  


  </ul>
  </div>

  <script src="js/jquery.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
  <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script>
        $(document).ready(function () {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            var h= today.getHours();
            var m= today.getMinutes();
            var s= today.getSeconds();
            if(dd<10) {
                dd = '0'+dd
            }

            if(mm<10) {
                mm = '0'+mm
            }
            if(h<10) {
                h = '0'+h
            }
            if(m<10) {
                m = '0'+m
            }
            if(s<10) {
                s = '0'+s
            }

            today = dd + '/' + mm + '/' + yyyy;
            var time = h+':'+m+':'+s;
            var dato;
            $('#gen').on('click', function () {
                var id;

                $.ajax({

                    type:'POST',
                    url:  'generate.php',

                    success: function (data) {
                        dato=data;
                        alertify.set('notifier', 'position', 'bottom-center');
                        alertify.success('Su ticket es '+data).delay(3);

                        var ventimp=window.open(' ','popimpr',"width=1, height=1");
                        ventimp.document.write('<link rel="stylesheet" href="css/bootstrap.min.css"><link rel="stylesheet" href="css/font-awesome.min.css"> <link rel="stylesheet" href="css/font.css"><div class="text-center" style ="font-size: 120%;" >  HP MEDICAL SRL <br> Ticket: <br><font size="150%">'+data+'</font><br>'+time+' '+today+' </div>');
//ventimpdocument.style.visibility="hidden";

//                        ventimp.document.close();
//                        ventimp.print(true);
//                        ventimp.close();
                    }
                });



            });


        })



    </script>


</body>
</html>

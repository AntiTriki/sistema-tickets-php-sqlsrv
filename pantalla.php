

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="mobile-web-app-capable" content="yes">
    <title>Fexpo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="node_modules/video.js/dist/video-js.min.css">

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
.video-js .vjs-tech {
    position: relative;
}
    .ticket{
        border-radius: 5px; margin-top:0px;margin-bottom:10px ;
        margin-right:10px;float: left; width: 300px;height: 90px; background-color: #46b8da;position: relative

    }
.letra{
    font-size: 480%;
}
</style>
</head>
<body onload="startTime()" style="background-color: #286090">
<div class="container-fluid" >
<div style="height: 35em" class="row" >
    <div class="col-md-2"></div>
<div class="col-md-4">
    <video  id="my-video" class="video-js" height="480"
           data-setup="{}">


    </video>
</div>




  </div>
    <div style="height: 19em; background-color: #ffffff" class="row">

        <div style="height: 5em;background-color: #95eef6" class="col-md-12" ></div>







        <div id="armado" style=" " class="col-lg-9" >

    </div>
            <div style=" background-color: #ffffff" class="col-lg-3" >
                <img src="logo.png"  class="img-rounded img-responsive" style="height: 155px" alt="Cinque Terre">
                <div style="font-size:190% " id="txt"></div>

            </div>
    </div>
</div>

    <audio id="beep">
        <source src="sound.wav" type="audio/wav">
    </audio>
  <script src="js/jquery.js" charset="utf-8"></script>
  <script src="js/jquery-ui.min.js" charset="utf-8"></script>

  <script src="js/bootstrap.min.js" charset="utf-8"></script>

  <script src="node_modules/video.js/dist/video.min.js" charset="utf-8"></script>
  <script src="node_modules/videojs-playlist/dist/videojs-playlist.min.js" charset="utf-8"></script>
<script>
    var indice =1;
    var c ='';
    var array = [];
    var x = document.getElementById("beep");

    setInterval(function() {

        console.log('llama');
        $.ajax({
            type: 'POST',
           // url: 'llamar.php',
            url: 'pantalla_llamar.php',
            dataType: "json",
            cache: false,
            success: function(yo) {
                array[indice] = '<div id="'+indice+'" class="ticket text-center"><p class="letra">'+yo["numero"]+' > '+yo["caja"]+'</p></div>' ;
                if (indice > 6){
                    c='';
                    var eliminar = indice - 6;
                    delete array[eliminar];
                    var inicio = eliminar+1;
                    for (i = inicio; i <= indice; i++) {
                        c = array[i]+c ;
                    }


                }else{
                    c= array[indice] +c;

                }

                x.play();
                $("#armado").html(c);
                $("#"+indice).effect("highlight", {}, 2000);
                indice++;
                console.log('success');
            },
            error:function() {
//alert('joder');
                console.log('error');
            }
        });
    }, 3000);

    var player = videojs('#my-video', { "controls": true, "autoplay": true, "preload": "auto","autoHeight": "16:9" });
   // var player = videojs('#my-video', { "controls": true,  "preload": "auto","autoHeight": "16:9" });

    player.playlist([{
        sources: [{
            src: 'video/1.mp4',
            type: 'video/mp4'
        }],

    }, {
        sources: [{
            src: 'video/2.mp4',
            type: 'video/mp4'
        }],

    }]);

    // Play through the playlist automatically.

    player.playlist.repeat(true);

    player.playlist.repeat();
    player.playlist.autoadvance(0);
    function startTime() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        h = checkTime(h);
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
            h + ":" + m + ":" + s+" "+dd + '/' + mm + '/' + yyyy;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }

</script>


</body>
</html>

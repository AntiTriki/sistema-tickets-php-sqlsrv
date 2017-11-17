<?php
session_name('nilds');
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fexpo";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fexpo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<style>
input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 30px white inset;

}
</style>
</head>
<body>
<div class="container" style="padding:0px;">

<div class="col-md-12 text-center" style="padding:0px;">


  <?php
  $sql = "SELECT * FROM producto where id=".$_GET['id']."";
    $res = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
	$row = mysqli_fetch_array($res);
  
  
    echo '<strong style="font-size: 6.1em;">Bs./ '.$row['precio'].'</strong>';
	echo '<br>';
	echo '<br>';
	echo '<br>';
  echo '<font style="font-size: 2em;">1234567890123456789012345678901234567890</font>';
  echo '<br>';
  echo '<font style="font-size: 2em;">1234567890123456789</font>';
	
  ?>
  </div>
  </ul>
  </div>
  <script src="js/jquery.js" charset="utf-8"></script>
  <script src="js/jquery.fittext.js" charset="utf-8"></script>
  <script>
  jQuery(".t").fitText(5.0);
</script>
  
  <script src="js/bootstrap.min.js" charset="utf-8"></script>
  <script src="http://localhost:35729/livereload.js" charset="utf-8"></script>


</body>
</html>

<?php
include("polacz.php");
$link=Conection();  
$date = date('H:i:s', time()); 
$Sql="insert into temperatura (temperatura, h, cisnienie, natezenie, datetime)  values ('".$_GET["temperatura"]."','".$_GET["h"]."','".$_GET["cisnienie"]."','".$_GET["natezenie"]."','$date')";     
   mysqli_query($link,$Sql);
   header("Location: index.php");
?>

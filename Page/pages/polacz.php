<?php
function Conection(){
   if (!($link=mysqli_connect("host","dbname","pass")))  {
      exit();
   }
   if (!mysqli_select_db($link, 'db')){
      exit();
   }
   return $link;
}
?>

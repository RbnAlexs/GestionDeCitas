<?php

function Conectarse() {
   if (!($link=mysql_connect("localhost" ,"enfermeritas_adm" , ""))) {
      echo "Error conectando mysql.";
      exit();
   }
   if (!mysql_select_db("enfermeritas_cb",$link)) {
      echo "Error seleccionando la bd.";
      exit(); 
   }
   return $link;
}   

?>
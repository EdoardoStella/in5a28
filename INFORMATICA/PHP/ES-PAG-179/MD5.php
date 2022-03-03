<?php
  require("funzioni.php");
  require("head.html");
 $connect= NEW MYSQLI(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD);

 $email=$_REQUEST['email'];
 $password=$_REQUEST['password'];

 $sql="INSERT INTO utenti('email','password') VALUES($email, $password)";

 if($connect->query($sql)=== TRUE){
     echo("ok");
 }else{
     echo("inserimento fallito");
}
  
  require("foot.html");
?>